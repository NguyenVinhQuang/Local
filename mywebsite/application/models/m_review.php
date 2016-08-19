<?php 
	/**
	* m_review
	*/
	class M_review extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function index(){

		}

		/*
		**************
		* select
		**************
		*/

		public function select_desc_useful($id_place){
			$this->db->where('place_id',$id_place);
			$query = $this->db->get('review');
			$data = $query->result_array();
			return $data;
		}
		public function count_avg_star($place_id){
			$query = $this->db->query("
					select
					avg(star_quantity) as star
					from review 
					where place_id = ".$place_id."  and star_quantity != 0 and status = true
				");
			$data = $query->row_array();
			return $data;
		}
		public function count_all_review($place_id){
			$query = $this->db->query("
					select
					*
					from review 
					where place_id = ".$place_id."
				");
			$num =$query->num_rows();
			return $num;
		}
		public function count_review_on($place_id){
			$query = $this->db->query("
					select
					*
					from review 
					where place_id = ".$place_id." and status = true
				");
			$num =$query->num_rows();
			return $num;
		}
		public function pagination_review($place_id, $number, $offset){
			$this->db->select('review.*, user.account, user.photo');
			$this->db->from('review');
			$this->db->join('user','review.user_id = user.id','inner');
			$this->db->order_by('review.id','desc');
			$this->db->where('review.place_id',$place_id);
			$this->db->limit($number, $offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}
		public function pagination_review_onl($place_id, $number, $offset){
			$this->db->select('review.*, user.account, user.photo');
			$this->db->from('review');
			$this->db->join('user','review.user_id = user.id','inner');
			$this->db->order_by('review.id','desc');
			$this->db->where('review.place_id',$place_id);
			$this->db->where('review.status',true);
			$this->db->limit($number, $offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}
		public function count_search($word_array){
			$this->db->select('*');
			$this->db->from('places');
			$this->db->join('review','review.place_id = places.id','left');
			foreach ($word_array as $data) {
				$this->db->or_like('ucase(review.text)',$data);
				$this->db->or_like('ucase(places.name)',$data);
			}
			$this->db->group_by('places.id');
			$this->db->order_by('places.review_quantity','desc');
			$query = $this->db->get();
			$num = $query->num_rows();
			return $num;
		}
		public function search($word_array,$number,$offset){
			$this->db->select('*, places.id as place_id');
			$this->db->from('places');
			$this->db->join('review','review.place_id = places.id','left');
			foreach ($word_array as $data) {
				$this->db->or_like('ucase(review.text)',$data);
				$this->db->or_like('ucase(places.name)',$data);
			}
			$this->db->group_by('places.id');
			$this->db->order_by('places.review_quantity','desc');
			$this->db->limit($number,$offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}

		public function select_id($id){
			$this->db->where('id',$id);
			$query = $this->db->get('review');
			$data = $query->row_array();
			return $data;

		}
		public function review_place($user_id,$number,$offset){
			$this->db->select('*, review.id as id');
			$this->db->from('review');
			$this->db->join('places', 'review.place_id = places.id','inner');
			$this->db->where('review.user_id',$user_id);
			$this->db->where('review.status',true);
			$this->db->order_by('review.date_start','desc');
			$this->db->limit($number, $offset);
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		}
		public function review_user_id_onl($user_id){
			$this->db->where('user_id',$user_id);
			$this->db->where('status',true);
			$query = $this->db->get('review');
			$data = $query->result_array();
			return $data;
		}

		/*
		**************
		* insert
		**************
		*/

		public function insert($array){
			$this->db->insert('review',$array);
		}

		/*
		**************
		* update
		**************
		*/

		public function update($id,$array){
			$this->db->where('id',$id);
			$this->db->update('review',$array);
		}

		/*
		**************
		* delete
		**************
		*/

		public function delete($review_id){
			$this->db->where('id',$review_id);
			$this->db->delete('review');
		}
	}
 ?>