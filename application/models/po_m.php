<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class po_m extends CI_Model {

	function __construct() {
		parent::__construct();

	}
	public function get_po($member_id){
		
		$this->db->select('po_no');
		$this->db->where('member',$member_id);
		$query = $this->db->get('po');
		$po = $query->result();
		return $po;
	}

	public function get_po_all($po_no){
		
		$this->db->select('*');
		$this->db->where('po_no',$po_no);
		$this->db->join('po_status','po_status.id = po.status');
		$query = $this->db->get('po');
		$po = $query->result();
		return $po;
	}

	public function get_po_data($po_no){

		$this->db->select('*');
		$this->db->where('ref_po_no',$po_no);
		$this->db->join('product','product.code = po_item.product_code');
		$query = $this->db->get('po_item');
		$po = $query->result();
		return $po;
		
	}
	public function get_po_list(){

		$this->db->select('*');
		$this->db->join('po_status','po_status.id = po.status');
		$query = $this->db->get('po');
		$po = $query->result();
		return $po;
		
	}

	public function get_payment($po_no){
		$this->db->select('*');
		$this->db->where('ref_po_no',$po_no);
		$query = $this->db->get('payment');
		$payment = $query->result();
		return $payment;
	}

	public function get_po_status(){
		$this->db->select('*');
		$query = $this->db->get('po_status');
		$po_status = $query->result();
		return $po_status;
	}

}
