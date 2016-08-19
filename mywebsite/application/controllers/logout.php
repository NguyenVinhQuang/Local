<?php 	
	/**
	* 
	*/
	class Logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_level');
			$this->session->unset_userdata('user_id');
			redirect($this->session->userdata('last_page'));
		}
	}
 ?>