<?php

class Products extends CI_Controller{
	
	public function index(){
		//Get all products
		$data['products']=$this->Product_model->get_products();
		
		
		//Load View
		
		$data['main_content']='products';
			
		$this->load->view('layouts/main',$data);
		
		
		
	}
	
	public function details(){

		//Get Prodcut details
		
		$data['products']=$this->Product_model->get_product_details($id);
		
		$data['main_content']='details';
			
		$this->load->view('layouts/main',$data);
	}
	
}