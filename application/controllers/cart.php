<?php

class Cart extends CI_Controller{
	public $paypal_data = '';
	public $tax;
	
	public $shipping;
	public $total = 0;
	public $grand_total;
	
	
	/*
	 *  Cart Index
	 */
	
	public function index(){
		$data['main_content']='cart';
		$this->load->view('layouts/main',$data);
	}
	
	/*
	 * Add to cart
	 */
	
	public function add(){
		//Item data
		$data = array(
				
				//the following name is comming from the  form of the the product view
			'id'=> $this->input->post('item_number'),
			'qty'=> $this->input->post('qty'),
			'price'=> $this->input->post('price'),
			'name'=> $this->input->post('title')
				
				
			
				
				
		);
		//print_r($data);
		
		//Insert into cart
		$this->cart->insert($data);
		redirect('products');
	}
	
	
	/*
	 * Update cart
	 */
	
	public function update($in_cart = null){
		$data = $_POST;
		$this->cart->update($data);
		
		//Show Cart Page
		redirect('cart','refresh');
		
	}
	
} 