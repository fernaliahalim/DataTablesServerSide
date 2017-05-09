<?php
/**
 * Created by Fernalia.
 * Contact : fernalia.h@gmail.com
 * User: Ferna
 * Date: 09/05/2017
 * Time: 10:44
 */

class Employee_Model extends CI_Model{
	var $table 		   = "employees";
	var $select_column = array("emp_no",
							   "birth_date",
							   "first_name",
							   "last_name",
							   "gender",
							   "hire_date");
	var $order_column  = array("emp_no",
							   "birth_date",
							   "first_name",
							   "last_name",
							   "gender",
							   "hire_date");

	public function make_query(){
		$this->db->select($this->select_column);
        $this->db->from($this->table);
        if(isset($_POST["search"]["value"])){
        	$this->db->like("emp_no", $_POST["search"]["value"]);
        	$this->db->or_like("birth_date", $_POST["search"]["value"]);
        	$this->db->or_like("first_name", $_POST["search"]["value"]);
        	$this->db->or_like("last_name", $_POST["search"]["value"]);
        	$this->db->or_like("gender", $_POST["search"]["value"]);
        	$this->db->or_like("hire_date", $_POST["search"]["value"]);
        }

        if(isset($_POST["order"])){
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']); 
        } else{
            $this->db->order_by("emp_no", "ASC");
        }
	}

	public function make_datatables(){
		$this->make_query();
		if($_POST["length"] != -1){
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
	}

	public function get_flltered_data(){
		$this->make_query();
		$query = $this->db->get();
        return $query->num_rows();
	}

	public function get_all_data(){
		$this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
	}
}