<?php
/**
 * Created by Fernalia.
 * Contact : fernalia.h@gmail.com
 * User: Ferna
 * Date: 09/05/2017
 * Time: 10:44
 */

class Employee extends CI_Controller{
	public function __construct(){
		parent::__construct();

		//load model
		$this->load->model('employee_model');
	}

	public function index(){
		$this->load->view('header.php');
		$this->load->view('menu.php');
		$this->load->view('employee.php');
		$this->load->view('footer.php');
	}

	public function fetch_employee_data(){
		$fetch_data = $this->employee_model->make_datatables();
        $data = array();

        $i = 1;
        foreach($fetch_data as $row){
            $sub_array = array();

            $sub_array[] = $row->emp_no;
            $sub_array[] = $row->birth_date;
            $sub_array[] = $row->first_name;
            $sub_array[] = $row->last_name;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->hire_date;
            
            $data[] = $sub_array;
        }

        $output = array(
            "draw"            => intval($this->input->get_post("draw")),
            "recordsTotal"    => $this->employee_model->get_all_data(),
            "recordsFiltered" => $this->employee_model->get_flltered_data(),
            "data"            => $data
        );

        echo json_encode($output);
	}
}