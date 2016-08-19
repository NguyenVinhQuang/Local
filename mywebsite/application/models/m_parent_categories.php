<?php 
/**
* parent categories model
*/
class M_parent_categories extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/*
	**************
	* select
	**************
	*/

	public function select_all(){
		$query = $this->db->get("parent_categories");
		$data = $query->result_array();
		return $data;
	}
	public function select_order_name(){
		$this->db->order_by('Name_Parent_Categories','asc');
		$query = $this->db->get("parent_categories");
		$data = $query->result_array();
		return $data;
	}
	public function select_list_id($id){
		//$id is a array
		foreach ($id as $id) {
			$query = $this->db->or_where('Id_Parent_Categories',$id);
		}
		$query = $this->db->get("parent_categories");
		$data = $query->result_array();
		return $data;
	}

	public function select_and_pagination($number, $offset){
		$query = $this->db->get("parent_categories",$number, $offset);
		$data = $query->result_array();
		return $data;
	}

	public function count_Name($Name){
		$str = '
			SELECT * 
			FROM  parent_categories
			WHERE UPPER(  Name_Parent_Categories ) = UPPER(  "'.$Name.'" ) 
			';
		$query = $this->db->query ($str);
		$num = $query->num_rows();
		return $num;
	}

	public function getId_Name($Name){
		$str = '
			SELECT  Id_Parent_Categories 
			FROM  parent_categories 
			WHERE  UPPER(  Name_Parent_Categories ) =  UPPER(  "'.$Name.'" )
		';

		$query = $this->db->query($str);
		$data = $query->result_array();
		return $data;
	}
	public function selectExceptId($id){
		$this->db->where('Id_Parent_Categories != ',$id);
		$query = $this->db->get('parent_categories');
		$data = $query->result_array();
		return $data;
	}
	public function selectOneId($id){
		$this->db->where('Id_Parent_Categories',$id);
		$query = $this->db->get('parent_categories');
		$data = $query->result_array();
		return $data;
	}

	/*
	**************
	* update
	**************
	*/	

	public function update($id,$data){
		$this->db->where('Id_Parent_Categories', $id);
		$this->db->update('parent_categories', $data); 
	}
	/*
	**************
	* insert
	**************
	*/	

	public function insert_one($temp){
		$this->db->insert('parent_categories',$temp);
	}

	/*
	**************
	* delete
	**************
	*/

	public function delete($temp){
		$this->db->delete('parent_categories', $temp); 
	}

	/*
	**************
	* count all
	**************
	*/

	public function count_all(){
		return $this->db->count_all('Parent_Categories'); 
	}
}