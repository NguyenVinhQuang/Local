<?php 
	/**
	* 
	*/
	class M_user_image extends CI_Model
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

		public function select($user_id,$img_id){
			$this->db->where('user_id',$user_id);
			$this->db->where('image_id',$img_id);
			$query = $this->db->get('user_image');
			$data = $query->row_array();
			return $data;
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($data){
			$this->db->insert('user_image',$data);
		}
		/*
		**************
		* delete
		**************
		*/

		public function delete($user_id,$img_id){
			$this->db->where('user_id',$user_id);
			$this->db->where('image_id',$img_id);
			$this->db->delete('user_image');
		}
	}
 ?>