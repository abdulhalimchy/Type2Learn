<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}

	public function index()
	{
		
		;

	}

	public function checkUsername()
	{
		$username = $this->input->post('username');
		$res = $this->User_Model->hasThisUsername($username);
		if($res==true)	//has alreadly
			return false; //not available
		else
			return true; // available
	}

}
