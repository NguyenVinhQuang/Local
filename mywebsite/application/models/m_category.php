<?php 
	/**
	* m_category
	*/
	class M_category extends CI_Model
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
		public function place_category($cate_id){
			$this->db->select('*');
			$this->db->from('place_category');
			$this->db->join('category','place_category.id_category = category.id','inner');
			$this->db->join('places','place_category.place_id = places.id','inner');
			$this->db->where('category.id_parent',$cate_id);
			$this->db->group_by('places.id');
			$this->db->order_by('places.review_quantity','desc');
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}
		public function pagination_place_category($cate_id,$number,$offset){
			$this->db->select('*');
			$this->db->from('place_category');
			$this->db->join('category','place_category.id_category = category.id','inner');
			$this->db->join('places','place_category.place_id = places.id','inner');
			$this->db->where('category.id_parent',$cate_id);
			$this->db->group_by('places.id');
			$this->db->order_by('places.review_quantity','desc');
			$this->db->limit($number,$offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;

		}
		public function selectCategory($id_parent){
			$this->db->where('id',$id_parent);
			$query = $this->db->get('category');
			$data = $query->row_array();
			return $data;
		}
		public function selectParent(){
			$query = $this->db->query('
					select * from category
					where id = id_parent
				');
			
			$data = $query->result_array();
			return $data;
		}
		//select parent order by name asc
		public function select_asc_name(){
			$query = $this->db->query('
					select * from category
					where id = id_parent
					order by name asc
				');
			$data = $query->result_array();
			return $data;
		}

		//dem tong so parent
		public function count_parent(){
			$query = $this->db->query('
					select * from category
					where id = id_parent
				');
			
			$num = $query->num_rows();
			return $num;
		}
		//phan trang parent
		public function pagination_parent($number,$offset){
			if ($offset == null) {
				$offset = 0;
			}
			$query = $this->db->query('
					select * from category
					where id = id_parent
					limit '.$offset.', '.$number.'
				');
			$data = $query->result_array();
			return $data;
		}
		//dem ten parent
		public function count_Name($Name){
			$str = '
				SELECT * 
				FROM  category
				where id = id_parent
				and UPPER(  name ) = UPPER(  "'.$Name.'" ) 
				';
			$query = $this->db->query ($str);
			$num = $query->num_rows();
			return $num;
		}
		public function select_last_parent(){
			$str = '
				SELECT * 
				FROM  category
				order by id desc
				';
			$query = $this->db->query ($str);
			$data = $query->row_array();
			return $data;
		}
		//lay tat ca du lieu theo nhieu id
		public function select_list_id($id){
			//$id is a array
			foreach ($id as $id) {
				$query = $this->db->or_where('id',$id);
			}
			$query = $this->db->get("category");
			$data = $query->result_array();
			return $data;
		}
		//lay tat ca parent ngoai tru $id
		public function selectExceptId($id){
			$str = '
				SELECT * 
				FROM  category
				where id = id_parent
				and id_parent != '.$id.' 
				';
			$query = $this->db->query ($str);
			$data = $query->result_array();
			return $data;
		}
		//lay 1 parent $id
		public function selectOneId($id){
			$str = '
				SELECT * 
				FROM  category
				where id = id_parent
				and id_parent = '.$id.' 
				';
			$query = $this->db->query ($str);
			$data = $query->result_array();
			return $data;
		}
		public function getId_Name($Name){
			$str = '
				SELECT id
				FROM  category
				where id = id_parent
				and  UPPER(  name ) =  UPPER(  "'.$Name.'" )
			';

			$query = $this->db->query($str);
			$data = $query->row_array();
			return $data;
		}
		/*
		**************
		* select child
		**************
		*/
		//dem child theo $id_ parent
		public function count_child($id_parent){
			$str = '
				SELECT * 
				FROM  category
				where id != id_parent
				and id_parent = '.$id_parent.' 
				';
			$query = $this->db->query ($str);
			$num = $query->num_rows();
			return $num;
		}
		//phan trang child theo $id_parent
		public function pagination_child($id_parent,$number,$offset){
			if ($offset == null) {
				$offset = 0;
			}
			$query = $this->db->query('
					select * from category
					where id != id_parent
					and id_parent = '.$id_parent.'
					limit '.$offset.', '.$number.'
				');
			$data = $query->result_array();
			return $data;
		}
		//dem child theo name va $ip_parent
		public function count_name_child($name,$id_parent){
			$str = '
				SELECT * from category
				where id != id_parent
				and id_parent = '.$id_parent.'
				and UPPER(  name ) = UPPER(  "'.$name.'" )
			';
			$query = $this->db->query($str);
			$num = $query->num_rows();
			return $num;
		}
		//select child theo parent
		public function select_child_id_parent($id_parent){
			$str = '
				SELECT * from category
				where id != id_parent
				and id_parent = '.$id_parent.'
				order by name asc
			';
			$query = $this->db->query($str);
			$data = $query->result_array();
			return $data;
		}
		

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('category',$array);
		}

		/*
		**************
		* update
		**************
		*/

		public function update($id,$array){
			$this->db->where('id', $id);
			$this->db->update('category', $array);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($temp){
			$this->db->delete('category', $temp); 
		}
	}
 ?>