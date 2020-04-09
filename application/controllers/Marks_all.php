<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marks_all extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('marks_model', 'm');
	}

	public function addMarks()
	{
		$result = $this->m->addMarks();
		$msg['type'] = $result['type'];
		if ($result) {
			$msg['success'] = $result['success'];
		}
		echo json_encode($msg);
	}

	public function editMarks()
	{
		$result = $this->m->editMarks();
		echo json_encode($result);
	}

	public function updateMarks()
	{
		$result = $this->m->updateMarks();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteMarks()
	{
		$result = $this->m->deleteMarks();
		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
