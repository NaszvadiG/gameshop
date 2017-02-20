<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public $paypal_data = '';
	public $tax;
	public $shipping;
	public $total = 0;
	public $grand_total;

	public function index()	{
		//	load products view
		$data['main_content'] = 'cart';
 		$this->load->view('layouts/main', $data);
	}

	/*
	*	add to cart
	*/
	public function add() {
		//	item data
		$data = array(
			'id' => $this->input->post('item_number'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('title')
		);

		//	insert into cart
		$this->cart->insert($data);

		redirect('products');
	}

	/*
	*	update to cart
	*/
	public function update($in_cart = null) {
		//	item data
		$data = $_POST;

		//	show cart page
		redirect('cart', 'refresh');
	}

}