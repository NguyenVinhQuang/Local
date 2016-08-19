<?php 	
	/**
	* 
	*/
	class Signup extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_user');
		}

		public function index(){
			$temp['title'] = 'Sign Up';
			$temp['template']='vf_signup';

			
			$this->form_validation->set_rules('txtAccount', 'Account', 'trim|required|min_length[4]|max_length[12]|is_unique[user.account]|xss_clean');
			$this->form_validation->set_rules('txtPass', 'Password', 'trim|required|matches[cf_pass]|md5');
			$this->form_validation->set_rules('cf_pass', 'Confirm Password', 'trim');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('frontend/vf_manage_signup',$temp);
			}
			else
			{
				$account = $this->input->post('txtAccount');
				$password = $this->input->post('txtPass');
				$array = array('account'=> $account,'password'=>$password);
				$this->m_user->insert($array);
				redirect('login');
			}
		}
	}
 ?>