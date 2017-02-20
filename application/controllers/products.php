<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()	{

		//	get all products
		$data['products'] = $this->Product_model->get_produts();

		//	load products view
		$data['main_content'] = 'products';
 		$this->load->view('layouts/main', $data);
	}

	/*
	*	get each produucts detail
	*/
	public function details($id) {
		//	get details
		$data['product'] = $this->Product_model->get_product_details($id);

		//	load details view
		$data['main_content'] = 'details';
 		$this->load->view('layouts/main', $data);
	}

}