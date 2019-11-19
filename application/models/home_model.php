<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	// private $table	= 'gallery';				

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
	}

	function getBrand(){
		$this->db->group_by('brand');
		$dt = $this->db->get('tirematcher');

		return $dt;
	}

	function getModel(){
		$this->db->group_by('model');
		$dt = $this->db->get('tirematcher');

		return $dt;
	}

	function getTireSize(){
		// $this->db->group_by('tire_size');
		$dt = $this->db->get('tirematcher');

		return $dt;
	}

	function getTireList($cat_id){
		if($this->session->userdata('lang')){
			$this->db->select('product.*, product_category.name as name, product_category.headline_id as headline,  product_category.bodytext_id as bodytext');
		}else{
			$this->db->select('product.*, product_category.name as name, product_category.headline_en as headline,  product_category.bodytext_en as bodytext');
		}
		
		$this->db->join('product_category', 'product_category.id = product.cat_id');
		$this->db->where('product.cat_id', $cat_id);
		$dt = $this->db->get('product');

		return $dt;
	}

	function getTire($q){
		$this->db->select('product.*, product_category.kode as category');
		$this->db->join('product_category', 'product_category.id = product.cat_id');
		if($this->session->userdata('lang')){
			$this->db->like('product.desc_en', $q);
		}else{
			$this->db->like('product.desc_id', $q);
		}
		$this->db->or_like('product.name', $q);

		return $this->db->get('product');
	}

	function getStories($q){
		if(!$this->session->userdata('lang')){
			$this->db->like('description_en', $q);
			$this->db->or_like('title_en', $q);
		}else{
			$this->db->like('description_id', $q);
			$this->db->or_like('title_id', $q);
		}

		// $this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get('stories');
	}
}