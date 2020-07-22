<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

	public function addStudent()
	{
		$table = "students";
		$where = array(
			'username' => $this->input->post('txtuser'),
		);

		$field = array(
			'username' => $this->input->post('txtuser'),
			'password' => password_hash($this->input->post('txtuser'), PASSWORD_DEFAULT),
			'class' => $this->input->post('txtclass'),
		);

		$this->db->where($where);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			$output['type'] = 'exist';
			$output['success'] = TRUE;
		} else {
			$output['success'] = $this->db->insert($table, $field);
			$output['type'] = 'add';
		}
		return $output;
	}

	public function editStudent()
	{
		$table = "students";
		$uname = $this->input->get('id');
		$this->db->where('username', $uname);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateStudent()
	{
		$uname = $this->input->post('txtuser');
		$field = array(
			'username' => $uname,
			'class' => $this->input->post('txtclass')
		);
		$this->db->where('username', $uname);
		$this->db->update('students', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function deleteStudent()
	{
		$uname = $this->input->get('id');
		$this->db->where('username', $uname);
		$this->db->delete('students');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function resetPassword()
	{
		$uname = $this->input->post('txtuser');
		$password = $this->input->post('txtpass');
		$password2 = $this->input->post('txtpass2');
		$size = strlen($password);
		if (5 < $size) {
			if ($password === $password2) {
				$field = array(
					'password' => password_hash($password, PASSWORD_DEFAULT)
				);
				$this->db->where('username', $uname);
				$this->db->update('students', $field);
				if ($this->db->affected_rows() > 0) {
					$out = array(
						'status' => TRUE,
						'case' => 'match'
					);
				} else {
					$out = array(
						'status' => FALSE,
						'case' => 'error'
					);
				}
			} else {
				$out = array(
					'status' => FALSE,
					'case' => 'nomatch'
				);
			}
		} else {
			$out = array(
				'status' => FALSE,
				'case' => 'nolen'
			);
		}

		return $out;
	}
}
