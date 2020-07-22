<?php

class Paper_model extends CI_Model
{

    function latest()
    {
        $table = "marks";
        $class = $this->session->userdata('class');
        $this->db->distinct();
        $this->db->select("paper");         //Selecting Paper Column
        $this->db->where('class', $class);  //Where class ex 2021 Theory Kegalle
        $query = $this->db->get($table);
        $papers = $query->result();
        $papers_sorted = [];
        foreach ($papers as $row) {
            $papers_sorted[] = $row->paper;
        }
        sort($papers_sorted);
        $lpaper = max($query->result())->paper; //Getting Maximum paper number for that certain class
        $selectArr = array(
            "class" => $class,
            "paper" => $lpaper
        );
        $this->db->where($selectArr);
        $query = $this->db->get($table);    //Getting All The paper details for the latest paper in that class
        $output = array($query->result(), $papers_sorted);
        if ($query->num_rows() > 0) {
            return $output;        //Returning fetched result
        } else {
            return FALSE;
        }
    }
    function selectPaper()
    {
        $table = "marks";
        $class = $this->session->userdata('class');
        $paper = $this->input->post('paper');
        $selectArr = array(
            "class" => $class,
            "paper" => $paper
        );
        $this->db->where($selectArr);
        $query = $this->db->get($table);    //Getting All The paper details for the selected paper in that class
        if ($query->num_rows() > 0) {
            return $query->result();        //Returning fetched result
        } else {
            return FALSE;
        }
    }
    function myMarks()
    {
        $table = "marks";
        $class = $this->session->userdata('class');
        $student = $this->session->userdata('uname');
        $this->db->distinct();
        $this->db->select("paper");         //Selecting Paper Column
        $this->db->where('class', $class);  //Where class ex 2021 Theory Kegalle
        $query = $this->db->get($table);
        $lpaper = max($query->result())->paper; //Getting Maximum paper number for that certain class
        $selectArr = array(
            "class" => $class,
            "paper" => $lpaper,
            "student" => $student
        );
        $this->db->where($selectArr);
        $query = $this->db->get($table);    //Getting All The paper details for the latest paper in that class
        if ($query->num_rows() == 1) {
            return $query->row(0);        //Returning fetched result
        } else {
            return FALSE;
        }
    }

    function chartData()
    {
        $table = "marks";
        $class = $this->session->userdata('class');
        $student = $this->session->userdata('uname');
        $selectArr = array(
            "class" => $class,
            "student" => $student
        );
        $this->db->order_by('paper', 'ASC'); //Ordering data Ascendign before fetching according to paper number
        $this->db->where($selectArr);
        $query = $this->db->get($table);    //Getting All The paper details for the latest paper in that class
        if ($query->num_rows() > 0) {
            return $query->result();     //Returning fetched result
        } else {
            return FALSE;
        }
    }

    function adminData()
    {
        $table = "students";
        $this->db->select("class");         //Selecting Paper Column
        $this->db->distinct();
        $query = $this->db->get($table);
        $class = $query->result();
        if ($query) {
            $theory = 0;
            $revi = 0;
            foreach ($class as $row) {
                $classes = $row->class;
                $this->db->like('class', $classes);
                $this->db->from($table);
                $num = $this->db->count_all_results();
                $data["count"][] = $num;  // Produces an integer, like 17
                $data["labels"][] = $classes;
                $type = substr($classes, strlen($classes) - 1);
                if ($type == "t") {
                    $theory += $num;
                } else {
                    $revi += $num;
                }
            }
            $data["theory"] = $theory;
            $data["revision"] = $revi;
            return $data;     //Returning fetched result
        } else {
            return FALSE;
        }
    }
    function allMarks()
    {
        $table = "marks";
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();        //Returns an Array of Query Objects
        } else {
            return FALSE;
        }
    }
}
