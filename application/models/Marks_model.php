<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marks_model extends CI_Model
{

	public function addMarks()
	{
		$table = "marks";
		$where = array(
			'student' => $this->input->post('txtuser'),
			'paper' => $this->input->post('txtpaper')
		);

		$field = array(
			'student' => $this->input->post('txtuser'),
			'class' => $this->input->post('txtclass'),
			'paper' => $this->input->post('txtpaper'),
			'marks' => $this->input->post('txtmarks'),
			'd_rank' => $this->input->post('txtdrank'),
			'c_rank' => $this->input->post('txtcrank')
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

	public function editMarks()
	{
		$table = "marks";
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateMarks()
	{
		$id = $this->input->post('txtId');
		$field = array(
			'class' => $this->input->post('txtclass'),
			'paper' => $this->input->post('txtpaper'),
			'marks' => $this->input->post('txtmarks'),
			'd_rank' => $this->input->post('txtdrank'),
			'c_rank' => $this->input->post('txtcrank')
		);
		$this->db->where('id', $id);
		$this->db->update('marks', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function deleteMarks()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('marks');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
