<?php 
	/**
	* review
	*/
	class Review extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_review');
			$this->load->model('m_place');
			$this->load->model('m_user');
		}

		public function index(){

		}

		public function writeReview($place_id){
			if ($this->session->userdata('user_id')) {
				$temp['place'] = $this->m_place->select_place_id($place_id);
				$temp['template'] = 'vf_review';
				$temp['title'] = 'review';
				$temp['new_places'] = $this->m_place->select_new_places(10);

				$this->form_validation->set_rules('txtReview', '"Your Review"', 'required|xss_clean');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('frontend/manage',$temp);
				}
				else
				{
					$this->insert($place_id);
				}

			} else {
				//neu chua login
				redirect('login');
			}
			
			

		}
		/*
		**************
		* insert
		**************
		*/
		public function insert($place_id){
			//lay so sao
			$star = $this->input->post('rating');
			//lay textarea
			$text = $this->input->post('txtReview');
			//neu co start
			if ($star == false) {
				$star = 0;
			}
			//thuc hien insert vao bang review
			$array = array('place_id'=>$place_id,'text'=>nl2br($text),'star_quantity'=>$star,'user_id'=>$this->session->userdata('user_id'));
			$this->m_review->insert($array);

			redirect('place/displayPlace/'.$place_id);
		}
		/*
		**************
		* delete
		**************
		*/

		public function delete($review_id){
			$this->m_review->delete($review_id);
		}
	}
 ?>