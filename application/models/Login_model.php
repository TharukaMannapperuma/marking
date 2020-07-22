<?php

class Login_model extends CI_Model
{

    function userLogin()
    {
        $uname =  $this->input->post('uname');
        $pwd = $this->input->post('pwd');
        $type = (int) substr($uname, 0, 2);

        if ($type) {
            $table = "students";
        } else {
            $table = "admin";
        }
        $this->db->where('username', $uname);
        $username = $this->db->get($table);
        $hash = $username->row(0)->password;
        if ($username->num_rows() == 1 and password_verify($pwd, $hash)) {
            return $username->row(0);
        } else {
            return FALSE;
        }
    }
}
