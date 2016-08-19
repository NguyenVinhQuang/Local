<?php 
	/**
	* user
	*/
	class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_user');
			$this->load->model('m_review');
		}

		public function index(){
			if ($this->session->userdata('user_id')) {
				redirect('user/displayUser/'.$this->session->userdata('user_id'));
			} else {
				redirect('login');
			}
		}

		public function displayUser($user_id){
			$this->session->set_userdata('last_page',base_url().'index.php/user/displayUser/'.$user_id.'');
			if (true) {
				// load thư viện cần thiết 
		        $this->load->library('pagination');
		        $this->load->helper('url');
		        //cấu hình phân trang
		        $config['base_url'] = base_url().'index.php/user/displayUser/'.$user_id; // xác định trang phân trang 
		        $config['total_rows'] = count($this->m_review->review_user_id_onl($user_id) ); // xác định tổng số review 
		        $config['per_page'] = 2; // xác định số recode_string(request, string)d ở mỗi trang 
		        $config['uri_segment'] = 4; // xác định segment chứa page number 
		        $this->pagination->initialize($config);


				$temp['title'] =  'user';
				$temp['template'] = 'vf_user';
				$temp['user'] = $this->m_user->select_user($user_id);
				$temp['review'] = $this->m_review->review_place($user_id, $config['per_page'], $this->uri->segment(4));
				$temp['error'] = '';
				$this->load->view('frontend/manage',$temp);
			} else {
				redirect('login');
			}
		}
		public function do_upload(){
			if ($this->session->userdata('user_id')) {
				if (!file_exists('./resources/images/user/user_'.$this->session->userdata('user_id') ) ) {
				    mkdir('./resources/images/user/user_'.$this->session->userdata('user_id'));
				}
				$config['upload_path'] = './resources/images/user/user_'.$this->session->userdata('user_id');
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload()) {
					//upload khong thanh cong
					$temp['title'] =  'user';
					$temp['template'] = 'vf_user';
					$temp['user'] = $this->m_user->select_user($this->session->userdata('user_id'));
					$temp['review'] = $this->m_review->review_place($this->session->userdata('user_id'));
					$temp['error'] = $this->upload->display_errors();
					$this->load->view('frontend/manage',$temp);
				} else {
					//upload thanh cong
					$upload_data = $this->upload->data();
					//lay thong tin anh cu
					$user = $this->m_user->select_user($this->session->userdata('user_id'));
					//xoa anh cu
					unlink('./resources/images/user/user_'.$this->session->userdata('user_id').'/'.$user['photo'] );
					//update bang user update truong photo
					$array = array('photo'=>$upload_data['file_name']);
					$this->m_user->update($this->session->userdata('user_id'),$array);
					$this->index();
				}
				
			} else {
				redirect('login');
			}
		}

		public function change_level($level,$user_id){
			//thuc hien load view
			$temp['user_id']  = $user_id;
			if ($level == 1) {
				$array = array('level'=> 0);
				$this->m_user->update($user_id,$array);
				$temp['level'] = 0;
			}
			else if ($level ==0) {
				$array = array('level'=>1);
				$this->m_user->update($user_id,$array);
				$temp['level'] = 1;
			}
			$this->load->view('frontend/ajax_change_level',$temp);
		}
	} /*end class*/
 ?>