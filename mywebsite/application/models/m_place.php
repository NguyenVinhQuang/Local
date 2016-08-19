<?php 
	/**
	* m_places
	*/
	class M_place extends CI_Model
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

		public function select_new_places($num){
			$this->db->limit($num);
			$this->db->order_by('id','desc');
			$query = $this->db->get('places');
			$data = $query->result_array();
			return $data;
		}
		public function select_place_id($id){
			$this->db->where('id',$id);
			$query = $this->db->get('places');
			$data = $query->row_array();
			return $data;
		}
		public function select_last_place(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('places');
			$data = $query->row_array();
			return $data;
		}
		/*
		**************
		* insert
		**************
		*/
		public function insert($array){
			$this->db->insert('places',$array);
		}

		/*
		**************
		* delete
		**************
		*/
		public function delete($place_id){
			$this->db->where('id',$place_id);
			$this->db->delete('places');
		}
		/*
		**************
		* update
		**************
		*/
		public function update($temp,$place_id){
			$this->db->where('id',$place_id);
			$this->db->update('places',$temp);
		}
	}
 ?>