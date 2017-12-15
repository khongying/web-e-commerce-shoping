<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('auth_m');
		$this->load->model('po_m');
		

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
		$this->load->view('backend/index');
		$this->load->view('main/footer');
	}

	public function member(){

		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['member'] = $this->auth_m->get_member();

		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('backend/member');
		$this->load->view('main/footer');
		
	}

	public function payment(){
		$data = $this->input->post();

		$date = date("Ymdhis");
		$temp_user = "imges/payment/";
		$file_name = "";
		if($_FILES["img"]["size"]>0){
			if(move_uploaded_file($_FILES["img"]["tmp_name"],$temp_user.$date."_".$_FILES["img"]["name"])){
				$file_name = $date."_".$_FILES["img"]["name"];
			}else{

			}
		}

		$data_insert = array(
			'ref_po_no' => $data['po_no'],
			'name_post' => $data['name'],
			'address_post' => $data['address'],
			'phone_post' => $data['phone'],
			'img_post' => $file_name

		);

		$query = $this->db->insert('payment', $data_insert);
		$return = array();
		if ($query) {

			$data_po_update = array(
				'status' => 4
			);
			$this->db->where('po_no',$data['po_no']);
	        $query_update_po = $this->db->update('po',$data_po_update);
	        if ($query_update_po) {
		        $return['status'] 	= true;
				$return['message'] 	= 'แจ้งชำระสินค้าเรียบร้อยแล้ว'; 
	        }else{
	        	$return['status'] 	= false;
				$return['message'] 	= 'ไม่สำเร็จ';
	        }
			
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'ไม่สำเร็จ';
		}

		echo json_encode($return);
	}

	public function payment_list(){
		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['po'] = $this->po_m->get_po_list();

		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('backend/payment_list');
		$this->load->view('main/footer');
	}




	public function show_payment(){
		$po_no = $this->uri->segment(3);
		$data['payment'] = $this->po_m->get_payment($po_no);
		$this->load->view('backend/payment_show',$data);
	}

	public function update_po(){
		$data['po_no'] = $this->uri->segment(3);
		$data['po_status'] = $this->po_m->get_po_status();
		$this->load->view('backend/update_po',$data);
	}

	public function updata_status_po(){
		$data = $this->input->post();
		$return = array();
		$data_po_update = array(
				'status' => $data['status']
		);
		$this->db->where('po_no',$data['po_no']);
        $query_update_po = $this->db->update('po',$data_po_update);
        if ($query_update_po) {
	        $return['status'] 	= true;
			$return['message'] 	= 'อัพเดทเรียบร้อยแล้ว'; 
        }else{
        	$return['status'] 	= false;
			$return['message'] 	= 'ไม่สำเร็จ';
        }
	    echo json_encode($return);
	}

	public function data_po(){
		$po_no = $this->uri->segment(3);
		$data['po_no'] = $po_no;
		$data['po_data'] = $this->po_m->get_po_data($po_no);
		$this->load->view('backend/data_po',$data);
	}


	public function del_product(){
		$data = $this->input->post();
		// var_dump($data);
		$data_update = array(
			'status_product' => 0
		);

		$this->db->where("id", $data['product_id']);
        $query = $this->db->update("product",$data_update);
        $return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'ลบสินค้าเรียบร้อยแล้ว'; 
			$return['id'] 	= $data['product_id']; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'ลบสินค้าไม่สำเร็จ';
		}

		echo json_encode($return);
	}

	public function del_member(){
		$data = $this->input->post();
		// var_dump($data);
		$data_update = array(
			'status_user' => 0
		);

		$this->db->where("id", $data['member_id']);
        $query = $this->db->update("member",$data_update);
        $return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'ผู้ใช้งานเรียบร้อยแล้ว'; 
			$return['id'] 	= $data['member_id']; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'ลบไม่สำเร็จ';
		}

		echo json_encode($return);
	}
}


