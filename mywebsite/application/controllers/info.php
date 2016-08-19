<?php 
	/**
	* controller info
	*/
	class Info extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_info');
			$this->load->model('m_answer');
		}

		public function index(){
			$this->display();
		}

		public function display(){
			if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
				$temp['title'] = 'Info';
				$temp['template'] = 'vb_info';
				$temp['backend'] = base_url().'index.php/admin'; 
				
				$this->load->view('backend/vb_manage',$temp);
			}
			else{
				redirect('admin');
			}
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($id){
			//thuc hien xoa
			$this->m_info->delete($id);
			//load lai bang ajax
			$this->load->view('backend/ajax_display_info');
		}

		public function confirmDelete($id){
			$temp['id'] = $id;
			$this->load->view('backend/ajax_confirm_delete_info',$temp);	
		}

		public function returnDelete($id){
			$temp['id'] = $id;
			$this->load->view('backend/ajax_return_delete_info',$temp);
		}

		/*
		**************
		* edit
		**************
		*/	
		public function displayEdit($id){
			if ($this->session->userdata('logged_in') and $this->session->userdata('user_level') == 1) {
				$temp['title'] = 'Info';
				$temp['template'] = 'ajax_edit_info';
				$temp['backend'] = base_url().'index.php/admin';
				$temp['id'] = $id;
				$info = $this->m_info->selectAllId($id);
				foreach ($info as $data) {
					$temp['type'] = $data['type'];
					$temp['info'] = $data['name'];
				}
				$temp['answer'] = $this->m_answer->selectAllId($id);
				
				$this->load->view('backend/vb_manage',$temp);
			}
			else{
				redirect('admin');
			}
			
		}

		public function excEdit(){
			$id = $this->input->post('id');
			$type = $this->input->post('select');
			$info = $this->input->post('txtName');
			if ($type == 'yn' or $type=="none") {
				switch ($type) {
					case 'yn':
						$type = 1;
						break;
					case 'none':
						$type = null;
						break;
					default:
						# code...
						break;
				}
				$this->m_answer->deleteId($id);
				$array = array('name'=>$info,'type'=>$type);
				$this->m_info->update($id,$array);
			}
			else{//$type = mc
				$count= $this->input->post('btnHide');
				$check = false;
				for($i = 1; $i<=($count-1);$i++){
					$answer = $this->input->post('txtAnswer'.$i);
					$answer = trim($answer);
					if ($answer != '') {
						$check = true;
						$hide = $this->input->post('txtHide'.$i);
						if ($hide != '') {
							$array = array('answer'=>$answer);
							$this->m_answer->update($id,$hide,$array);
						}
						else{//truong hide = null
							$array = array('id_info'=>$id,'answer'=>$answer);
							$this->m_answer->insert($array);
						}
					}
					else{//trong cac truong answer != null
						$hide = $this->input->post('txtHide'.$i);
						if ($hide != '') {
							$this->m_answer->delete($id,$hide);
						}
					}
				}

				if ($check == true) {
					$type = 2;
					$array = array('name'=>$info,'type'=>$type);
					$this->m_info->update($id,$array);
				}
			}

			redirect('info');

		}

		/*
		**************
		* insert
		**************
		*/

		public function insert(){
			//chong truy cap truc tiep
			if ($this->input->post('check') == true) {
				$name = $this->input->post('txtName');
				$name= trim($name);
				//kiem tra truong name != null
				if ($name != '') {
					$type = $this->input->post('select');
					switch ($type) {
						case 'none':
							$type = null;
							break;
						case 'yn':
							$type = 1;
							break;
						case 'mc':
							$type = 2;
							break;
						default:
							# code...
							break;
					}
					if ($type == null or $type ==1) {
						$array = array('name'=>ucwords(strtolower($name) ),'type'=>$type);
						$this->m_info->insert($array);
					}
					//truong hop $type =2
					else{
						$count = $this->input->post('btnHide');
						$count = $count-1;
						$check = false;
						for ($i=1; $i<=$count ; $i++) { 
							$answer = $this->input->post('txtAnswer'.$i);
							if ($answer != '') {
								$check = true;
							}
						}

						if ($check == true) {
							$array = array('name'=>ucwords(strtolower($name) ),'type'=>$type);
							$this->m_info->insert($array);

							$data = $this->m_info->selectLastRow();
							$id= $data['id'];
						}

						for ($i=1; $i<=$count ; $i++) { 
							$answer = $this->input->post('txtAnswer'.$i);
							if ($answer != '') {
								$array = array('id_info'=>$id,'answer'=>$answer);
								$this->m_answer->insert($array);
							}
						}

					}
				}
				redirect('info');
				
			}
			else redirect('1');
			//lay so lan lap
			//lay id

		}
	}
 ?>