<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends CI_Controller {

	public function index() {
		if ($this->session->userdata('login') == 'Is Logged In') {
			if ($this->session->userdata('userRole') == 'Admin') {
				redirect('KaryawanController');
			} elseif ($this->session->userdata('userRole') == 'Karyawan') {
				redirect('KaryawanController');
			} elseif ($this->session->userdata('userRole') == 'Kepala Sekolah') {
				redirect('KaryawanController');
			}
		} else {
			$this->load->view('Login');
		}
    }
 
    public function login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE)));
		$result = $this->WelcomeModel->login($data);
		if($result->num_rows() == 1) {
			foreach ($result->result() as $data) {
				foreach ($result->result() as $sess) {
					$sess_data['login'] = 'Is Logged In';
					$sess_data['userId'] = $sess->username;
					$sess_data['userName'] = $sess->nama;
					$sess_data['userRole'] = $sess->status;
					$this->session->set_userdata($sess_data);
				}	
			} 
			if ($this->session->userdata('userRole') == 'Admin') {
				redirect('KaryawanController');
			} elseif ($this->session->userdata('userRole') == 'Karyawan') {
				redirect('KaryawanController');
			} elseif ($this->session->userdata('userRole') == 'Kepala Sekolah') {
				redirect('KepalaSekolahController');
			}
		} else {
			echo "<script>alert('Login Gagal: Cek Kembali Username dan Kata Sandi Anda!');history.go(-1);</script>";
		}
	}
	
	public function logout() {
		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userRole');
		session_destroy();
		redirect('WelcomeController');
	}
}
