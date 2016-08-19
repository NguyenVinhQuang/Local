<?php 
	/**
	* 
	*/
	class M_child_categories extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		/*
		**************
		* select
		**************
		*/

		public function selectList(){
			$query = $this->db->get("child_categories");
			$data = $query->result_array();
			return $data;
		}

		public function select_list_id($id){
			//$id is a array
			foreach ($id as $id) {
				$query = $this->db->or_where('Id_Child_Categories',$id);
			}
			$query = $this->db->get("child_categories");
			$data = $query->result_array();
			return $data;
		}

		public function count_name($name){
			$str = '
				SELECT * 
				FROM  child_categories
				WHERE UPPER(  Name_Child_Categories ) = UPPER(  "'.$name.'" )
			';
			$query = $this->db->query($str);
			$num = $query->num_rows();
			return $num;
		}
		public function selectId($id){
			$this->db->where('Id_Parent_Categories',$id);
			$query = $this->db->get("child_categories");
			$data = $query->result_array();
			return $data;
		}

		public function countId($id){
			$this->db->where('Id_Parent_Categories',$id);
			$query = $this->db->get("child_categories");
			$num = $query->num_rows();
			return $num;
		}

		public function select_and_pagination($number,$offset,$id){
			$this->db->where('Id_Parent_Categories',$id);
			$this->db->order_by("Id_child_Categories", "desc"); 
			$query = $this->db->get("child_categories",$number, $offset);
			$data = $query->result_array();
			return $data;
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert_one($data){
			$this->db->insert('child_categories',$data);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($temp){
			$this->db->delete('child_categories', $temp); 
		}

		/*
		**************
		* update
		**************
		*/	

		public function update($id,$data){
			$this->db->where('Id_Child_Categories', $id);
			$this->db->update('child_categories', $data); 
		}
	}
 ?>