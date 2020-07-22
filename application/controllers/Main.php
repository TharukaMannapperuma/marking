<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	// Login
	public function index()
	{
		$this->load->view('login');
	}
	// Pages in Student
	public function marks()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Paper_model');
			$getData = $this->Paper_model->myMarks();
			$chartData = $this->Paper_model->chartData();
			$chart_data = [];
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData;
				foreach ($chartData as $row) {
					$label = "Paper " . $row->paper;
					$chart_data['label'][] = $label;
					$chart_data['marks'][] = (int) ($row->marks);
					$chart_data['d_rank'][] = (int) ($row->d_rank);
					$chart_data['c_rank'][] = (int) ($row->c_rank);
				}
				$user_data['chart_data'] = json_encode($chart_data);
				// print_r($user_data['chart_data']);
				// die();
				$this->load->view('student/marks', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function profile()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Database_model');
			$getData = $this->Database_model->getData();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData;
				$this->load->view('student/profile', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function latest()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Paper_model');
			$getData = $this->Paper_model->latest();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData[0];
				$this->load->view('student/latest', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function search()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Paper_model');
			$getData = $this->Paper_model->latest();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData[0];
				$user_data['paper_no'] = $getData[1];
				$this->load->view('student/search', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function edit()

	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Database_model');
			$getData = $this->Database_model->getData();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData;
				$this->load->view('student/edit', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function editnew()
	{
	}
	public function help()
	{
		$this->load->view('student/help');
	}
	// Admin Portion of the main controller
	public function adminprofile()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Paper_model');
			$adminData = $this->Paper_model->adminData();
			$chartData = array(
				"count" => $adminData["count"],
				"labels" => $adminData["labels"]
			);
			$classData = array(
				"theory" => $adminData["theory"],
				"revision" =>  $adminData["revision"],
			);
			if ($adminData != FALSE) {
				$user_data['chart_data'] = json_encode($chartData);
				$user_data['class_data'] = $classData;
				$this->load->view('admin/adminprofile', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('logout');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function addmarks()
	{
		$this->load->view("admin/marksadd");
	}
	public function addstudents()
	{
		$this->load->view("admin/addstudents");
	}
	public function students()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Database_model');
			$getData = $this->Database_model->allStudents();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData;
				$this->load->view('admin/students', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function marksall()
	{
		if ($this->session->userdata('loggedin')) {
			$this->load->model('Paper_model');
			$getData = $this->Paper_model->allMarks();
			if ($getData != FALSE) {
				$user_data['fetched_data'] = $getData;
				$this->load->view('admin/marks', $user_data);
			} else {
				$message = "Something Went Wrong, Please Contact Help!";
				$this->session->set_flashdata('msg', $message);
				redirect('index');
			}
		} else {
			$this->load->view('login');
		}
	}
	public function reset()
	{
		$this->load->view('admin/reset');
	}
}
