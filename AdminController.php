<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('userId') == "") {
			redirect('Welcome');
		}
		$this->load->helper('text');
		date_default_timezone_set("Asia/Bangkok");
    }
    
    public function index() {
		$this->load->view('TabelBarang');
	}
	
	public function rekamData() {
		$this->load->view('InputBarang');
	}
	
	public function penggunaan() {
		$this->load->view('PenggunaanBarang');
	}
	
	public function pemanfaatan() {
		$this->load->view('PemanfaatanBarang');
	}
	
	public function pemeliharaan() {
		$this->load->view('PemeliharaanBarang');
	}
	
	public function pemindahtanganan() {
		$this->load->view('PemindahtangananBarang');
	}
	
	public function pemusnahan() {
		$this->load->view('PemusnahanBarang');
	}
	
	public function manajemenBarang() {
		$this->load->view('TabelBarang');
	}
	
	public function manajemenPenggunaan() {
		$this->load->view('TabelPenggunaan');
	}
	
	public function manajemenPemanfaatan() {
		$this->load->view('TabelPemanfaatan');
    }

}