<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tire_model extends CI_Model
{
	// private $table	= 'gallery';				

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
	}

	function getTireSize($product_id){
		// $this->db->group_by('tire_size');
		$dt = $this->db->get_where('product_rim_specification', array('product_id'=>$product_id));
		return $dt;
	}

	function getTireFeatures($product_id){
		// $this->db->group_by('tire_size');
		$dt = $this->db->get_where('product_features', array('id_tires'=>$product_id));
		return $dt;
	}

	function getTire($id){
		// $this->db->group_by('tire_size');
		$this->db->select('product.*, product_category.kode as category');
		$this->db->join('product_category', 'product_category.id = product.cat_id');
		$dt = $this->db->get_where('product', array('product.id'=>$id));
		return $dt->row();
	}

	function getTireList($per_page, $page_offset){
		$this->db->select('product.*, product_category.kode as category');
		$this->db->join('product_category', 'product_category.id = product.cat_id');
		$this->db->limit($per_page, $page_offset);
		$dt = $this->db->get('product');
		return $dt;
	}

	function getTireByCategory($cat_id){
		$this->db->select('product.*, product_category.kode as category');
		$this->db->join('product_category', 'product_category.id = product.cat_id');
		$dt = $this->db->get_where('product', array('product.cat_id'=>$cat_id));
		return $dt;
	}

}