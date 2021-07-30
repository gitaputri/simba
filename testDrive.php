<?php
class testDrive extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }
    public function uji_simpanRekamData()
    {
        $data = array(
            'KODE_LOKASI'         => 'Ruang Guru',
            'JENIS_INVETARISASI' => 'BRG',
            'KODE_BARANG'        => 'INV/SDN/DLG/BRG/119',
            'NUP'                => '123.456.789',
            'TGL_PEROLEHAN'        => '23/06/2021',
            'FAKTUR'            => 'notaa1.jpg',
            'GAMBAR'            => 'kamera2.jpg',
            'NAMA_BARANG'        => 'Kamera',
            'MERK'                => 'Canon',
            'JENIS_BARANG'        => 'ELEKTRONIK',
            'HARGA_PEROLEHAN'    => '7000000',
            'SATUAN'            => '1',
            'KUANTITAS'            => '1',
            'AKM_PENYUSUTAN'     => '1',
            'NILAI_BUKU'         => '1',
            'KONDISI_BARANG'     => 'BAIK',
            'STATUS_BARANG'     => 'BARU',
            'FAKTUR'            => 'notaa1.jpg',
            'GAMBAR'            => 'kamera2.jpg'
        );
        $expected_result = true;
        $simpan = new KaryawanModel();

        $result = $simpan->simpanRekamData($data);

        echo $this->unit->run($result, $expected_result, 'Pengujian Jalur 1');
    }
}
