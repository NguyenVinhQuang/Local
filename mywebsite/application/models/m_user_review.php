<?php 
	/**
	* m_user_review
	*/
	class M_user_review extends CI_Model	
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

		public function select($user_id,$review_id){
			$this->db->where('user_id',$user_id);
			$this->db->where('review_id',$review_id);
			$query = $this->db->get('user_review');
			$data = $query->row_array();
			return $data;

		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('user_review',$array);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($user_id,$review_id){
			$this->db->where('user_id',$user_id);
			$this->db->where('review_id',$review_id);
			$this->db->delete('user_review');
		}
	}
 ?>