<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class auth_m extends CI_Model {

	function __construct() {
		parent::__construct();

	}
	public function check_login($email, $pass)
	{
		//dev by miniball
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$this->db->where('status_user', 1);
		$this->db->limit('1');
		$query = $this->db->get();
		$res = array();
		if ($query) {
			if ($query->num_rows() == 1) {
				$res['status']  = true;
				$res['message'] = 'เข้าสู่ระบบสำเร็จ';
				$res['session'] = $query->result_array();

			}else{
				$res['status']  = false;
				$res['message'] = 'กรุณาตรวจสอบ Email และ Password';
			}
		}else{
			$res['status']  = false;
			$res['message'] = 'ไม่สามารถเข้าสู่ระบบได้';
		}

		return $res;
	}


	public function get_member(){
		$this->db->select('*');
		$this->db->where('status !=', 1);
		$this->db->where('status_user', 1);
		$query = $this->db->get('member');
		$member = $query->result();
		return $member;
	}

}
