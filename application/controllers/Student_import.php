<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_import_model');
        $this->load->library('csvimport');
    }

    function old_last_id()
    {
        $this->student_import_model->old_max_id();
    }

    function load_data()
    {
        $result = $this->student_import_model->select();
        $update = $this->session->userdata('update');
        $insert = $this->session->userdata('insert');
        $this->session->unset_userdata('update', 'insert');
        $output = '
		<div class="alert alert-success" role="alert">
		<i class="fas fa-check"></i> Success!  ' . $update . ' Records Updated,  ' . $insert . ' Records Inserted
		</div>
		<div class="card-header">
        <h3 style="font-weight: 700;">Added Marks</h3>
        <span>This Table Contains All New Marks Inserted.. Updated Marks are not shown</span>
        <div class="card-header-right">
          <ul class="list-unstyled card-option">
            <li><i class="feather icon-maximize full-card"></i></li>
            <li><i class="feather icon-minus minimize-card"></i></li>
            <li><i class="feather icon-trash-2 close-card"></i></li>
          </ul>
        </div>
      </div>
		 <div class="card-block">
		 <div class="table-responsive">
		   <div class="dt-responsive table-responsive">
			 <table id="res-config" class="table table-striped table-bordered dt-responsive nowrap">
			   <thead>
				<tr>
					<th>ID</th>
        			<th>Username</th>
        			<th>Class</th>
				</tr>
				</thead>
				<tbody>
		';
        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $count = $count + 1;
                $id = $result->num_rows() - $count + 1;
                $output .= '
				
				<tr>
					<td>' . $id . '</td>
					<td>' . $row->username . '</td>
					<td>' . $row->class . '</td>
				</tr>
				';
            }
        } else {
            $output .= '
			<tr>
	    		<td colspan="3" align="center">Data not Available</td>
	    	</tr>
			';
        }
        $output .= '</tbody>
				</table>
	  		</div>
		</div>
	  </div>';
        echo $output;
    }

    function error_msg()
    {
        $error = $this->session->userdata('error');
        $this->session->unset_userdata('error');
        $output = '<div class="alert alert-danger" role="alert">
		<i class="fas fa-exclamation-circle"></i> Error! ' . $error . '</div>';
        echo $output;
    }

    function import()
    {
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        foreach ($file_data as $row) {
            if ($row["username"] && $row["class"]) {
                $data[] = array(
                    'username'    =>    $row["username"],
                    'class'        =>    $row["class"],
                    'password' => password_hash($row["username"], PASSWORD_DEFAULT)
                );
            } else {
                $updated = array('error' => ' Check Your CSV File again for required Fields..');
                $this->session->set_userdata($updated);
                break;
            }
        }
        $output = array('rows' => 10);
        echo json_encode($output);
        $this->student_import_model->insert($data);
    }
}
