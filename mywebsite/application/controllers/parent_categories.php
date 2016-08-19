<?php

class Parent_categories extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_category');
	}

	public function index(){
		$this->displayParentCategories();//hien thi thong tin Parent categories
		
	}
	public function test(){
		if (isset($SESSION['edit'])) {
			echo "co ton tai edit";
		}
		else{
			echo "khong ton tai";
		}
	}
	/*
	**************
	* select
	**************
	*/
	public function displayParentCategories(){
		if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
					// load thư viện cần thiết 
			        $this->load->library('pagination');
			         
			        
			        // cấu hình phân trang 
			        $config['base_url'] = base_url('index.php/parent_categories/displayParentCategories'); // xác định trang phân trang 
			        $config['total_rows'] = $this->m_category->count_parent(); // xác định tổng số parent 
			        $config['per_page'] = 5; // xác định số recode_string(request, string)d ở mỗi trang 
			        $config['uri_segment'] = 3; // xác định segment chứa page number 
			        $this->pagination->initialize($config); 

					//hien thi view vb_parentCategories
					$temp["title"] = "admin";
					$temp["template"] = "vb_parentCategories";
					$temp["totalRows"] = $this->m_category->count_parent();
					$temp["start"] = $this->uri->segment(3) + 1;
					$temp["end"] = $this->uri->segment(3) + $config['per_page'];
					//neu gia tri so sanh gia tri end va totalRow, lay cai nho hon
					$temp["end"] = ($temp["end"]<= $temp["totalRows"])? $temp["end"]: $temp["totalRows"];
					$temp['backend'] = base_url().'index.php/admin'; 

					$temp["pagination_parent"] = $this->m_category->pagination_parent($config['per_page'], $this->uri->segment(3));
					$this->load->view('backend/vb_manage',$temp); 
		}
		else redirect('admin');
		
	} /*end function displayParentCategories*/


	/*
	**************
	* insert
	**************
	*/
	public function insertParentCategories(){
		$number  = $this->input->post('select');//lay so luong input
		//kiem tra tung gia tri
		for ($i=0; $i < $number; $i++) { 
			$value = trim($this->input->post('txtName'.$i));
			//neu gia tri khac rong thi kiem tra tiep
			if ($value !='') {
				//neu gia tri chua co trong csdl
				if ($this->m_category->count_Name($value) == 0) {
					$temp=array(
						"name"=>ucwords( strtolower($value) )
					);
					$this->m_category->insert($temp);
					//update truong id_parent = id
					$last_parent = $this->m_category->select_last_parent();
					$id = $last_parent['id'];
					$array = array('id_parent'=>$id);
					$this->m_category->update($id,$array);
				}				
			}
		}

		redirect('parent_categories');
		/*$this->load->library('form_validation');
		$this->form_validation->set_rules('txtName', 'Name:', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){		
			redirect('1');
			}
		else{
			$name=$this->input->post('txtName');
			$temp=array(
				"Name_Parent_Categories"=>$name,
				
			);
			$this->m_parent_categories->insert_one($temp);
			redirect('parent_categories');
		} */
	} /*end function */


	/*
	**************
	* modify
	**************
	*/

	public function modify(){
		switch ( $this->input->post('action') ) {
			case 'Delete':
				$this->delete();
				break;
			case 'Edit':
				//lay id cac truong duoc checked
				$this->session->set_userdata('ss_update',$this->input->post('sl_id'));
				redirect('parent_categories/update');
				break;
			
			default:
				redirect('1');
				break;
		}
	}

	public function delete(){
		//delete duoc goi tu action modify
		//lay tat ca cac id da duoc checked
		$sl_id = $this->input->post('sl_id');

		//kiem tra neu sl_id la mot mang (tuc la da co du lieu duoc check)
		if(is_array($sl_id)){
			//tao vong lap for thuc hien xoa theo id
			foreach ($sl_id as $id) {
				$temp = array('id_parent' => $id );
				$this->m_category->delete($temp);
			}
			redirect('parent_categories');
		}
		//neu khong co du lieu nao duoc check
		else{
			redirect("1");
		}
	}
	//hien thi trang update
	public function update(){
		//update duoc goi tu action modify
		$sl_id_dataArray = $this->session->userdata('ss_update');//lay tat ca cac id da duoc checked

		//kiem tra neu sl_id la mot mang (tuc la da co du lieu duoc check)
		if(is_array($sl_id_dataArray)){
			
			$temp["title"] = "Edit Parent categories";
			$temp["template"] = "vb_edit_parentCategories";
			$temp['backend'] = base_url().'index.php/parent_categories/displayParentCategories';
			$temp['dataTable'] = $this->m_category->select_list_id($sl_id_dataArray);

			$this->load->view('backend/vb_manage',$temp);
		}
		//neu chua co du lieu duoc check
		else{
			 redirect('1');
		}
	} /*end update*/

	//thuc thi update
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
			//chuyen ve trang hien thi parentcategories
			redirect('parent_categories/displayParentCategories');
		}
	}
} /*end class*/
?>