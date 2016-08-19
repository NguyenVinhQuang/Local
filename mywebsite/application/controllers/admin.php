<?php 
	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('m_user');
		}

		public function index(){
			$temp['title'] = 'Login';
			if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
					redirect('parent_categories');
			}
			else{
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
				if($this->form_validation->run() == FALSE){		
					//validate that bai
					$this->load->view('backend/vb_login',$temp);
				}
				else{
					//validate thanh cong
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$user = $this->m_user->select_id($username,$password);
					if(!$user){
						//login that bai
						$this->session->set_flashdata('login_error', TRUE);
						redirect('admin');
					}
					else{
						//login thanh cong
						$this->session->set_userdata(    array('logged_in'=>TRUE,'user_level'=>$user['level'],'user_id'=>$user['id'])   );
						redirect('admin');
					}
				}
			}
		}
	}
?>