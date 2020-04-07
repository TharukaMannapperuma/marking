<?php
class Csv_import_model extends CI_Model
{
    function select()
    {
        $min_id = $this->session->userdata('old_max_id');
        $this->db->where('id >=', $min_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('marks');
        return $query;
    }

    function old_max_id()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('marks');
        $row = $query->num_rows();
        $old_id = array('old_max_id' => $row);
        $this->session->set_userdata($old_id);
    }

    function rows()
    {
        echo $this->db->count_all('marks');
    }

    function process($data)
    {
        echo "Test";
        $this->db->insert("tbl_sample", $data);
        echo 'done';
    }

    function insert($data)
    {

        $update = 0;
        $inserted = 0;

        foreach ($data as $row) {
            $where = array(
                "student" => $row["student"],
                "paper" => $row["paper"]
            );
            $this->db->where($where);
            $query = $this->db->get('marks');
            if ($query->num_rows() > 0) {
                $update++;
                $this->db->where($where);
                $this->db->update('marks', $row);
            } else {
                $inserted++;
                $this->db->insert('marks', $row);
            }
        }
        $updated = array('update' => $update, 'insert' => $inserted);

        $this->session->set_userdata($updated);
    }
}
