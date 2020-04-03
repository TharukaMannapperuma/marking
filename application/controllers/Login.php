<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function userLogin()
    {
        $this->form_validation->set_rules('uname', 'Username', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->load->model('Login_model');
            $result = $this->Login_model->userLogin();
            if ($result != FALSE) {
                if ((int) substr($result->username, 0, 2)) {
                    $user_data = array(
                        'uname' =>  $result->username,
                        'fname' => $result->fname,
                        'phone' => $result->phone,
                        'image' => $result->image,
                        'email' => $result->email,
                        'class' => $result->class,
                        'user_type' => 'user',
                        'loggedin' => TRUE,
                        'table' => "students"
                    );
                    $this->session->set_userdata($user_data);
                    redirect('profile');
                } else {
                    $user_data = array(
                        'uname' =>  $result->username,
                        'user_id' => $result->id,
                        'fname' => $result->fname,
                        'image' => $result->image,
                        'phone' => $result->phone,
                        'user_type' => 'admin',
                        'loggedin' => TRUE,
                        'table' => "admin"
                    );
                    $this->session->set_userdata($user_data);
                    redirect('adminprofile');
                }
            } else {
                $this->session->set_flashdata('msg', 'Wrong Username or password');
                redirect('index');
            }
        }
    }
    public function logOut()
    {
        $array_items = array('user_type', 'loggedin', 'user_id', 'fname', 'phone', 'image', 'email', 'table', 'uname');
        $this->session->unset_userdata($array_items);
        redirect('index');
    }
}
