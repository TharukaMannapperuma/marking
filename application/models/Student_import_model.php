<?php
class Student_import_model extends CI_Model
{
    function select()
    {
        $min_id = $this->session->userdata('old_username');
        $this->db->where('username >=', $min_id);
        $this->db->order_by('username', 'DESC');
        $query = $this->db->get('students');
        return $query;
    }

    function old_max_id()
    {
        $this->db->order_by('username', 'DESC');
        $query = $this->db->get('students');
        $row = $query->num_rows();
        $old_username = array('old_username' => $row);
        $this->session->set_userdata($old_username);
    }

    function insert($data)
    {
        $update = 0;
        $inserted = 0;

        foreach ($data as $row) {
            $where = array(
                "username" => $row["username"]
            );
            $this->db->where($where);
            $query = $this->db->get('students');
            if ($query->num_rows() > 0) {
                $update++;
                $this->db->where($where);
                $this->db->update('students', $row);
            } else {
                $inserted++;
                $this->db->insert('students', $row);
            }
        }
        $updated = array('update' => $update, 'insert' => $inserted);
        $this->session->set_userdata($updated);
    }
}
