<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*	get categries
*/
function get_categories_h() {
	$CI = get_instance();
	$categories = $CI->Product_model->get_categories();
	return $categories;
}

/*
*	get popular products for sidebar
*/
function get_popular_h() {
	$CI = get_instance();
	$popular_products = $CI->Product_model->get_popular();
	return $popular_products;
}