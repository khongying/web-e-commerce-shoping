<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('product_m');
		$this->load->model('po_m');
		

	}	


	public function index($value=''){
		
		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$email = $session_data[0]['email'];
		if ($email == "") {
			$data['all_product'] = $this->product_m->get_product_all();

			$this->load->view('main/header');
			$this->load->view('main/navbar_v');
			$this->load->view('main/main', $data);
			$this->load->view('main/footer');

		}else{

			$data['email'] = $session_data[0]['email'];
			$data['full_name'] = $session_data[0]['full_name'];
			$data['status'] = $session_data[0]['status'];
			$data['all_product'] = $this->product_m->get_product_all();

			$this->load->view('main/header');
			$this->load->view('main/navbar', $data);
			$this->load->view('main/main');
			$this->load->view('main/footer');

		}
	}

	public function product_show(){

		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$email = $session_data[0]['email'];
		if ($email == "") {
			$data['all_product'] = $this->product_m->get_product_all();

			$this->load->view('main/header');
			$this->load->view('main/navbar_v');
			$this->load->view('main/index', $data);
			$this->load->view('main/footer');

		}else{

			$data['email'] = $session_data[0]['email'];
			$data['full_name'] = $session_data[0]['full_name'];
			$data['status'] = $session_data[0]['status'];
			$data['all_product'] = $this->product_m->get_product_all();

			$this->load->view('main/header');
			$this->load->view('main/navbar', $data);
			$this->load->view('main/index');
			$this->load->view('main/footer');

		}

		
	}

	public function basket(){
		$session_basket = $this->session->userdata('sessed_basket');
		$code = $this->input->post('code');
		$price = $this->input->post('price');
		$img = $this->input->post('img');
		$product_name = $this->input->post('product_name');
		if ($session_basket == NULL) {
			$session_basket[$code] =["total"=>$price,"count"=>1,"price"=>$price,"img"=>$img,"product_name"=>$product_name,"code"=>$code];
			$this->session->set_userdata('sessed_basket', $session_basket);
			// var_dump($session_basket);
		}else{
			if(isset($session_basket[$code])){
				$session_basket[$code]["count"] = $session_basket[$code]["count"]+=1;
				$session_basket[$code]["total"] = $session_basket[$code]["total"]+=$price;
				$session_basket[$code]["price"] = $price;
				$session_basket[$code]["img"] = $img;
				$session_basket[$code]["product_name"] = $product_name;
				$session_basket[$code]["code"] = $code;

				$this->session->set_userdata('sessed_basket', $session_basket);
				// var_dump($session_basket);
			}else{
				$session_basket[$code]["count"] = 1;
				$session_basket[$code]["total"] = $price;
				$session_basket[$code]["price"] = $price;
				$session_basket[$code]["img"] = $img;
				$session_basket[$code]["product_name"] = $product_name;
				$session_basket[$code]["code"] = $code;
				$this->session->set_userdata('sessed_basket', $session_basket);
				// var_dump($session_basket);
			}
		}
		echo count($session_basket);
	}

	public function cart(){
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$this->load->view('main/cart_modal',$data);
	}

	public function del_cart(){
		$code = $this->input->post('code');
		$session_basket = $this->session->userdata('sessed_basket');
		unset($session_basket[$code]);
		$this->session->set_userdata('sessed_basket', $session_basket);
		echo count($session_basket);

	}

	public function update_cart(){
		$session_basket = $this->session->userdata('sessed_basket');
		$code = $this->input->post('code');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$session_basket[$code]["count"] = $qty;
		$session_basket[$code]["total"] = ($price*$qty);
		$this->session->set_userdata('sessed_basket', $session_basket);
	}

	public function confirm_order(){

		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['all_product'] = $this->product_m->get_product_all();

		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('main/confirm_order');
		$this->load->view('main/footer');
		
	}

	public function add_order(){
		$datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get('po');
		$bk = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($bk==0) {
			$po_no = "PO".date($datestring).date($mm).date($dd)."1";
			$po_item ="1";
		}else{
			$this->db->select('*');
			$this->db->order_by('id','desc');
			$this->db->limit('1');
			$q = $this->db->get('po');
			$bkr = $q->result();
		foreach ($bkr as $bkx)
		{
			$bkn1 = $bkx->id+1;
		}
			$po_no = "PO".date($datestring).date($mm).date($dd).$bkn1;
			$po_item = $bkn1;
		}

		$data = $this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$member_id = $session_data[0]['id'];
		$data_po = array(
			'po_no' => $po_no,
			'status' => '1',
			'member' => $member_id,
			'create_date' => date('Y-m-d H:i:s')
		);
		$query = $this->db->insert('po', $data_po);

		if ($query) {
			foreach ($data['code'] as $key => $value) {

				$data_po_item = array(
					'ref_po_no' => $po_no,
					'product_code' => $data['code'][$key],
					'product_code' => $data['code'][$key],
					'qty' => $data['qty'][$key],
					'unit_price' => $data['unit_price'][$key]
				);

				$query_po_item = $this->db->insert('po_item', $data_po_item);
			}

		}

		$return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'สั่งซื้อสินค้าเรียบร้อยแล้ว'; 
			$return['po_no'] 	= $po_no; 
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'สั่งซื้อไม่สำเร็จ';
		}
		$this->session->set_userdata('sessed_basket',[]);
		echo json_encode($return);

		
	}

	public function close_basket(){
		$this->session->set_userdata('sessed_basket',[]);
		redirect('/');
	}


	public function po_list(){

		$session_data = $this->session->userdata('sessed_in');
		$data['session_basket'] = $this->session->userdata('sessed_basket');
		$data['session_data'] = $this->session->userdata('sessed_in');
		$member_id = $session_data[0]['id'];
		$data['email'] = $session_data[0]['email'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['status'] = $session_data[0]['status'];
		$data['list_po'] = $this->po_m->get_po($member_id);

		$this->load->view('main/header');
		$this->load->view('main/navbar', $data);
		$this->load->view('main/po_list');
		$this->load->view('main/footer');

	}

	public function po_data(){
		$session_data = $this->session->userdata('sessed_in');
		$data['address'] = $session_data[0]['address'];
		$data['full_name'] = $session_data[0]['full_name'];
		$data['phone'] = $session_data[0]['phone'];

		$po_no = $this->uri->segment(3);
		$data['po_data'] = $this->po_m->get_po_data($po_no);
		$status = $this->po_m->get_po_all($po_no);
		// var_dump($status);
		$data['status_id'] = $status[0]->status;
		$data['status_name'] = $status[0]->name;
		$data['po_no'] = $po_no;
		$this->load->view('main/po_data',$data);
	}

	public function how_payment(){
		$this->load->view('main/how_payment');
	}



}

