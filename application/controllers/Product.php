<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		

	}	

	public function index(){

		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['all_product'] = $this->product_m->get_product_all();

		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('product/add');
		$this->load->view('main/footer');

	}

	public function add_product(){
		$data = $this->input->post();
		

		$date = date("Ymdhis");
		$temp_user = "imges/product/";
		$file_name = "";
		if($_FILES["img"]["size"]>0){
			if(move_uploaded_file($_FILES["img"]["tmp_name"],$temp_user.$date."_".$_FILES["img"]["name"])){
				$file_name = $date."_".$_FILES["img"]["name"];
			}else{

			}
		}


		$data_insert = array(
			'code' => $data['type_product'].'-'.$data['code'],
			'name' => $data['name'],
			'type_product' => $data['type_product'],
			'detail' => $data['detail'],
			'price'   => $data['price'],
			'total'   => $data['total'],
			'file'   => $file_name

		);

		$query = $this->db->insert('product', $data_insert);
		$return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'เพิ่มสินค้าเรียบร้อยแล้ว'; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'เพิ่มสินค้าไม่สำเร็จ';
		}

		echo json_encode($return);
	

	}

	public function edit_product(){
		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['all_product'] = $this->product_m->get_product_all();

		$product_id = $this->uri->segment(3);
		$data['product'] = $this->product_m->get_product($product_id);
		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('product/edit');
		$this->load->view('main/footer');
	}

	public function update_product(){
		
		$data = $this->input->post();

		$date = date("Ymdhis");
		$temp_user = "imges/product/";
		$file_name = "";
		if($_FILES["img"]["size"]>0){
			if(move_uploaded_file($_FILES["img"]["tmp_name"],$temp_user.$date."_".$_FILES["img"]["name"])){
				$file_name = $date."_".$_FILES["img"]["name"];
			}else{

			}
		}

		if($_FILES["img"]["size"]>0){
			$data_update = array(
				'name' => $data['name'],
				'detail' => $data['detail'],
				'price'   => $data['price'],
				'total'   => $data['total'],
				'file'   => $file_name
			);
		}else{
			$data_update = array(
				'name' => $data['name'],
				'detail' => $data['detail'],
				'price'   => $data['price'],
				'total'   => $data['total']
			);
		}
		
		$this->db->where("id", $data['product_id']);
        $query = $this->db->update("product",$data_update);
        $return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'แก้ไขสินค้าเรียบร้อยแล้ว'; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'แก้ไขสินค้าไม่สำเร็จ';
		}

		echo json_encode($return);

		
	}

	public function list_product(){
		$type_product = $this->uri->segment(3);
		$data['product'] = $this->product_m->get_product_type($type_product);
		$this->load->view('product/list_product',$data);

	}
}
