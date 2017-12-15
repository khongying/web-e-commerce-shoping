<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->model('auth_m');

	}	

	public function index(){

		$this->load->view('main/header');
		$this->load->view('main/navbar_v');
		$this->load->view('login/index');
		$this->load->view('main/footer');

	}

	public function chk_loing(){

		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$res  = $this->auth_m->check_login($user, $pass);
		// var_dump($res["session"][0]['email']);
		$respone = array();
		if ($res['status'] == true) {
			$this->session->set_userdata('sessed_in',$res['session']);
			$this->session->set_userdata('sessed_basket',[]);
			$reponse['status'] = $res['status'];
			$reponse['message'] = $res['message'];
			$reponse['email'] = $res["session"][0]['email'];
			$reponse['full_name'] = $res["session"][0]['full_name'];
		}else{
			$reponse['status']  = $res['status'];
			$reponse['message'] = $res['message'];
		}
		
		echo json_encode($res);
	}


	public function logout()
	{
		$this->session->unset_userdata('sessed_in');
		$this->session->unset_userdata('sessed_basket');
		redirect('/');
	}
}
