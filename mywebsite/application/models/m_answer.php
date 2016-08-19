<?php 
	/**
	* m_answer
	*/
	class M_answer extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		/*
		**************
		* select
		**************
		*/
		public function selectAllId($id){
			$this->db->where('id_info',$id);
			$query = $this->db->get('answer');
			$data = $query->result_array();
			return $data;
		}

		/*
		**************
		* delete
		**************
		*/

		public function deleteId($id){
			$this->db->where('id_info',$id);
			$this->db->delete('answer');
		}
		public function delete($id,$answer){
			$this->db->where('id_info',$id);
			$this->db->where('answer',$answer);
			$this->db->delete('answer');

		}

		/*
		**************
		* update
		**************
		*/

		public function update($id,$answer,$array){
			$this->db->where('id_info',$id);
			$this->db->where('answer',$answer);
			$this->db->update('answer',$array);
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('answer',$array);
		}
	}
 ?>