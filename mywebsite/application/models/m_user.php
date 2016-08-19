<?php 
	/**
	* m_user
	*/
	class M_user extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function select_id($account,$password){
			$md5pass = md5($password);
	  		$this->db->where('account', $account);
	  		$this->db->where('password', $md5pass);
	  		$query = $this->db->get('user');
	  		$data = $query->row_array();  		
	  		if($query->num_rows() > 0){
	  			return $data;
	  		}	
	  		else{
	  			return FALSE;
	  		}
		}
		public function select_user($id){
			$this->db->where('id',$id);
			$query = $this->db->get('user');
			$data = $query->row_array();
			return $data;
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('user',$array);
		}

		/*
		**************
		* update
		**************
		*/

		public function update($user_id,$data){
			$this->db->where('id',$user_id);
			$this->db->update('user',$data);
		}
	}
 ?>