<?php 

/**
* 
*/
class Category_model extends CI_Model{
	
	function __construct(){
		
	}

	public function getCategories(){
		$this->db->select('*');
		$this->db->from('category');

		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			$data[$row['cat_id']] = $row['cat_name'];
		}

		return $data;
	}

	public function getSubcategoryByCategory($cat_id){
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->where('cat_id', $cat_id);

		$query = $this->db->get();

		return $query->result();
	}
}