<?php
/**
 * Created by Fernalia.
 * Contact : fernalia.h@gmail.com
 * User: Ferna
 * Date: 09/05/2017
 * Time: 10:44
 */

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('employee');
	}
}