<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
		$this->load->view('main/header');
		$this->load->view('main/navbar_v');
		$this->load->view('register/index');
		$this->load->view('main/footer');
	}

	public function add_user(){
		$data = $this->input->post();
		// var_dump($data);
		$data = array(
			'email' => $data['email'],
			'password' => $data['password'],
			'full_name'   => $data['full-name'],
			'address'   => $data['address'],
			'phone'   => $data['phone']

		);

		$query = $this->db->insert('member', $data);
		$return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'สมัครสมาชิกเรียบร้อยแล้ว'; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'สมัครสมาชิกไม่สำเร็จ';
		}

		echo json_encode($return);
	}

}
