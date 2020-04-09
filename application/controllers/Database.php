<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{
    public function editData()
    {
        $email = $this->input->post('email');
        $table = $this->session->userdata('table');
        $oldemail = $this->session->userdata('email');

        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('school', 'School', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|regex_match[/^(?:0|94|\+94|0094)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|91)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/]');
        $this->form_validation->set_rules('shy', 'Shy', 'trim|required|exact_length[1]|less_than[3]');
        $this->form_validation->set_rules('cpname', 'Contact Person Name', 'trim|required');
        $this->form_validation->set_rules('cppro', 'Contact Person Profession', 'trim|required');
        $this->form_validation->set_rules('cpnum', 'Contact Person Phone Number', 'trim|required|regex_match[/^(?:0|94|\+94|0094)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|91)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/]');

        $this->load->model('Database_model');
        $getData = $this->Database_model->getData();

        if ($oldemail == $email) {
            $this->form_validation->set_rules(
                'email',
                'Email',
                'trim|required|valid_email',
                array(
                    'required' => 'Please Enter an Email',
                    'valid_email' => 'Please Enter an Valid Email',
                )
            );
            if ($this->form_validation->run() == FALSE) {
                if ($getData != FALSE) {
                    $user_data['fetched_data'] = $getData;
                    $this->load->view('student/edit', $user_data);
                } else {
                    $message = "Something Went Wrong, Please Contact Help!";
                    $this->session->set_flashdata('edit', $message);
                    redirect('edit');
                }
            } else {
                $setData = $this->Database_model->setData();
                if ($setData) {
                    $this->session->set_flashdata('edit', 'User Details Updated Successfully!');
                    redirect('edit');
                }
            }
        } else {
            $this->db->select('email');
            $this->db->where('email', $email);
            $query = $this->db->get($table);
            $num = $query->num_rows();
            if ($num > 0) {
                $this->session->set_flashdata('edit', 'Email already Exists!');
                redirect('edit');
            } else {
                $this->form_validation->set_rules(
                    'email',
                    'Email',
                    'trim|required|valid_email',
                    array(
                        'required' => 'Please Enter an Email',
                        'valid_email' => 'Please Enter an Valid Email'
                    )
                );
                if ($this->form_validation->run() == FALSE) {
                    if ($getData != FALSE) {
                        $user_data['fetched_data'] = $getData;
                        $this->load->view('student/edit', $user_data);
                    } else {
                        $message = "Something Went Wrong, Please Contact Help!";
                        $this->session->set_flashdata('edit', $message);
                        redirect('edit');
                    }
                } else {
                    $setData = $this->Database_model->setData();
                    if ($setData) {
                        $this->session->set_flashdata('edit', 'User Details Updated Successfully!');
                        redirect('edit');
                    } else {
                        if ($setData) {
                            $this->session->set_flashdata('edit', 'User Details Update unsuccessful!');
                            redirect('edit');
                        }
                    }
                }
            }
        }
    }
    public function selectTable()
    {
        $this->load->model('Paper_model');
        $paperData = $this->Paper_model->selectPaper();
        $paper = $this->Paper_model->latest();      //Return of the latest model in paper model is an array containing 0 as data and 1 as no of papers array
        $papers = $paper[1];
        if ($paperData != FALSE) {
            $user_data['fetched_data'] = $paperData;
            $user_data['paper_no'] = $papers;
            $this->load->view('student/search', $user_data);
        } else {
            $message = "Something Went Wrong, Please Contact Help!";
            $this->session->set_flashdata('table_error', $message);
            redirect('search');
        }
    }
    public function resetPassword()
    {
        if ($this->input->post()) {
            $this->load->model('Database_model');
            $getData = $this->Database_model->getData();
            $rules = array(
                [
                    'field' => 'newpass',
                    'label' => 'Password',
                    'rules' => 'callback_valid_password',
                ],
                [
                    'field' => 'confirmpass',
                    'label' => 'Repeat Password',
                    'rules' => 'matches[newpass]',
                ],
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()) {
                $setData = $this->Database_model->resetPassword();
                if ($setData) {
                    $this->session->set_flashdata('edit', 'Password Resetted Successfully!');
                    redirect('edit');
                } else {
                    $message = "Something Went Wrong, Please Contact Help!";
                    $this->session->set_flashdata('edit', $message);
                    redirect('edit');
                }
            } else {
                if ($getData != FALSE) {
                    $user_data['fetched_data'] = $getData;
                    $this->load->view('student/edit', $user_data);
                } else {
                    $message = "Something Went Wrong, Please Contact Help!";
                    $this->session->set_flashdata('edit', $message);
                    redirect('edit');
                }
            }
        }
    }
    public function adminResetPassword()
    {
        if ($this->input->post()) {
            $this->load->model('Database_model');
            $rules = array(
                [
                    'field' => 'newpass',
                    'label' => 'Password',
                    'rules' => 'callback_valid_password',
                ],
                [
                    'field' => 'confirmpass',
                    'label' => 'Repeat Password',
                    'rules' => 'matches[newpass]',
                ],
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()) {
                $setData = $this->Database_model->resetPassword();
                if ($setData) {
                    $this->session->set_flashdata('edit', 'Password Resetted Successfully!');
                    redirect('reset');
                } else {
                    $message = "Something Went Wrong!";
                    $this->session->set_flashdata('edit', $message);
                    redirect('reset');
                }
            } else {
                $message = "Please Check your passwords again!";
                $this->session->set_flashdata('edit', $message);
                redirect('reset');
            }
        }
    }
    public function valid_password($password = '')
    {
        $password = trim($password);

        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');

            return FALSE;
        }

        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

            return FALSE;
        }

        if (preg_match_all($regex_special, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

            return FALSE;
        }

        if (strlen($password) < 5) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

            return FALSE;
        }

        if (strlen($password) > 32) {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

            return FALSE;
        }

        return TRUE;
    }
    public function imageUpload()
    {
        $this->load->model('Image_model');
        $setImage = $this->Image_model->upload();
        if ($setImage == FALSE) {
            $this->session->set_flashdata('edit', 'Image Updated Unsuccessful!');
            redirect('edit');
        } else {
            $this->session->set_flashdata('edit', 'Image Update is Successful!');
            echo "<script>window.open('edit','_self')</script>";
        }
    }
}
