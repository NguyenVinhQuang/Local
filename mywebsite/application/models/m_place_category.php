<?php 
	/**
	* 
	*/
	class M_place_category extends CI_Model
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

		public function select_category($place_id){
			$query = $this->db->query('
					select * from place_category as a
					inner join category as b on a.id_category = b.id
					where a.place_id = '.$place_id.'
				');
			$data = $query->result_array();
			return $data;
		}

		public function select($place_id,$id_category){
			$this->db->where('place_id',$place_id);
			$this->db->where('id_category',$id_category);
			$query = $this->db->get('place_category');
			$data = $query->result_array();
			return $data;
		}
		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('place_category',$array);
		}
		/*
		**************
		* delete
		**************
		*/
		//delete where place_id
		public function delete($place_id){
			$this->db->where('place_id',$place_id);
			$this->db->delete('place_category');
		}
	}
 ?>