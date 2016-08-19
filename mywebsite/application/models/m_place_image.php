<?php 
	/**
	* 
	*/
	class M_place_image extends CI_Model
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
		public function select_all($id){
			$this->db->where('id',$id);
			$query = $this->db->get('place_image');
			$data=$query->row_array();
			return $data;
		}
		public function select_order_by_vote($place_id){
			$this->db->where('place_id',$place_id);
			$this->db->order_by('vote','desc');
			$query = $this->db->get('place_image');
			$data = $query->row_array();
			return $data;
		}
		public function select_all_place_id($place_id){
			$this->db->where('place_id',$place_id);
			$query = $this->db->get('place_image');
			$data = $query->result_array();
			return $data;
		}

		public function select_all_user_id($user_id){
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('place_image');
			$data = $query->result_array();
			return $data;
		}

		public function select_place_id($id){
			$this->db->order_by('id','desc');
			$this->db->where('place_id',$id);
			$query = $this->db->get('place_image');
			$data = $query->result_array();
			return $data;
		}
		public function join_place_image_user($place_id,$number,$offset){
			$this->db->select('place_image.user_id, place_image.vote,place_image.id, place_image.name, user.account, place_image.place_id');
			$this->db->from('place_image');
			$this->db->join('places','place_image.place_id = places.id','inner');
			$this->db->join('user','place_image.user_id = user.id','inner');
			$this->db->where('place_image.place_id',$place_id);
			$this->db->order_by('place_image.vote','desc');
			$this->db->limit($number,$offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}
		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('place_image',$array);
		}

		/*
		**************
		* update
		**************
		*/

		public function update($img_id,$array){
			$this->db->where('id',$img_id);
			$this->db->update('place_image',$array);
		}
		/*
		**************
		* delete
		**************
		*/

		public function delete($img_id){
			$this->db->where('id',$img_id);
			$this->db->delete('place_image');
		}
	}
 ?>