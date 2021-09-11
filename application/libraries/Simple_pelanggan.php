<?php // ini isinya copy dari Simple_pelanggan.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		// Load data model user
		$this->CI->load->model('pelanggan_model');
	}

	// Fungsi Login
	public function login($email,$password) // sebelumnya $email
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		// Jika ada data user, maka create session login
		if($check) {
			$id_pelanggan	= $check->id_pelanggan;
			$nama_pelanggan	= $check->nama_pelanggan;	
			// Create Session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan); // sebelumnya itu $nama
			$this->CI->session->set_userdata('email',$email); // sebelumnya itu $username
			// klo dh berhasil lansung redirect ke halaman admin/dasbor yg diproteksi
			redirect(base_url('dasbor'),'refresh'); // sblmnya itu admin/dasbor
		} else{
			// Kalau tidak ada/password salah, maka suruh login lgi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah');
			redirect(base_url('masuk'),'refresh'); // sblmnya base_url('login')		
		}
	}

	// Fungsi cek login
	public function cek_login()
	{
	// Memeriksa apakah session sudah ada atau belum, klo blm akan di alihkan ke halaman login
		if($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('masuk'),'refresh'); // sblmnya ('login'), ngecek ada apa ngga emailnya, klo blm ada dia ke ('masuk')
		}
	}

	// Fungsi logout
	public function logout() // logoutnya cmn 3 karna sessionya jga 3
	{
		// membuang semua session yang telah dibuat pada saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		// Setelah session dibuang, maka redirect ke masuk
		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('masuk'),'refresh'); // sblmnya ('login'), ketika dia logout akan diarahkan ke halaman masuk
	}
}