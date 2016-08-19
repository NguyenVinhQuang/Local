<?php 
	/**
	* result
	*/
	class Result extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_review');
			$this->load->model('m_place_category');
			$this->load->model('m_user');
		}

		public function index(){
			$keyWord = trim($this->input->post('txtKeyword'));
			if ($keyWord == false) {
				//neu khong co du lieu keu word
				redirect('home');
			}
			else{
				redirect('result/displayResult/'.$keyWord.'');
			}
		}
		public function displayResult($word){
			$keyWord = $word;
			$this->session->set_userdata('last_page',base_url().'index.php/result/displayResult/'.$keyWord.'');
			//bo di cac ky tu dac biet
			$keyWord = trim(str_replace( array('!', '@', '#', '$','.') , '', $keyWord ));
			//thay the %20 bang ' '
			$keyWord_space = trim(str_replace( array('%20') , ' ', $keyWord ));
			//upper
			$keyWord_space_upper = strtoupper(trim(str_replace( array('%20') , ' ', $keyWord ))) ;
			//lay word trong string dua vao 1 mang
			$word_array = explode(" ",$keyWord_space_upper);

			// load thư viện cần thiết 
	        $this->load->library('pagination');

	        // cấu hình phân trang 
	        $config['base_url'] = base_url().'index.php/result/displayResult/'.$word; // xác định trang phân trang 
	        $config['total_rows'] = $this->m_review->count_search($word_array); // xác định tổng số review 
	        $config['per_page'] = 10; // xác định số recode_string(request, string)d ở mỗi trang 
	        $config['uri_segment'] = 4; // xác định segment chứa page number 
	        $this->pagination->initialize($config);

			$result = $this->m_review->search($word_array,$config['per_page'], $this->uri->segment(4));
			$temp['title'] = 'result';
			$temp['template']='vf_result';
			$temp['keyword_space'] = $keyWord_space;
			$temp['result'] = $result;
			$temp['start'] = $this->uri->segment(4) + 1;
			$temp['end'] = (($this->uri->segment(4) + $config['per_page'])>$config['total_rows'])?$config['total_rows']:($this->uri->segment(4) + $config['per_page']);
			$temp['total'] = $config['total_rows'];


			$this->load->view('frontend/manage',$temp);
		}
	}
 ?>