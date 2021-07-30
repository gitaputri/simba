<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model {

    public function listBarang() {
		$this->db->select('id_barang, kode_barang, kode_lokasi, nama_barang, merk, tgl_perolehan, status_barang, jenis_barang');
        $this->db->from('barang');
		$this->db->order_by('id_barang', 'ASC');
		$query = $this->db->get();
		return $query->result();
    }

    public function getDataForPrint($flag, $bulan, $tahun) {
        if ($flag == "Barang") {
            $this->db->select('kode_barang, nama_barang, tgl_perolehan, harga_perolehan, kondisi_barang, status_barang');
            $this->db->from('barang');
            $this->db->like('tgl_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_barang', 'ASC');
		} elseif ($flag == "Penggunaan") {
            $this->db->select('id_penggunaan, kode_barang, nama_barang, merk, status_kepemilikan, status_penggunaan');
            $this->db->from('penggunaan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_penggunaan', 'ASC');
		} elseif ($flag == "Pemanfaatan") {
            $this->db->select('id_pemanfaatan, kode_barang, nama_barang, merk, nama_sewa, tanggal_sewa, tanggal_kembali, status_verifikasi');
            $this->db->from('pemanfaatan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_pemanfaatan', 'ASC');
		} elseif ($flag == "Pemeliharaan") {
            $this->db->select('id_pemeliharaan, kode_barang, nama_barang, merk, status_pemeliharaan, tanggal_perbaikan, status_verifikasi');
            $this->db->from('pemeliharaan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_pemeliharaan', 'ASC');
		} elseif ($flag == "Pemindahtanganan") {
            $this->db->select('id_pindahtangan, kode_barang, nama_barang, merk, status_pindahtangan, nama_penerima, tanggal_pindahtangan');
            $this->db->from('pindahtangan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_pindahtangan', 'ASC');
		} elseif ($flag == "Pemusnahan") {
            $this->db->select('id_pemusnahan, kode_barang, nama_barang, merk, jumlah, pengajuan, status_verifikasi');
            $this->db->from('pemusnahan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_pemusnahan', 'ASC');
		} elseif ($flag == "Penghapusan") {
            $this->db->select('id_penghapusan, kode_barang, nama_barang, merk, jumlah, status_hapus');
            $this->db->from('penghapusan');
            $this->db->like('tanggal_perolehan', $bulan.'/'.$tahun);
		    $this->db->order_by('id_penghapusan', 'ASC');
		}
		$query = $this->db->get();
		return $query->result();
    }
    
    public function listPenggunaan() {
		$this->db->select('id_penggunaan, kode_barang, nama_barang, merk, status_kepemilikan, status_penggunaan');
        $this->db->from('penggunaan');
		$this->db->order_by('id_penggunaan', 'ASC');
		$query = $this->db->get();
		return $query->result();
    }
    
    public function listPemanfaatan() {
		$this->db->select('id_pemanfaatan, kode_barang, nama_barang, merk, nama_sewa, tanggal_sewa, tanggal_kembali, status_verifikasi');
        $this->db->from('pemanfaatan');
		$this->db->order_by('id_pemanfaatan', 'ASC');
		$query = $this->db->get();
		return $query->result();
    }

    public function listPemeliharaan() {
    $this->db->select('id_pemeliharaan,kode_barang, nama_barang, merk, status_pemeliharaan, tanggal_perbaikan, status_verifikasi');
    $this->db->from('pemeliharaan');
    $this->db->order_by('id_pemeliharaan', 'ASC');
    $query = $this->db->get();
    return $query->result();
    }

    public function listPemindahtanganan() {
    $this->db->select('id_pindahtangan,kode_barang, nama_barang, merk, status_pindahtangan, nama_penerima, tanggal_pindahtangan');
    $this->db->from('pindahtangan');
    $this->db->order_by('id_pindahtangan', 'ASC');
    $query = $this->db->get();
    return $query->result();
    }
    public function listPemusnahan() {
    $this->db->select('id_pemusnahan,kode_barang, nama_barang, merk, status, jumlah, pengajuan, status_verifikasi');
    $this->db->from('pemusnahan');
    $this->db->order_by('id_pemusnahan', 'ASC');
    $query = $this->db->get();
    return $query->result();
    }
    public function listPenghapusan() {
    $this->db->select('id_penghapusan, id_pemusnahan,kode_barang, nama_barang, merk, status_barang, jumlah, pengajuan, status_hapus');
    $this->db->from('penghapusan');
    $this->db->order_by('id_penghapusan', 'ASC');
    $query = $this->db->get();
    return $query->result();
    }


    

    public function getId() {
		$result = array();
		$this->db->select('max(id_barang) as id');
		$this->db->from('barang');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$result['id'] = $row->id + 1;
		}
        return $result;
    }

  function buat_kode()   {    
  $this->db->select('RIGHT(penggunaan.ID_PENGGUNAAN,3) as ID_PENGGUNAAN', FALSE);
  $this->db->order_by('ID_PENGGUNAAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('penggunaan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PENGGUNAAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "PGN".$kodemax;    
  return $kodejadi;  
 }

 function buat_kode_pmf()   {    
  $this->db->select('RIGHT(pemanfaatan.ID_PEMANFAATAN,3) as ID_PEMANFAATAN', FALSE);
  $this->db->order_by('ID_PEMANFAATAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('pemanfaatan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PEMANFAATAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "PMF".$kodemax;    
  return $kodejadi;  
 }

 function buat_kode_pmh()   {    
  $this->db->select('RIGHT(pemeliharaan.ID_PEMELIHARAAN,3) as ID_PEMELIHARAAN', FALSE);
  $this->db->order_by('ID_PEMELIHARAAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('pemeliharaan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PEMELIHARAAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "PMH".$kodemax;    
  return $kodejadi;  
 }

 function buat_kode_pdt()   {    
  $this->db->select('RIGHT(pindahtangan.ID_PINDAHTANGAN,3) as ID_PINDAHTANGAN', FALSE);
  $this->db->order_by('ID_PINDAHTANGAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('pindahtangan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PINDAHTANGAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "PDT".$kodemax;    
  return $kodejadi;  
 }

 function buat_kode_pms()   {    
  $this->db->select('RIGHT(pemusnahan.ID_PEMUSNAHAN,3) as ID_PEMUSNAHAN', FALSE);
  $this->db->order_by('ID_PEMUSNAHAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('pemusnahan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PEMUSNAHAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "PMS".$kodemax;    
  return $kodejadi;  
 }

 function buat_kode_hps()   {    
  $this->db->select('RIGHT(penghapusan.ID_PENGHAPUSAN,3) as ID_PENGHAPUSAN', FALSE);
  $this->db->order_by('ID_PENGHAPUSAN','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('penghapusan');   
  if($query->num_rows() <> 0){         
   $data = $query->row();      
   $kode = intval($data->ID_PENGHAPUSAN) + 1;    
  }
  else{      
   //jika kode belum ada      
   $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  $kodejadi = "HPS".$kodemax;    
  return $kodejadi;  
 }


    
    public function simpanRekamData($data) {
		$this->db->insert('barang', $data);
		return true;
    }
    
    public function editRekamData($idBarang) {
        $this->db->select('id_barang, kode_lokasi, jenis_invetarisasi, kode_barang, nup, tgl_perolehan,
            faktur, gambar, nama_barang, merk, jenis_barang, harga_perolehan, satuan, kuantitas, akm_penyusutan,
            nilai_buku, kondisi_barang, status_barang');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();
    }

    public function simpanEditRekamData($data, $condition) {
		$this->db->where($condition);
        $this->db->update('barang', $data);
	  }
    
    public function hapusRekamData($idBarang) {
		$this->db->where('id_barang', $idBarang);
		$this->db->delete('barang');
    }
    
    public function getPenggunaan($idBarang) {
        $this->db->select('id_barang, kode_lokasi, kode_barang, nup, tgl_perolehan, nama_barang, merk, harga_perolehan');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();
    }
    public function hapusPenggunaan($idPenggunaan) {
        $this->db->where('id_penggunaan', $idPenggunaan);
        $this->db->delete('penggunaan');
    }

    public function simpanPenggunaan($data) {
        $this->db->insert('penggunaan', $data);
    }

    public function editPenggunaan($idPenggunaan) {
        $this->db->select('id_penggunaan, id_barang, kode_lokasi, kode_barang, nup,
            nama_barang, merk, tanggal_perolehan, harga_perolehan, status_kepemilikan, status_penggunaan');
        $this->db->from('penggunaan');
    $this->db->where('id_penggunaan', $idPenggunaan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPenggunaan($data, $condition) {
    $this->db->where($condition);
        $this->db->update('penggunaan', $data);
    }

    public function getPemanfaatan($idBarang) {
        $this->db->select('id_barang, kode_lokasi, kode_barang, nup, tgl_perolehan, nama_barang, merk, harga_perolehan');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();
    }
    public function simpanPemanfaatan($data) {
        $this->db->insert('pemanfaatan', $data);
    }

    public function editPemanfaatan($idPemanfaatan) {
        $this->db->select('id_pemanfaatan, id_barang, kode_lokasi, kode_barang, nup,
            nama_barang, merk, tanggal_perolehan, harga_perolehan, status_pemanfaatan, nama_sewa, lama_sewa, tanggal_sewa, tanggal_kembali, harga_sewa, kondisi_barang, jaminan, status_verifikasi');
        $this->db->from('pemanfaatan');
    $this->db->where('id_pemanfaatan', $idPemanfaatan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPemanfaatan($data, $condition) {
    $this->db->where($condition);
        $this->db->update('pemanfaatan', $data);
    }

    public function hapusPemanfaatan($idPemanfaatan) {
        $this->db->where('id_pemanfaatan', $idPemanfaatan);
        $this->db->delete('pemanfaatan');
    }

    public function simpanPemeliharaan($data) {
        $this->db->insert('pemeliharaan', $data);
      }
    public function editPemeliharaan($idPemeliharaan) {
    $this->db->select('id_pemeliharaan, id_barang, kode_barang, nama_barang, merk, jenis_barang, tanggal_perolehan, status_pemeliharaan, tanggal_perbaikan, keterangan, biaya,nota, status_verifikasi');
    $this->db->from('pemeliharaan');
    $this->db->where('id_pemeliharaan', $idPemeliharaan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPemeliharaan($data, $condition) {
    $this->db->where($condition);
        $this->db->update('pemeliharaan', $data);
    }

      
    public function getPemeliharaan($idBarang) {
        $this->db->select('id_barang, kode_lokasi, kode_barang, nup, tgl_perolehan, nama_barang, merk, harga_perolehan, jenis_barang');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();
    }

    public function hapusPemeliharaan($idPemeliharaan) {
        $this->db->where('id_pemeliharaan', $idPemeliharaan);
        $this->db->delete('pemeliharaan');
    }

    public function getPemindahtanganan($idBarang) {
        $this->db->select('id_barang, kode_lokasi, kode_barang, nup, tgl_perolehan, nama_barang, merk, harga_perolehan');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();

    }

    public function editPemindahtanganan($idPindahtangan) {
        $this->db->select('id_pindahtangan, id_barang, kode_lokasi, kode_barang, nup,
            nama_barang, merk, tanggal_perolehan, harga_perolehan, status_pindahtangan, keterangan, kondisi, nama_penerima, tanggal_pindahtangan');
        $this->db->from('pindahtangan');
    $this->db->where('id_pindahtangan', $idPindahtangan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPemindahtanganan($data, $condition) {
    $this->db->where($condition);
        $this->db->update('pindahtangan', $data);
    }



    public function hapusPemindahtanganan($idPindahtangan) {
        $this->db->where('id_pindahtangan', $idPindahtangan);
        $this->db->delete('pindahtangan');
    }

    public function simpanPemindahtanganan($data) {
        $this->db->insert('pindahtangan', $data);

      }
    public function getPemusnahan($idBarang) {
        $this->db->select('id_barang, kode_lokasi, kode_barang, nup, tgl_perolehan, nama_barang, merk, harga_perolehan');
        $this->db->from('barang');
		$this->db->where('id_barang', $idBarang);
		$query = $this->db->get();
		return $query->result();
    }

     public function editPemusnahan($idPemusnahan) {
        $this->db->select('id_pemusnahan, id_barang, kode_lokasi, kode_barang, nup,
            nama_barang, merk, tanggal_perolehan, harga, kondisi, jumlah, keterangan, status, pengajuan, status_verifikasi');
        $this->db->from('pemusnahan');
    $this->db->where('id_pemusnahan', $idPemusnahan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPemusnahan($data, $condition) {
        $this->db->where($condition);
        $this->db->update('pemusnahan', $data);
    }

    public function hapusPemusnahan($idPemusnahan) {
        $this->db->where('id_pemusnahan', $idPemusnahan);
        $this->db->delete('pemusnahan');
    }

    public function simpanPemusnahan($data) {
        $this->db->insert('pemusnahan', $data);

      }

    public function getPenghapusan($idPemusnahan) {
        $this->db->select('id_pemusnahan, kode_barang, kode_lokasi, kode_barang, nup, tanggal_perolehan, nama_barang, merk, harga, kondisi, jumlah, keterangan, status, pengajuan');
        $this->db->from('pemusnahan');
    $this->db->where('id_pemusnahan', $idPemusnahan);
    $query = $this->db->get();
    return $query->result();
    }

    public function editPenghapusan($idPenghapusan) {
        $this->db->select('id_penghapusan, id_pemusnahan, id_barang, kode_lokasi, kode_barang, nup,
            nama_barang, merk, tanggal_perolehan, harga_perolehan, kondisi, jumlah, keterangan, status_barang, pengajuan, status_hapus');
        $this->db->from('penghapusan');
    $this->db->where('id_penghapusan', $idPenghapusan);
    $query = $this->db->get();
    return $query->result();
    }

    public function simpanEditPenghapusan($data, $condition) {
        $this->db->where($condition);
        $this->db->update('penghapusan', $data);
    }

    public function hapusPenghapusan($idPenghapusan) {
        $this->db->where('id_penghapusan', $idPenghapusan);
        $this->db->delete('penghapusan');
    }

    public function simpanPenghapusan($data, $idPemusnahan) {
       $this->db->where('id_pemusnahan', $idPemusnahan);
        $this->db->delete('pemusnahan');
        $this->db->insert('penghapusan', $data);

      }
    
}