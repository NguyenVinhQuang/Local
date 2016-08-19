<?php 
	/**
	* model info
	*/
	class M_info extends CI_Model
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

		//dem tat ca ban ghi trong info
		public function count_all(){
			return $this->db->count_all('info'); 
		}
		public function count_asc_name($number,$offset){
			$this->db->order_by('name','asc');
			$query = $this->db->get('info',$number,$offset);
			$num= $query->num_rows();
			return $num;
		}
		//select tat ca voi truong name desc
		public function select_asc_name($number,$offset){
			$this->db->order_by('name','asc');
			$query = $this->db->get('info',$number,$offset);
			$data= $query->result_array();
			return $data;
		}

		public function selectAllId($id){
			$this->db->where('id',$id);
			$query = $this->db->get('info');
			$data = $query->result_array();
			return $data;
		}
		public function selectLastRow(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('info');
			$data = $query->row_array();
			return $data;
		}

		/*
		**************
		* update
		**************
		*/

		public function update($id,$array){
			$this->db->where('id',$id);
			$this->db->update('info',$array);
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('info',$array);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('info');
		}
	}
 ?>