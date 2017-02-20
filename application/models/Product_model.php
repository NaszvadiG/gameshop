<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	/*
	*	fetch all products from database
	*/
	public function get_produts() {
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result();
	}

	/*
	*	fetch a product's details
	*/
	public function get_product_details($id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	/*
	*	get categories
	*/
	public function get_categories() {
		$this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
		return $query->result();
	}

	/*
	*	get popular products
	*/
	public function get_popular() {
		$this->db->select('p.*, COUNT(o.product_id) AS total');
		$this->db->from('orders AS o');
		$this->db->join('products AS p', 'o.product_id = p.id', 'INNER');
		$this->db->group_by('o.product_id');
		$this->db->order_by('total', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}