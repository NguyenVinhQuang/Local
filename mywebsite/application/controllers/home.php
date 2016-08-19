<?php 
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_category');
		$this->load->model('m_place');
		$this->load->model('m_user');
		$this->load->model('m_place_category');
	}
	public function index(){
		$temp['title'] = 'Home';
		$temp['template'] = 'vf_home';
		$temp['parent'] = $this->m_category->selectParent();
		$temp['new_places'] = $this->m_place->select_new_places(10);
		$this->session->set_userdata('last_page',base_url().'index.php/home');
		$this->load->view('frontend/manage',$temp);
	}

	public function category($cate_id){
		//lay va phan trang cac place trong category
		// load thư viện cần thiết 
	        $this->load->library('pagination');

	        // cấu hình phân trang 
	        $config['base_url'] = base_url().'index.php/home/category/'.$cate_id; // xác định trang phân trang 
	        $config['total_rows'] = count($this->m_category->place_category($cate_id)); // xác định tổng số review 
	        $config['per_page'] = 5; // xác định số recode_string(request, string)d ở mỗi trang 
	        $config['uri_segment'] = 4; // xác định segment chứa page number 
	        $this->pagination->initialize($config);

	    $temp['place'] = $this->m_category->pagination_place_category($cate_id,$config['per_page'], $this->uri->segment(4));
	    $temp['parent'] = $this->m_category->selectCategory($cate_id);
		$temp['title'] = 'Category';
		$temp['template']='vf_category';
		$temp['start'] = $this->uri->segment(4) + 1;
		$temp['end'] = (($this->uri->segment(4) + $config['per_page'])>$config['total_rows'])?$config['total_rows']:($this->uri->segment(4) + $config['per_page']);
		$temp['total'] = $config['total_rows'];
		$this->load->view('frontend/manage',$temp);
	}
} ?>