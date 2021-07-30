<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanController extends CI_Controller {

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
	
	public function rekamData() {
		$action = 'Add';
		$data = array('id' => $this->KaryawanModel->getId(),
						'action' => $action);
		$this->load->view('InputBarang', $data);
	}

	public function simpanRekamData() {
		$config['upload_path']          = './Assets/images/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 500;
          $config['max_width']            = 2048;
          $config['max_height']           = 768;
          $this->load->library('upload', $config);
          $this->upload->do_upload('faktur');
          $IMAGE1       = $this->upload->data("file_name");

          $this->load->library('upload', $config);
                    $this->upload->do_upload('gambar');
          $IMAGE2       = $this->upload->data("file_name");

		$data = array('KODE_LOKASI' 		=> $this->input->post('kodelokasi'),
						'JENIS_INVETARISASI'=> $this->input->post('inven'),
						'KODE_BARANG'		=> $this->input->post('kodebarang'),
						'NUP'				=> $this->input->post('nup'),
						'TGL_PEROLEHAN'		=> $this->input->post('tanggal'),
						'FAKTUR'			=> $this->input->post('faktur'),
						'GAMBAR'			=> $this->input->post('gambar'),
						'NAMA_BARANG'		=> $this->input->post('nama'),
						'MERK'				=> $this->input->post('merk'),
						'JENIS_BARANG'		=> $this->input->post('jenis'),
						'HARGA_PEROLEHAN'	=> $this->input->post('harga'),
						'SATUAN'			=> $this->input->post('satuan'),
						'KUANTITAS'			=> $this->input->post('kuantitas'),
						'AKM_PENYUSUTAN' 	=> $this->input->post('penyusutan'),
						'NILAI_BUKU' 		=> $this->input->post('nilai'),
						'KONDISI_BARANG' 	=> $this->input->post('kondisi'),
						'STATUS_BARANG' 	=> $this->input->post('status'),
						'FAKTUR'			=> $IMAGE1,
						'GAMBAR'			=> $IMAGE2);
		$this->KaryawanModel->simpanRekamData($data);
		$this->manajemenBarang();
	}

	public function simpanPenggunaan() {
		$data = array('ID_PENGGUNAAN'  	  => $this->input->post('idpenggunaan'),
					  'ID_BARANG'	  	  => $this->input->post('idbarang'),
					  'KODE_LOKASI'	  	  => $this->input->post('kodelokasi'),
					  'KODE_BARANG'	 	  => $this->input->post('kodebarang'),
					  'NUP'			  	  => $this->input->post('nup'),
					  'NAMA_BARANG'	  	  => $this->input->post('nama'),
					  'MERK'		 	  => $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN' => $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'   => $this->input->post('harga'),
					  'STATUS_KEPEMILIKAN'=> $this->input->post('stkepemilikan'),
					  'STATUS_PENGGUNAAN' => $this->input->post('stpenggunaan'));
		$this->KaryawanModel->simpanPenggunaan($data);
		$this->manajemenPenggunaan();
	}
	public function simpanPemanfaatan(){
		$data = array('ID_PEMANFAATAN' 	  => $this->input->post('idpemanfaatan'),
					  'ID_BARANG'	      => $this->input->post('idbarang'),
					  'KODE_LOKASI'	      => $this->input->post('kodelokasi'),
					  'KODE_BARANG'	      => $this->input->post('kodebarang'),
					  'NUP'			      => $this->input->post('nup'),
					  'NAMA_BARANG'	      => $this->input->post('nama'),
					  'MERK'		      => $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN' => $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'   => $this->input->post('harga'),
					  'STATUS_PEMANFAATAN'=> $this->input->post('stpemanfaatan'),
					  'NAMA_SEWA'		  => $this->input->post('namasewa'),
					  'LAMA_SEWA'		  => $this->input->post('lamasewa'),
					  'TANGGAL_SEWA'	  => $this->input->post('tglsewa'),
					  'TANGGAL_KEMBALI'   => $this->input->post('tglkembali'),
					  'HARGA_sEWA'  	  => $this->input->post('hargasewa'),
					  'KONDISI_BARANG'	  => $this->input->post('kondisi'),
					  'JAMINAN'			  => $this->input->post('jaminan'),
					  'STATUS_VERIFIKASI' => 'PROSES');
		$this->KaryawanModel->simpanPemanfaatan($data);
		$this->manajemenPemanfaatan();		

	}


	public function simpanPemeliharaan(){
		$config['upload_path']          = './Assets/images/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 100;
          $config['max_width']            = 2048;
          $config['max_height']           = 768;
          $this->load->library('upload', $config);
          $this->upload->do_upload('nota');
          $IMAGE       = $this->upload->data("file_name");
		$data = array('ID_PEMELIHARAAN'		=> $this->input->post('idpemeliharaan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
			 		  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'JENIS_BARANG'		=> $this->input->post('jenis'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tglperolehan'),
					  'STATUS_PEMELIHARAAN' => $this->input->post('stpemeliharaan'),
					  'TANGGAL_PERBAIKAN'	=> $this->input->post('tanggal'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'BIAYA'				=> $this->input->post('biaya'),
					  'NOTA'				=> $IMAGE,
					  'STATUS_VERIFIKASI' => 'PROSES');


		$this->KaryawanModel->simpanPemeliharaan($data);
		$this->manajemenPemeliharaan();
	}




	public function simpanPemindahtanganan(){
		$data = array('ID_PINDAHTANGAN'		=> $this->input->post('idpindahtangan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'		=> $this->input->post('harga'),
					  'STATUS_PINDAHTANGAN'	=> $this->input->post('stpindahtangan'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'NAMA_PENERIMA'		=> $this->input->post('namapenerima'),
					  'TANGGAL_PINDAHTANGAN'=> $this->input->post('tanggalpdh'));
		$this->KaryawanModel->simpanPemindahtanganan($data);
		$this->manajemenPemindahtanganan();

	}

	public function simpanPemusnahan(){
		$data = array('ID_PEMUSNAHAN'		=> $this->input->post('idpemusnahan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA'				=> $this->input->post('harga'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'JUMLAH'				=> $this->input->post('jumlah'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'STATUS'				=> $this->input->post('stpenghapusan'),
					  'PENGAJUAN'			=> $this->input->post('pengajuan'),
					  'STATUS_VERIFIKASI' => 'PROSES');
		$this->KaryawanModel->simpanPemusnahan($data);
		$this->manajemenPemusnahan();

	}

	public function simpanPenghapusan(){
		$data = array('ID_PENGHAPUSAN'		=> $this->input->post('idpenghapusan'),
					  'ID_PEMUSNAHAN'		=> $this->input->post('idpemusnahan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'		=> $this->input->post('harga'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'JUMLAH'				=> $this->input->post('jumlah'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'STATUS_BARANG'		=> $this->input->post('status'),
					  'PENGAJUAN'			=> $this->input->post('pengajuan'),
					  'STATUS_HAPUS'		=> $this->input->post('stpenghapusan'));
		$idPemusnahan = $this->input->post('idpemusnahan');
		$this->KaryawanModel->hapusPemusnahan($idPemusnahan);
		$this->KaryawanModel->simpanPenghapusan($data, $idPemusnahan);
		$this->manajemenPenghapusan();

	}


	public function editRekamData() {
		$action = $this->input->get('a');
		$idBarang = $this->input->get('id');
		$data = array('barang' => $this->KaryawanModel->editRekamData($idBarang),
						'action' => $action);
		$this->load->view('InputBarang', $data);
	}
	public function editPenggunaan() {
		$action = $this->input->get('a');
		$idPenggunaan = $this->input->get('id');
		$data = array('penggunaan' => $this->KaryawanModel->editPenggunaan($idPenggunaan),
						'action' => $action);
		$this->load->view('PenggunaanBarang', $data);
	}
	public function editPemanfaatan() {
		$action = $this->input->get('a');
		$idPemanfaatan = $this->input->get('id');
		$data = array('pemanfaatan' => $this->KaryawanModel->editPemanfaatan($idPemanfaatan),
						'action' => $action);
		$this->load->view('PemanfaatanBarang', $data);
	}
	public function editPemeliharaan() {
		$action = $this->input->get('a');
		$idPemeliharaan = $this->input->get('id');
		$data = array('pemeliharaan' => $this->KaryawanModel->editPemeliharaan($idPemeliharaan),
						'action' => $action);
		$this->load->view('PemeliharaanBarang', $data);
	}
	public function editPemindahtanganan() {
		$action = $this->input->get('a');
		$idPindahtangan = $this->input->get('id');
		$data = array('pindahtangan' => $this->KaryawanModel->editPemindahtanganan($idPindahtangan),
						'action' => $action);
		$this->load->view('PemindahtangananBarang', $data);
	}

	public function editPemusnahan() {
		$action = $this->input->get('a');
		$idPemusnahan = $this->input->get('id');
		$data = array('pemusnahan' => $this->KaryawanModel->editPemusnahan($idPemusnahan),
						'action' => $action);
		$this->load->view('PemusnahanBarang', $data);
	}

	public function editPenghapusan() {
		$action = $this->input->get('a');
		$idPenghapusan = $this->input->get('id');
		$data = array('penghapusan' => $this->KaryawanModel->editPenghapusan($idPenghapusan),
						'action' => $action);
		$this->load->view('PenghapusanBarang', $data);
	}


//VERIFIKASI



	public function setujuPemanfaatan() {

		$data = array('STATUS_VERIFIKASI' => 'DISETUJUI');
		$condition['id_pemanfaatan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemanfaatan($data, $condition);
		$this->manajemenPemanfaatan();

	}
	public function tolakPemanfaatan() {

		$data = array('STATUS_VERIFIKASI' => 'DITOLAK');
		$condition['id_pemanfaatan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemanfaatan($data, $condition);
		$this->manajemenPemanfaatan();

	}

	public function setujuPemeliharaan() {

		$data = array('STATUS_VERIFIKASI' => 'DISETUJUI');
		$condition['id_pmeliharaan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemeliharaan($data, $condition);
		$this->manajemenPemeliharaan();

	}
	public function tolakPemeliharaan() {

		$data = array('STATUS_VERIFIKASI' => 'DITOLAK');
		$condition['id_pemeliharaan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemeliharaan($data, $condition);
		$this->manajemenPemeliharaan();

	}

	public function setujuPemusnahan() {

		$data = array('STATUS_VERIFIKASI' => 'DISETUJUI');
		$condition['id_pemusnahan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemusnahan($data, $condition);
		$this->manajemenPemusnahan();

	}
	public function tolakPemusnahan() {

		$data = array('STATUS_VERIFIKASI' => 'DITOLAK');
		$condition['id_pemusnahan'] = $this->input->get('id');
		$this->KaryawanModel->simpanEditPemusnahan($data, $condition);
		$this->manajemenPemusnahan();

	}





	public function simpanEditRekamData() {
		$data = array('KODE_LOKASI' => $this->input->post('kodelokasi'),
						'JENIS_INVETARISASI' => $this->input->post('inven'),
						'KODE_BARANG' => $this->input->post('kodebarang'),
						'NUP' => $this->input->post('nup'),
						'TGL_PEROLEHAN' => $this->input->post('tanggal'),
						'FAKTUR' => $this->input->post('faktur'),
						'GAMBAR' => $this->input->post('gambar'),
						'NAMA_BARANG' => $this->input->post('nama'),
						'MERK' => $this->input->post('merk'),
						'JENIS_BARANG' => $this->input->post('jenis'),
						'HARGA_PEROLEHAN' => $this->input->post('harga'),
						'SATUAN' => $this->input->post('satuan'),
						'KUANTITAS' => $this->input->post('kuantitas'),
						'AKM_PENYUSUTAN' => $this->input->post('penyusutan'),
						'NILAI_BUKU' => $this->input->post('nilai'),
						'KONDISI_BARANG' => $this->input->post('kondisi'),
						'STATUS_BARANG' => $this->input->post('status'));
		$condition['id_barang'] = $this->input->post('idbarang');
		$this->KaryawanModel->simpanEditRekamData($data, $condition);
		$this->manajemenBarang();
	}

	public function simpanEditPenggunaan() {
		$data = array('ID_PENGGUNAAN' 	 => $this->input->post('idpenggunaan'),
					  'ID_BARANG'	   	 => $this->input->post('idbarang'),
					  'KODE_LOKASI'	  	 => $this->input->post('kodelokasi'),
					  'KODE_BARANG'	  	 => $this->input->post('kodebarang'),
					  'NUP'			 	 => $this->input->post('nup'),
					  'NAMA_BARANG'	 	 => $this->input->post('nama'),
					  'MERK'		 	 => $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'=> $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'	 => $this->input->post('harga'),
					  'STATUS_KEPEMILIKAN'=> $this->input->post('stkepemilikan'),
					  'STATUS_PENGGUNAAN'=> $this->input->post('stpenggunaan'));
		$condition['id_penggunaan'] = $this->input->post('idpenggunaan');
		$this->KaryawanModel->simpanEditPenggunaan($data, $condition);
		$this->manajemenPenggunaan();
	}
	public function simpanEditPemanfaatan() {
		$data = array('ID_PEMANFAATAN' 	  => $this->input->post('idpemanfaatan'),
					  'ID_BARANG'	      => $this->input->post('idbarang'),
					  'KODE_LOKASI'	      => $this->input->post('kodelokasi'),
					  'KODE_BARANG'	      => $this->input->post('kodebarang'),
					  'NUP'			      => $this->input->post('nup'),
					  'NAMA_BARANG'	      => $this->input->post('nama'),
					  'MERK'		      => $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN' => $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'   => $this->input->post('harga'),
					  'STATUS_PEMANFAATAN'=> $this->input->post('stpemanfaatan'),
					  'NAMA_SEWA'		  => $this->input->post('namasewa'),
					  'LAMA_SEWA'		  => $this->input->post('lamasewa'),
					  'TANGGAL_SEWA'	  => $this->input->post('tglsewa'),
					  'TANGGAL_KEMBALI'   => $this->input->post('tglkembali'),
					  'HARGA_sEWA'  	  => $this->input->post('hargasewa'),
					  'KONDISI_BARANG'	  => $this->input->post('kondisi'),
					  'JAMINAN'			  => $this->input->post('jaminan'));
		$condition['id_pemanfaatan'] = $this->input->post('idpemanfaatan');
		$this->KaryawanModel->simpanEditPemanfaatan($data, $condition);
		$this->manajemenPemanfaatan();
	}
	public function simpanEditPemeliharaan() {
		$data = array('ID_PEMELIHARAAN'		=> $this->input->post('idpemeliharaan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
			 		  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'JENIS_BARANG'		=> $this->input->post('jenis'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tglperolehan'),
					  'STATUS_PEMELIHARAAN' => $this->input->post('stpemeliharaan'),
					  'TANGGAL_PERBAIKAN'	=> $this->input->post('tanggal'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'BIAYA'				=> $this->input->post('biaya'));
		$condition['id_pemeliharaan'] = $this->input->post('idpemeliharaan');
		$this->KaryawanModel->simpanEditPemeliharaan($data, $condition);
		$this->manajemenPemeliharaan();
	}

	public function simpanEditPemindahtanganan() {
			$data = array('ID_PINDAHTANGAN'		=> $this->input->post('idpindahtangan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'		=> $this->input->post('harga'),
					  'STATUS_PINDAHTANGAN'	=> $this->input->post('stpindahtangan'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'NAMA_PENERIMA'		=> $this->input->post('namapenerima'),
					  'TANGGAL_PINDAHTANGAN'=> $this->input->post('tanggalpdh'));
		$condition['id_pindahtangan'] = $this->input->post('idpindahtangan');
		$this->KaryawanModel->simpanEditPemindahtanganan($data, $condition);
		$this->manajemenPemindahtanganan();
	}
	public function simpanEditPemusnahan() {
		$data = array('ID_PEMUSNAHAN'		=> $this->input->post('idpemusnahan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA'				=> $this->input->post('harga'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'JUMLAH'				=> $this->input->post('jumlah'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'STATUS'				=> $this->input->post('stpenghapusan'),
					  'PENGAJUAN'			=> $this->input->post('pengajuan'));
		$condition['id_pemusnahan'] = $this->input->post('idpemusnahan');
		$this->KaryawanModel->simpanEditPemusnahan($data, $condition);
		$this->manajemenPemusnahan();
	}

	public function simpanEditPenghapusan() {
		$data = array('ID_PENGHAPUSAN'		=> $this->input->post('idpenghapusan'),
					  'ID_PEMUSNAHAN'		=> $this->input->post('idpemusnahan'),
					  'ID_BARANG'			=> $this->input->post('idbarang'),
					  'KODE_LOKASI'			=> $this->input->post('kodelokasi'),
					  'KODE_BARANG'			=> $this->input->post('kodebarang'),
					  'NUP'					=> $this->input->post('nup'),
					  'NAMA_BARANG'			=> $this->input->post('nama'),
					  'MERK'				=> $this->input->post('merk'),
					  'TANGGAL_PEROLEHAN'	=> $this->input->post('tanggal'),
					  'HARGA_PEROLEHAN'		=> $this->input->post('harga'),
					  'KONDISI'				=> $this->input->post('kondisi'),
					  'JUMLAH'				=> $this->input->post('jumlah'),
					  'KETERANGAN'			=> $this->input->post('keterangan'),
					  'STATUS_BARANG'		=> $this->input->post('status'),
					  'PENGAJUAN'			=> $this->input->post('pengajuan'),
					  'STATUS_HAPUS'		=> $this->input->post('stpenghapusan'));
		$condition['id_penghapusan'] = $this->input->post('idpenghapusan');
		$this->KaryawanModel->simpanEditPenghapusan($data, $condition);
		$this->manajemenPenghapusan();
	}


	public function hapusRekamData() {
		$idBarang = $this->input->get('id');
		$this->KaryawanModel->hapusRekamData($idBarang);
		$this->manajemenBarang();
    }
	
	public function penggunaan() {
		$data = array('listBarang' => $this->KaryawanModel->listBarang());


		$this->load->view('TabelPenggunaan', $data);
	}
	public function hapusPenggunaan() {
		$idPenggunaan = $this->input->get('id');
		$this->KaryawanModel->hapusPenggunaan($idPenggunaan);
		$this->manajemenPenggunaan();
    }

	public function tambahPenggunaan() {
		$action = 'Add';
		$idBarang = $this->input->get('id');
		$data = array('dataBarang' => $this->KaryawanModel->getPenggunaan($idBarang), 'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode();
		$this->load->view('PenggunaanBarang', $data);
	}
	
	public function pemanfaatan() {
		
		$data = array('listBarang' => $this->KaryawanModel->listBarang());
		$this->load->view('TabelPemanfaatan', $data);
	}
	

	public function tambahPemanfaatan() {
		$action = 'Add';
		$idBarang = $this->input->get('id');
		$data = array('dataBarang' => $this->KaryawanModel->getPemanfaatan($idBarang),
						'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode_pmf();
		$this->load->view('PemanfaatanBarang', $data);
	}

	public function hapusPemanfaatan() {
		$idPemanfaatan = $this->input->get('id');
		$this->KaryawanModel->hapusPemanfaatan($idPemanfaatan);
		$this->manajemenPemanfaatan();
    }
	
	public function pemeliharaan() {
		$data = array('listBarang' => $this->KaryawanModel->listBarang());
		$this->load->view('TabelPemeliharaan', $data);
	}

	public function tambahPemeliharaan() {
		$action = 'Add';
		$idBarang = $this->input->get('id');
		$data = array('dataBarang' => $this->KaryawanModel->getPemeliharaan($idBarang), 'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode_pmh();
		$this->load->view('PemeliharaanBarang', $data);
	}
	
	public function hapusPemeliharaan() {
		$idPemeliharaan = $this->input->get('id');
		$this->KaryawanModel->hapusPemeliharaan($idPemeliharaan);
		$this->manajemenPemeliharaan();
    }

	public function pemindahtanganan() {
		$data = array('listBarang' => $this->KaryawanModel->listBarang());
		$this->load->view('TabelPemindahtanganan', $data);
	}

	public function tambahPemindahtanganan() {
		$action = 'Add';
		$idBarang = $this->input->get('id');
		$data = array('dataBarang' => $this->KaryawanModel->getPemindahtanganan($idBarang), 'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode_pdt();
		$this->load->view('PemindahtangananBarang', $data);
	}
	public function hapusPemindahtanganan() {
		$idPindahtangan = $this->input->get('id');
		$this->KaryawanModel->hapusPemindahtanganan($idPindahtangan);
		$this->manajemenPemindahtanganan();
    }
	
	public function pemusnahan() {
		$data = array('listBarang' => $this->KaryawanModel->listBarang());
		$this->load->view('TabelPemusnahan', $data);
	}
	public function hapusPemusnahan() {
		$idPemusnahan = $this->input->get('id');
		$this->KaryawanModel->hapusPemusnahan($idPemusnahan);
		$this->manajemenPemusnahan();
    }

	public function tambahPemusnahan() {
		$action = 'Add';

		$idBarang = $this->input->get('id');
		$data = array('dataBarang' => $this->KaryawanModel->getPemusnahan($idBarang), 'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode_pms();
		$this->load->view('PemusnahanBarang', $data);
	}

	public function penghapusan() {
		$data = array('listPemusnahan' => $this->KaryawanModel->listPemusnahan());
		$this->load->view('TabelPenghapusan', $data);
	}
	public function hapusPenghapusan() {
		$idPenghapusan = $this->input->get('id');
		$this->KaryawanModel->hapusPenghapusan($idPenghapusan);
		$this->manajemenPenghapusan();
    }

	public function tambahPenghapusan() {
		$action = 'Add';
		$idPemusnahan = $this->input->get('id');
		$data = array('dataPemusnahan' => $this->KaryawanModel->getPenghapusan($idPemusnahan), 'action' => $action);
		$data['kodeunik'] = $this->KaryawanModel->buat_kode_hps();
		$this->load->view('PenghapusanBarang', $data);
	}
	
	public function manajemenBarang() {
		$action = $this->input->get('a');
		$data = array('listBarang' => $this->KaryawanModel->listBarang(),
						'action' => $action);
		$this->load->view('TabelBarang', $data);
	}
	
	public function manajemenPenggunaan() {
		$action = $this->input->get('a');
		
		$data = array('listPenggunaan' => $this->KaryawanModel->listPenggunaan(),
			'action' => $action);
		$this->load->view('TransaksiPenggunaan', $data);
	}
	
	public function manajemenPemanfaatan() {
		$action = $this->input->get('a');
		$data = array('listPemanfaatan' => $this->KaryawanModel->listPemanfaatan(),
			'action' => $action);
		$this->load->view('TransaksiPemanfaatan', $data);
    }
    public function manajemenPemeliharaan() {
		$action = $this->input->get('a');
		$data = array('listPemeliharaan' => $this->KaryawanModel->listPemeliharaan(),
			'action' => $action);
		$this->load->view('TransaksiPemeliharaan', $data);
    }
    public function manajemenPemindahtanganan() {
		$action = $this->input->get('a');
		$data = array('listPemindahtanganan' => $this->KaryawanModel->listPemindahtanganan(),
			'action' => $action);
		$this->load->view('TransaksiPemindahtanganan', $data);
    }
    public function manajemenPemusnahan() {
		$action = $this->input->get('a');
		$data = array('listPemusnahan' => $this->KaryawanModel->listPemusnahan(),
			'action' => $action);
		$this->load->view('TransaksiPemusnahan', $data);
    }
    public function manajemenPenghapusan() {
		$action = $this->input->get('a');
		$data = array('listPenghapusan' => $this->KaryawanModel->listPenghapusan(),
			'action' => $action);
		$this->load->view('TransaksiPenghapusan', $data);
    }

	public function printPDF() {
		$flag = $this->uri->segment(3);
		$this->load->library('pdf');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
		$pdf->AddPage('');
		$pdf->setJPEGQuality(75);
		$pdf->Image('./images/Kop.jpg', 0, 0, 210, 30, 'JPG', 'http://www.tcpdf.org', '', false, 150, '', false, true, 0, false, false, false);
		$pdf->SetFont('helvetica', 'B', 20);
		$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
		$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
		$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
		$pdf->Write(0, 'Laporan Data '.$flag, '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', 'B', '14');
		$pdf->Write(0, 'Periode : Bulan '.$this->input->post('bulan').' Tahun '.$this->input->post('tahun'), '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('helvetica', '', '10');
		$dataHeader = $this->getHeaderForPDF($flag, $this->input->post('bulan'), $this->input->post('tahun'));
        $pdf->writeHTML($dataHeader);
        $pdf->Output('REKAM_DATA_'.strtoupper($flag).'_'.date("Y/m/d").'.pdf', 'D');
	}

	private function getHeaderForPDF($flag, $bulan, $tahun) {
		$arrHeader = [];
		$arrHeaderWidth = [];
		$arrContent = [];
		$dataContent = '';
		$result = $this->KaryawanModel->getDataForPrint($flag, $bulan, $tahun);
		if ($flag == "Barang") {
			$arrHeader = ["Kode Barang", "Nama Barang", "Tanggal", "Harga", "Kondisi", "Status"];
			$arrHeaderWidth = ["25%", "23%", "12%", "13%", "17%", "10%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->tgl_perolehan.'</td>
						<td> '.$row->harga_perolehan.'</td>
						<td> '.$row->kondisi_barang.'</td>
						<td> '.$row->status_barang.'</td>
					</tr>';
			}
		} elseif ($flag == "Penggunaan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Kepemilikan", "Penggunaan"];
			$arrHeaderWidth = ["10%", "20%", "20%", "14%", "18%", "18%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_penggunaan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->status_kepemilikan.'</td>
						<td> '.$row->status_penggunaan.'</td>
					</tr>';
			}
		} elseif ($flag == "Pemanfaatan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Peminjam", "Tgl Pinjam", "Tgl Kembali", "Status"];
			$arrHeaderWidth = ["9%", "19%", "17%", "11%", "12%", "11%", "11%", "10%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_pemanfaatan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->nama_sewa.'</td>
						<td> '.$row->tanggal_sewa.'</td>
						<td> '.$row->tanggal_kembali.'</td>
						<td> '.$row->status_verifikasi.'</td>
					</tr>';
			}
		} elseif ($flag == "Pemeliharaan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Pemeliharaan", "Tanggal", "Status"];
			$arrHeaderWidth = ["9%", "23%", "19%", "13%", "16%", "11%", "10%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_pemeliharaan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->status_pemeliharaan.'</td>
						<td> '.$row->tanggal_perbaikan.'</td>
						<td> '.$row->status_verifikasi.'</td>
					</tr>';
			}
		} elseif ($flag == "Pemindahtanganan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Penerima", "Tanggal", "Status"];
			$arrHeaderWidth = ["9%", "20%", "20%", "14%", "15%", "11%", "11%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_pindahtangan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->nama_penerima.'</td>
						<td> '.$row->tanggal_pindahtangan.'</td>
						<td> '.$row->status_pindahtangan.'</td>
					</tr>';
			}
		} elseif ($flag == "Pemusnahan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Jumlah", "Pengajuan", "Status"];
			$arrHeaderWidth = ["9%", "22%", "20%", "14%", "8%", "16%", "11%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_pemusnahan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->jumlah.'</td>
						<td> '.$row->pengajuan.'</td>
						<td> '.$row->status_verifikasi.'</td>
					</tr>';
			}
		} elseif ($flag == "Penghapusan") {
			$arrHeader = ["ID", "Kode Barang", "Nama Barang", "Merk/Tipe", "Jumlah", "Status"];
			$arrHeaderWidth = ["9%", "25%", "20%", "16%", "8%", "22%"];
			foreach ($result as $row) {
				$dataContent .= '<tr>
						<td> '.$row->id_penghapusan.'</td>
						<td> '.$row->kode_barang.'</td>
						<td> '.$row->nama_barang.'</td>
						<td> '.$row->merk.'</td>
						<td> '.$row->jumlah.'</td>
						<td> '.$row->status_hapus.'</td>
					</tr>';
			}
		}
		$data = '<table border="1"><tr>';
		for ($x = 0; $x < count($arrHeader); $x++) {
			$data .= '<th width="'.$arrHeaderWidth[$x].'"> <b>'.$arrHeader[$x].'</b></th>';
		}
		$data .= '</tr>'.$dataContent;
		$data .= '</table>';
		return $data;
	}

	public function printBarcode() {
		$dataBarang = $this->KaryawanModel->editRekamData($this->input->get('id'));
		$namaBarang = "";
		$kodeBarang = "";
		foreach ($dataBarang as $row) {
			$namaBarang = $row->nama_barang;
			$kodeBarang = $row->kode_barang;
		}
		$this->load->library('pdf');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
		$pdf->AddPage();
		$pdf->SetFont('helvetica', 'B', 20);
		$pdf->Write(0, 'Laporan Data Barang', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', '14');
		$pdf->Cell(0, 0, 'Nama Barang : '.$namaBarang, 0, 1);
		$pdf->Cell(0, 0, 'Kode Barang : '.$kodeBarang, 0, 1);
		$pdf->Ln();
		$style = array(
			'border' => 2,
			'vpadding' => 'auto',
			'hpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);
		$pdf->write2DBarcode($kodeBarang, 'PDF417', 11, 42, 0, 30, $style, 'N');
        $pdf->Output('REKAM_DATA_BARANG_'.$namaBarang.'_'.$kodeBarang.'.pdf', 'D');
	}

}