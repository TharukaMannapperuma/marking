<?php

class Database_model extends CI_Model
{
    function getData()
    {
        $table = $this->session->userdata('table');
        $uname = $this->session->userdata('uname');
        $this->db->where('username', $uname);
        $query = $this->db->get($table);
        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return FALSE;
        }
    }
    function setData()
    {
        $uname = $this->session->userdata('uname');
        $table = $this->session->userdata('table');

        $username = array('username' => $uname);

        $email = $this->input->post('email');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $address = $this->input->post('address');
        $school = $this->input->post('school');
        $phone = $this->input->post('phone');
        $shy = $this->input->post('shy');
        $cpname = $this->input->post('cpname');
        $cppro = $this->input->post('cppro');
        $cpnum = $this->input->post('cpnum');

        $data_array = array(
            'email' => $email,
            'fname' => $fname,
            'lname' => $lname,
            'address' => $address,
            'school' => $school,
            'phone' => $phone,
            'shy' => $shy,
            'cp_name' => $cpname,
            'cp_phone' => $cpnum,
            'cp_profession' => $cppro
        );

        $result = $this->db->where($username)->update($table, $data_array);

        if ($result) {
            $session_array = array(
                'fname' => $fname,
                'phone' => $phone,
                'email' => $email
            );
            $this->session->set_userdata($session_array);
        }
        return $result;
    }
    function resetPassword()
    {
        $uname = $this->session->userdata('uname');
        $table = $this->session->userdata('table');

        $username = array('username' => $uname);

        $newpass = $this->input->post('newpass');
        $password = password_hash($newpass, PASSWORD_DEFAULT);
        $password = array('password' => $password);
        $result = $this->db->where($username)->update($table, $password);
        return $result;
    }
    function updateImageUrl($url)
    {
        $image = $url;
        $uname = $this->session->userdata('uname');
        $table = $this->session->userdata('table');
        $data_array = array(
            'image' => $image
        );

        $username = array('username' => $uname);

        $result = $this->db->where($username)->update($table, $data_array);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function allStudents()
    {
        $table = "students";
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();        //Returns an Array of Query Objects
        } else {
            return FALSE;
        }
    }
}
