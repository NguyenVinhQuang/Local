<?php 
	/**
	* login
	*/
	class Login extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_user');

		}
		//login
		public function index(){
			$temp['title'] = 'Log In';
			$temp['template']='vf_login';

			$this->form_validation->set_rules('txtAccount', 'Account', 'trim|required|xss_clean');
			$this->form_validation->set_rules('txtPass', 'Password', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){		
				$this->load->view('frontend/vf_manage_signup',$temp);
			}
			else{
				$account = $this->input->post('txtAccount');
				$password = $this->input->post('txtPass');
				$user = $this->m_user->select_id($account,$password);
				if(!$user){
					//login that bai
					$this->session->set_flashdata('login_error', TRUE);
					redirect('login');
				}
				else{
					//login thanh cong
					$this->session->set_userdata(    array('logged_in'=>TRUE,'user_level'=>$user['level'],'user_id'=>$user['id'])   );
					redirect($this->session->userdata('last_page'));
				}
			}
		}
	}
 ?>