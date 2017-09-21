<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Category_model', 'category');
	}

	public function index(){
		$data['categories'] = $this->category->getCategories();

		$this->load->view('dropdown', $data);

	}

	public function buildSubCategory(){
		// set selected categoru id from post
		$cat_id = $this->input->post('category_id', true);

		$data['subCatDropdown'] = $this->category->getSubcategoryByCategory($cat_id);

		$output = null;
		foreach ($data['subCatDropdown'] as $row) {
			$output .= "<option value='".$row->sub_id."'>".$row->sub_name."</option>";
		}

		echo json_encode($output);
	}
}
