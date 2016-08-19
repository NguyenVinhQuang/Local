<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_place');
		$this->load->model('m_place_image');
		$this->load->model('m_user');
	}

	function index(){
		redirect('home');
	}
	function displayUpload($place_id = 'true'){
		if ($this->session->userdata('user_id') ) {
			if ($place_id == 'true') {
			redirect('home');
		} else {
			$temp['title'] = 'upload';
			$temp['template'] = 'vf_upload_image_place';
			$temp['error'] = ' ';
			$temp['place'] = $this->m_place->select_place_id($place_id);
			$this->load->view('frontend/manage', $temp);	
		}
		} else {
			redirect('login');
		}
	}

	function do_upload($place_id = 'true')
	{
		if ($this->session->userdata('user_id') ) {
			if ($place_id != 'true') {
				if (!file_exists('./resources/images/place/place_'.$place_id ) ) {
				    mkdir('./resources/images/place/place_'.$place_id);
				}
				$config['upload_path'] = './resources/images/place/place_'.$place_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					//upload ko thanh cong
					$temp['title'] =  'upload';
					$temp['template'] = 'vf_upload_image_place';
					$temp['error'] = $this->upload->display_errors();
					$temp['place'] = $this->m_place->select_place_id($place_id);
					$this->load->view('frontend/manage', $temp);
				}
				else
				{
					//upload thanh cong
					$upload_data = $this->upload->data();
					$array = array('place_id'=>$place_id
									,'user_id'=>$this->session->userdata('user_id')
									,'name'=> $upload_data['file_name']);
					$this->m_place_image->insert($array);

					//update photo trong bang places
					$avatar = $this->m_place_image->select_order_by_vote($place_id);
					$photo = array('photo'=> $avatar['name']);
					$this->m_place->update($photo,$place_id);

					redirect($this->session->userdata('last_page'));
				}
			}
			else{
				redirect('home');
			}
		}
		else{
			redirect('login');
		}
		
	}
}
?>