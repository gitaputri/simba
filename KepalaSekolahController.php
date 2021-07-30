<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaSekolahController extends CI_Controller {

    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('userId') == "") {
			redirect('Welcome');
		}
		$this->load->helper('text');
		date_default_timezone_set("Asia/Bangkok");
    }
    
    public function index() {
		//$data = array('listBarang' => $this->KaryawanModel->listBarang());
		$data['jumlahbarang']=$this->db->from("barang")->get()->num_rows();
		$data['jumlahpenggunaan']=$this->db->from("penggunaan")->get()->num_rows();
		$data['jumlahpemanfaatan']=$this->db->from("pemanfaatan")->get()->num_rows();
		$data['jumlahpemeliharaan']=$this->db->from("pemeliharaan")->get()->num_rows();
		$data['jumlahpindahtangan']=$this->db->from("pindahtangan")->get()->num_rows();
		$data['jumlahpemusnahan']=$this->db->from("pemusnahan")->get()->num_rows();
		$data['jumlahpenghapusan']=$this->db->from("penghapusan")->get()->num_rows();


		$this->load->view('Dashboard',$data);

	}
	public function manajemenBarang() {
		$action = $this->input->get('a');
		$data = array('listBarang' => $this->KaryawanModel->listBarang(),
						'action' => $action);
		$this->load->view('TabelBarang', $data);
	}
	
	public function manajemenPenggunaan() {
		$data = array('listPenggunaan' => $this->KaryawanModel->listPenggunaan());
		$this->load->view('TransaksiPenggunaan', $data);
	}
	
	public function manajemenPemanfaatan() {
		$data = array('listPemanfaatan' => $this->KaryawanModel->listPemanfaatan());
		$this->load->view('TransaksiPemanfaatan', $data);
    }
    public function manajemenPemeliharaan() {
		$data = array('listPemeliharaan' => $this->KaryawanModel->listPemeliharaan());
		$this->load->view('TransaksiPemeliharaan', $data);
    }
    public function manajemenPemindahtanganan() {
		$data = array('listPemindahtanganan' => $this->KaryawanModel->listPemindahtanganan());
		$this->load->view('TransaksiPemindahtanganan', $data);
    }
    public function manajemenPemusnahan() {
		$data = array('listPemusnahan' => $this->KaryawanModel->listPemusnahan());
		$this->load->view('TransaksiPemusnahan', $data);
    }
    public function manajemenPenghapusan() {
		$data = array('listPenghapusan' => $this->KaryawanModel->listPenghapusan());
		$this->load->view('TransaksiPenghapusan', $data);
    }
 

}