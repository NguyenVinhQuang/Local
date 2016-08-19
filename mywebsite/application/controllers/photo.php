<?php 
	/**
	* controller photo
	*/
	class Photo extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_user');
			$this->load->model('m_place_image');
			$this->load->model('m_place');
			$this->load->model('m_user_image');
		}
		var $link_all = null;
		var $link_user = null;
		public function index(){
			
		}
		public function displayPhoto($place_id){			
			$this->session->set_userdata('last_page',base_url().'index.php/photo/displayPhoto/'.$place_id.'');


			// load thư viện cần thiết 
	        $this->load->library('pagination');
	        // cấu hình phân trang 
	        $config['base_url'] = base_url().'index.php/photo/displayAllPhoto/'.$place_id; // xác định trang phân trang 
	        $config['total_rows'] = count($this->m_place_image->select_all_place_id($place_id) ); // xác định tổng số img 
	        $config['per_page'] = 12; // xác định số recode_string(request, string)d ở mỗi trang 
	        $config['uri_segment'] = 4; // xác định segment chứa page number 
	        $this->pagination->initialize($config);


			$temp['title'] = 'photo';
			$temp['template'] = 'vf_photo';
			$temp['place'] = $this->m_place->select_place_id($place_id);
			$temp['all_image'] = $this->m_place_image->join_place_image_user($place_id, $config['per_page'], $this->uri->segment(4));
			$this->load->view('frontend/manage',$temp);			
			
		}
		public function displayAllPhoto($place_id){
			// load thư viện cần thiết 
	        $this->load->library('pagination');
	        // cấu hình phân trang 
	        $config['base_url'] = base_url().'index.php/photo/displayAllPhoto/'.$place_id; // xác định trang phân trang 
	        $config['total_rows'] = count($this->m_place_image->select_all_place_id($place_id) ); // xác định tổng số img 
	        $config['per_page'] = 12; // xác định số recode_string(request, string)d ở mỗi trang 
	        $config['uri_segment'] = 4; // xác định segment chứa page number 
	        $this->pagination->initialize($config);
			$temp['all_image'] = $this->m_place_image->join_place_image_user($place_id, $config['per_page'], $this->uri->segment(4));
            $this->load->view('frontend/ajax_all_photo',$temp);
		}


		public function vote($value,$img_id){
			$temp['value'] = $value;
			$img =$this->m_place_image->select_all($img_id);
			$temp['data'] = $img;
			if ($value == 'vote') {
				//thuc hien insert vao bang user_image
				$data = array('user_id'=>$this->session->userdata('user_id'),'image_id'=>$img_id);
				$this->m_user_image->insert($data);
				//update vote trong place_image
				$new_vote = ++$img['vote'];
				$array = array('vote'=>$new_vote);
				$this->m_place_image->update($img_id,$array);

				//update photo trong bang places
				$avatar = $this->m_place_image->select_order_by_vote($img['place_id']);
				$photo = array('photo'=> $avatar['name']);
				$this->m_place->update($photo,$img['place_id']);

				//hien thi nut unvote
				$temp['new_vote'] = $new_vote;
				$this->load->view('frontend/ajax_vote_photo',$temp);
			} else {
				//thuc hien xoa trong bang user_image
				$this->m_user_image->delete($this->session->userdata('user_id'),$img_id);
				//update vote trong bang place_image
				$new_vote = --$img['vote'];
				$array = array('vote'=>$new_vote);
				$this->m_place_image->update($img_id,$array);

				//update photo trong bang places
				$avatar = $this->m_place_image->select_order_by_vote($img['place_id']);
				$photo = array('photo'=> $avatar['name']);
				$this->m_place->update($photo,$img['place_id']);
				
				//hien thi unvote
				$temp['new_vote'] = $new_vote;
				$this->load->view('frontend/ajax_vote_photo',$temp);
			}
		}

		public function confirm_remove($img_id){
			$temp['data'] = $this->m_place_image->select_all($img_id);
			$this->load->view('frontend/ajax_confirm',$temp);
		}
		public function cancel_remove($img_id){
			$temp['data'] = $this->m_place_image->select_all($img_id);
			$this->load->view('frontend/ajax_cancel_remove',$temp);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($img_id){
			//lay thong tin anh
			$img = $this->m_place_image->select_all($img_id);
			$place_id = $img['place_id'];
			//xoa anh trong thuc muc
			unlink('./resources/images/place/place_'.$img['place_id'].'/'.$img['name'] );

			//xoa anh trong csdl
			$this->m_place_image->delete($img_id);

			//update lai photo trong places
			$avatar = $this->m_place_image->select_order_by_vote($place_id);
			$photo = array('photo'=> $avatar['name']);
			$this->m_place->update($photo,$place_id);	
			
		}
	}
 ?>