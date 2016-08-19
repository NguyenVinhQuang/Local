<?php 
/**
* 
*/
class Child_categories extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_category');
	}
	public function index(){
		$this->displayAllForm();
	}
	/*
	**************
	* select
	**************
	*/
	public function displayAllForm(){
		if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
			$this->session->set_userdata('ss_id_parent',1);
			redirect('child_categories/page');
		}
		else redirect('admin');
		
	}
	public function displayList($id){
			//khoi tao  session id
			$this->session->set_userdata('ss_id_parent',$id);
			redirect('child_categories/page');
	}

	public function page(){
		if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
					//lay id
					$id = $this->session->userdata('ss_id_parent');
					// load thư viện cần thiết 
			        $this->load->library('pagination');

			        // cấu hình phân trang 
			        $config['base_url'] = base_url('index.php/child_categories/page'); // xác định trang phân trang 
			        $config['total_rows'] = $this->m_category->count_child($id); // xác định tổng số record 
			        $config['per_page'] = 5; // xác định số recode_string(request, string)d ở mỗi trang 
			        $config['uri_segment'] = 3; // xác định segment chứa page number 
			        $this->pagination->initialize($config); 

					//thiet lap cac bien truyen di
					$temp["totalRows"] = $this->m_category->count_child($id);
					$temp["start"] = $this->uri->segment(3) + 1;
					$temp["end"] = $this->uri->segment(3) + $config['per_page'];
					//neu gia tri so sanh gia tri end va totalRow, lay cai nho hon
					$temp["end"] = ($temp["end"]<= $temp["totalRows"])? $temp["end"]: $temp["totalRows"];
					$temp['backend'] = base_url().'index.php/admin'; 
					//lay du lieu tu model
					$temp["child"] = $this->m_category->pagination_child($id,$config['per_page'], $this->uri->segment(3), $id);
					$this->session->set_userdata('ss_page',$this->uri->segment(3));
					
					$temp['title'] = 'Child categories';
					$temp['template']='vb_childCategories'; 
					//lay het du lieu tu bang parentCategories
					$temp['parent'] = $this->m_category->selectExceptId($id);
					$temp['parentSelect'] = $this->m_category->selectOneId($id);
					$temp['parentAll'] = $this->m_category->selectParent();
					$this->load->view('backend/vb_manage',$temp); 
		}
		else redirect('admin');
	}

	/*
	**************
	* modify
	**************
	*/

	public function modify(){
		$action = $this->input->post('action');
		$action = strtolower($action);
		switch ($action) {
			case 'delete':
				$this->delete();
				break;
			case 'edit':
				//lay id cac truong duoc checked
				$this->session->set_userdata('ss_update',$this->input->post('sl_id'));
				redirect('child_categories/update');
				break;
			
			default:
				//redirect('1');
				break;
		}
	}

	/*
	**************
	* delete
	**************
	*/	

	public function delete(){
		//lay id
		$id = $this->input->post('sl_id');
		//chong truy nhap truc tiep
		//kiem tra du lieu duoc check
		if(is_array($id)){
			//tao vong lap for thuc hien xoa theo id
			foreach ($id as $id) {
				$temp = array('id' => $id );
				$this->m_category->delete($temp);
			}
			redirect('child_categories/page/'.$this->session->userdata('ss_page'));
		}
		//neu khong co du lieu nao duoc check
		else{
			redirect("1");
		}
	}

	/*
	**************
	* update
	**************
	*/

	//hien thi trang update
	public function update(){
		if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
			$id = $this->session->userdata('ss_update');//lay tat ca cac id da duoc checked
			$idParent = $this->session->userdata('ss_id_parent');

			//chong truy cap truc tiep
			//neu co du lieu duoc check
			if(is_array($id)){
				$temp["title"] = "Edit Child categories";
				$temp["template"] = "vb_edit_childCategories";
				$temp['backend'] = base_url().'index.php/admin';
				$temp['dataTable'] = $this->m_category->select_list_id($id);
				$temp['parentAll'] = $this->m_category->selectParent();
				$temp['parentSelect'] = $this->m_category->selectOneId($idParent);
				$this->load->view('backend/vb_manage',$temp);
			}
			//neu chua co du lieu duoc check
			else{
				 redirect('1');
			}
		}
		else redirect('admin');
		
	}/*end update*/

	public function  excUpdate(){
		//khong cho phep truy cap action truc tiep
		//input post check la hidden input ben view
		if ($this->input->post('check')!='true') {
			redirect('1');
		}
		else{
			//lay id
			$sl_id_dataArray = $this->session->userdata('ss_update');
			foreach ($sl_id_dataArray as $id) {
				
				//lay gia tri
				$value = $this->input->post($id);

				//chinh sua gia tri
				$value = trim($value);
				//check null
				if ($value != '') {
					//check ton tai trong csdl
					if ($this->m_category->count_Name($value) == 0) {
						//cho du lieu vao 1 mang
						$data = array(
						               'name' => ucwords( strtolower($value) )
						            );
						//thuc hien lenh update
						$this->m_category->update($id,$data);

						
					}
					else{
						//neu co trong csdl roi thi khong update
					}

				}
				else{
					//neu null thi khong update 
				}
				
			} /*end foreach*/

			//update xong thi huy session update
			$this->session->unset_userdata('ss_update');
			//chuyen ve trang hien thi child
			redirect('child_categories/page/'.$this->session->userdata('ss_page'));
		}
	} /*end excUpdate*/

	/*
	**************
	* insert
	**************
	*/	

	public function insert(){
		//lay so luong input
		$num = $this->input->post('select');
		//lay id parent
		$name = $this->input->post('selectParent');
		$data = $this->m_category->getId_Name($name);
		$id = $data['id'];
		//lay gia tri input
		for ($i=0; $i < $num; $i++) { 
			$value = $this->input->post('txtName'.$i);
			$value = trim($value);
			//check null
			if ($value != '') {
				//check ton tai trong csdl
				if ( $this->m_category->count_name_child($value,$id) == 0) {
					//thuc hien insert
					$temp=array(
						"name"=>ucwords( strtolower($value) ),
						"id_parent"=>$id
					);
					$this->m_category->insert($temp);
				}
			}
		}
		redirect('child_categories');
		
	}


}
 ?>