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
	
	
	/*
	 * Process form paypal
	 * 
	 */
	
	public function process(){
		if($_POST){
			
			foreach ($this->input->post('item_name') as $key=>$value){
				$item_id = $this->input->post('item_code')[$key];
				$product = $this->Product_model->get_product_details($item_id);
				// assign data to paypal
				 
				$this->paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($product->title);
				$this->paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($item_id);
				$this->paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($product->price);
				$this->paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='.urlencode($this->input->post('item_qty')[$key]);
			
				// price x quantity
				$subtotal = ($product->price * $this->input->post('item_qty')[$key]);
				$this->total = $this->total + $subtotal;
				
				//assign data to paypal
				$paypal_product['items'][] = array(
						'itm_name'   => $product->title,
						'itm_price'  => $product->price,
						'itm_code'   => $item_id,
						'itm_qty'    => $this->input->post('item_qty')[$key]
				);
				
				// create order array
				$order_data = array(
						'product_id'      => $item_id,
						'user_id'         => $this->session->userdata('user_id'),
						'transaction_id'  => 0,
						'qty'             => $this->input->post('item_qty')[$key],
						'price'           => $subtotal,
						'address'         => $this->input->post('address'),
						'address2'        => $this->input->post('address2'),
						'city'            => $this->input->post('city'),
						'state'           => $this->input->post('state'),
						'zipcode'         => $this->input->post('zipcode')
				);
				
				// add order data
				$this->product_model->add_order($order_data);
			}
			
			// get the grand total
			$this->grand_total = $this->total + $this->tax + $this->shipping;
			// create array of costs
			$paypal_product['assets'] = array(
					'tax_total'      => $this->tax,
					'shipping_cost'  => $this->shipping,
					'grand_total'    => $this->total
			);
				
			// session array for later
			$_SESSION["paypal_products"] = $paypal_product;
		}
	}
	
	
	
} 