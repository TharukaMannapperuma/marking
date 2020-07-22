<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_all extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('student_model', 'm');
	}

	public function addStudent()
	{
		$result = $this->m->addStudent();
		$msg['type'] = $result['type'];
		if ($result) {
			$msg['success'] = $result['success'];
		}
		echo json_encode($msg);
	}

	public function editStudent()
	{
		$result = $this->m->editStudent();
		echo json_encode($result);
	}

	public function updateStudent()
	{
		$result = $this->m->updateStudent();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteStudent()
	{
		$result = $this->m->deleteStudent();
		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function resetPassword()
	{
		$result = $this->m->resetPassword();
		$msg['success'] = false;
		if ($result['status']) {
			$msg['success'] = true;
		} else if ($result['case'] == 'nolen') {
			$msg['case'] = $result['case'];
		} else if ($result['case'] == 'nomatch') {
			$msg['case'] = $result['case'];
		}
		echo json_encode($msg);
	}
}
