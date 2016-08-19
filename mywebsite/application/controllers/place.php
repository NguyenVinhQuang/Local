<?php 
	/**
	* place
	*/
	class Place extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_place');
			$this->load->model('m_place_category');
			$this->load->model('m_category');
			$this->load->model('m_review');
			$this->load->model('m_user_review');
			$this->load->model('m_place_image');
			$this->load->model('m_user');
		}

		public function index(){
			if ($this->session->userdata('user_id')) {
				$this->createPlace();		
			} else {
				$this->session->set_userdata('last_page',base_url().'index.php/place/createPlace');
				redirect('login');
			}
			
		}
		//hien thi trang place
		public function displayPlace($id){
			$this->session->set_userdata('last_page',base_url().'index.php/place/displayPlace/'.$id.'');
			// load thư viện cần thiết 
	        $this->load->library('pagination');

	        // cấu hình phân trang 
	        $config['base_url'] = base_url().'index.php/place/displayPlace/'.$id; // xác định trang phân trang 
	        //$config['total_rows'] = $this->m_review->count_all_review($id); // xác định tổng số review 
	        if ($this->session->userdata('user_level') == 1 ) {
				$config['total_rows'] = $this->m_review->count_all_review($id); // xác định tổng số review 
			}
			else{
				$config['total_rows'] = $this->m_review->count_review_on($id); // xác định tổng số review 
			}
	        $config['per_page'] = 5; // xác định số recode_string(request, string)d ở mỗi trang 
	        $config['uri_segment'] = 4; // xác định segment chứa page number 
	        $this->pagination->initialize($config);


			$temp['template'] = 'vf_place';
			$temp['place'] = $this->m_place->select_place_id($id);
			$place = $temp['place'];
			$temp['title'] = $place['name'];
			$temp['new_places'] = $this->m_place->select_new_places(10);
			$temp['category'] = $this->m_place_category->select_category($id);
			$temp['review']  = $this->m_review->select_desc_useful($id);

			if ($this->session->userdata('user_level') == 1 ) {
				$temp["pagination_review"] = $this->m_review->pagination_review($id, $config['per_page'], $this->uri->segment(4));
			}
			else{
				$temp['pagination_review'] = $this->m_review->pagination_review_onl($id, $config['per_page'], $this->uri->segment(4));
			}
			$temp['place_image'] = $this->m_place_image->select_place_id($id);
			$this->load->view('frontend/manage',$temp);
		}
		//hien thi trang tao place
		public function createPlace(){
			//check quyen user
			if ($this->session->userdata('user_id') ) {
				$temp['title'] =  'Create Place';
				$temp['template'] = 'vf_create_place';
				$temp['parent'] = $this->m_category->select_asc_name();


				$this->form_validation->set_rules('txtName', 'Name', 'trim|required|xss_clean');
				$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required|xss_clean');
				$this->form_validation->set_rules('txtPhone', 'Phone number', 'trim|xss_clean|callback_phone_number_check');

				if ($this->form_validation->run() == FALSE) {
					//validate that bai
					$this->load->view('frontend/manage',$temp);
				} else {
					//neu validate thanh cong
					//kiem tra category
					$count = $this->input->post('txtCount');
					$check = false;
					for ($i= 1; $i <= $count ; $i++) {
						if($this->input->post('sl-parent-'.$i)!= false and $this->input->post('sl-parent-'.$i)!='none'){
							$check = true;
							break;
						}
					}

					if ($check == true) {					
						//thuc hien insert
						$this->insert();
						redirect('home');
					} else {
						//quay lai trang create place
						//hien thong bao: phai lua chon category
						$temp['error_cate']  = 'Category is required';
						$this->load->view('frontend/manage',$temp);
					}
				}
			}
			else redirect('login');
			
		}

		public function phone_number_check($number){
			$number = str_replace(' ', '', $number);
			$number = str_replace('.', '/', $number);
			if (is_numeric($number) or $number==null) {
				return true;
			} else {
				$this->form_validation->set_message('phone_number_check', 'The %s field must be a number');
				return false;
			}
			
		}
		//hien thi selectbox child category
		public function displaySelectChild($id,$count){
			//$id la id parent
			$idParent = $id;
			$temp['count'] = $count;
			$temp['child'] = $this->m_category->select_child_id_parent($idParent);
			$this->load->view('frontend/vf_ajax_select_child',$temp);
		}

		//hien thi the category
		public function addChildCategory($count){
			$temp['count'] = $count;
			$temp['parent'] = $this->m_category->select_asc_name();
			$this->load->view('frontend/vf_ajax_add_category',$temp);
		}
		//hien th thoi gia
		public function addHours($weekday,$start,$end,$count){
			$temp['count'] = $count;
			$temp['weekday'] = $weekday;
			$temp['start'] = $start;
			$temp['end'] = $end;
			$this->load->view('frontend/vf_ajax_add_hours',$temp);
		}

		/*
		**************
		* insert
		**************
		*/

		
		public function insert(){
			//insert vao bang place
			$name = $this->input->post('txtName');
			$address = $this->input->post('txtAddress');			
			$phone_number = $this->input->post('txtPhone');			
			$website =$this->input->post('txtWebsite');
			$lat = $this->input->post('txtLat')			;
			$lng = $this->input->post('txtLng')			;
			$place = array('name'=>ucwords(strtolower($name))
							,'address'=>$address
							,'phone_number'=>$phone_number
							,'website'=>$website
							,'user_id'=>$this->session->userdata('user_id')
							, 'map_lat' => $lat
							,'map_long' => $lng
							);
			$this->m_place->insert($place);
			$last_place = $this->m_place->select_last_place();
			$place_id = $last_place['id'];

			//insert vao bang place-category
			$count = $this->input->post('txtCount');
			
			for ($i=$count; $i>0 ; $i--) { 
				$parent = $this->input->post('sl-parent-'.$i);
				if ($parent != 'none' and $parent != false) {
					//kiem tra child
					$child = $this->input->post('sl-child-'.$i);
					//neu co gia tri child
					if ($child != 'none') {
						$place_cate = array('place_id'=>$place_id,'id_category'=>$child);
						if ( count($this->m_place_category->select($place_id,$child))>0 ) {
							continue;
						}
						else{
							$this->m_place_category->insert($place_cate);
						}
					}
					//neu chi co gia tri parent
					else{
						$place_cate = array('place_id'=>$place_id,'id_category'=>$parent);
						if ( count($this->m_place_category->select($place_id,$parent))>0 ) {
							continue;
						}
						else{
							$this->m_place_category->insert($place_cate);
						}
					}
				}
			}
			
			// $this->m_place_category->insert($place_cate);
		}


		/*
		**************
		* change button
		**************
		*/

		public function button($value,$review_id){
			$review = $this->m_review->select_id($review_id);
			$temp['data'] = $review;
			$temp['value'] = $value;
			if ($value == 1) {
				//thuc hien update useful ++
				$array = array('useful'=> ++$review['useful']);
				$temp['useful'] = $review['useful'];
				$this->m_review->update($review_id,$array);
				//thuc hien insert vao bang user_review
				$data = array('user_id'=>$this->session->userdata('user_id'),'review_id'=>$review_id);
				$this->m_user_review->insert($data);
			}
			elseif ($value == 2) {
				//thuc hien update useful --
				$array = array('useful'=> --$review['useful']);
				$temp['useful'] = $review['useful'];
				$this->m_review->update($review_id,$array);

				//thuc hien xoa khoi bang user_review
				$this->m_user_review->delete($this->session->userdata('user_id'),$review_id);	
			}
			
			
			$this->load->view('frontend/ajax_change_button',$temp);
		}

		/*
		**************
		* change_status
		**************
		*/

		public function status($value,$review_id){
			$review = $this->m_review->select_id($review_id);
			$place_id = $review['place_id'];
			$temp['data'] = $review;
			$temp['value'] = $value;
			if ($value == 0) {
				//thuc hien update bang review
				//set status = 1
				$array = array('status' => true);
				$this->m_review->update($review_id,$array);

				//lay thong tin tu bang review
				$star_quan = $this->m_review->count_avg_star($place_id);
				$review_quan =$this->m_review->count_review_on($place_id);
				//update place
				$data = array('star_quantity'=> $star_quan['star'],'review_quantity'=>$review_quan);
				$this->m_place->update($data,$place_id);
			}
			elseif ($value == 1) {
				//thuc hien update bang review set status = 0
				$array = array('status' => false);
				$this->m_review->update($review_id,$array);

				//lay thong tin tu bang review
				$star_quan = $this->m_review->count_avg_star($place_id);
				$review_quan =$this->m_review->count_review_on($place_id);
				//update place
				$data = array('star_quantity'=> $star_quan['star'],'review_quantity'=>$review_quan);
				$this->m_place->update($data,$place_id);
			}
			$this->load->view('frontend/ajax_change_status',$temp);

		}

		/*
		**************
		* update
		**************
		*/

		public function update($place_id = null){
			if ($this->session->userdata('user_level') == 1 and $place_id != null) {
				//neu quyen la admin
				//hien thi view update
				$temp['template'] = 'vf_update_place';
				$temp['place'] = $this->m_place->select_place_id($place_id);
				$temp['title'] =  'Edit Place';
				$temp['parent'] = $this->m_category->select_asc_name();
				$temp['place_cate'] = $this->m_place_category->select_category($place_id);

				$this->form_validation->set_rules('txtName', 'Name', 'trim|required|xss_clean');
				$this->form_validation->set_rules('txtAddress', 'Address', 'trim|required|xss_clean');
				$this->form_validation->set_rules('txtPhone', 'Phone number', 'trim|xss_clean|callback_phone_number_check');

				if ($this->form_validation->run() == FALSE) {
					//validate that bai
					$this->load->view('frontend/manage',$temp);
				} else {
					//neu validate thanh cong
					//kiem tra category
					$count = $this->input->post('txtCount');
					$check = false;
					for ($i= 1; $i <= $count ; $i++) {
						if($this->input->post('sl-parent-'.$i)!= false and $this->input->post('sl-parent-'.$i)!='none'){
							$check = true;
							break;
						}
					}

					if ($check == true) {					
						//thuc hien update
						$name = $this->input->post('txtName');
						$address = $this->input->post('txtAddress');			
						$phone_number = $this->input->post('txtPhone');			
						$website =$this->input->post('txtWebsite');
						$lat = $this->input->post('txtLat');
						$lng = $this->input->post('txtLng');
						$place = array('name'=>ucwords(strtolower($name))
										,'address'=>ucwords(strtolower($address))
										,'phone_number'=>$phone_number
										,'website'=>$website
										,'user_id'=>$this->session->userdata('user_id')
										, 'map_lat' => $lat
										,'map_long' => $lng
										);
						//update bang place
						$this->m_place->update($place,$place_id);
						//xoa du lieu trong bang place_cate where place id = $place_id
						$this->m_place_category->delete($place_id);
						//insert lai vao bang place_cate
						$count = $this->input->post('txtCount');
						
						for ($i=$count; $i>0 ; $i--) { 
							$parent = $this->input->post('sl-parent-'.$i);
							if ($parent != 'none' and $parent != false) {
								//kiem tra child
								$child = $this->input->post('sl-child-'.$i);
								//neu co gia tri child
								if ($child != 'none') {
									$place_cate = array('place_id'=>$place_id,'id_category'=>$child);
									if ( count($this->m_place_category->select($place_id,$child))>0 ) {
										continue;
									}
									else{
										$this->m_place_category->insert($place_cate);
									}
								}
								//neu chi co gia tri parent
								else{
									$place_cate = array('place_id'=>$place_id,'id_category'=>$parent);
									if ( count($this->m_place_category->select($place_id,$parent))>0 ) {
										continue;
									}
									else{
										$this->m_place_category->insert($place_cate);
									}
								}
							}
						}
						redirect('place/displayPlace/'.$place_id);
					} else {
						//neu ko co category duoc chon
						//quay lai trang update place
						//hien thong bao: phai lua chon category
						$temp['error_cate']  = 'Category is required';
						$this->load->view('frontend/manage',$temp);
					}
				}
			}
			else{
				//neu khong phai la admin
				redirect('1');
			}
		}

		/*
		**************
		* delete
		**************
		*/

		public function confirm_delete($place_id){
			//load view ajax delete plce
			$temp['place_id'] = $place_id;
			$this->load->view('frontend/ajax_confirm_delete_place',$temp);
		}
		public function cancel_delete($place_id){
			$temp['place_id'] = $place_id;
			$this->load->view('frontend/ajax_cancel_delete_place',$temp);	
		}

		public function delete($place_id){
			$this->m_place->delete($place_id);
		}
	}
 ?>