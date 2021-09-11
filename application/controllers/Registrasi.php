<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Halaman Regitrasi
	public function index()
	{

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_pelanggan',
			'Nama lengkap',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|valid_email|is_unique[pelanggan.email]',
			array(
				'required'		=> '%s harus diisi',
				'valid_email'	=> '%s tidak valid',
				'is_unique'		=> '%s sudah terdaftar. '
			)
		);

		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run() === FALSE) {
			// END Validasi

			$data = array(
				'title'		=> 'Registrasi Pelanggan',
				'isi'		=> 'registrasi/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
			// Masuk Database
		} else {
			$i = $this->input;
			$data = array(
				'status_pelanggan'	=> 'Aktif',
				'nama_pelanggan'	=> $i->post('nama_pelanggan'),
				'email'				=> $i->post('email'),
				'password'			=> SHA1($i->post('password')),
				'telepon'			=> $i->post('telepon'),
				'alamat'			=> $i->post('alamat'),
				'tanggal_daftar'    => date('Y-m-d H:i:s')
			);
			$this->pelanggan_model->tambah($data);

			// // Create Session Pelanggan
			// $this->session->set_userdata('email',$i->post('email')); // email dpt datanya dari $i->post('email')
			// $this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));

			// End Crate Session
			$this->session->set_flashdata('sukses', 'Registrasi Berhasil');
			redirect(base_url('registrasi/sukses'), 'refresh');

			// proses ke simple login
			// $this->simple_pelanggan->login($email,$password);
		}
		// End Masuk database
	}

	// http://localhost/toko/registrasi/sukses 
	public function sukses()
	{
		$data = array(
			'title'		=>	'Registrasi Berhasil',
			'isi'		=>	'registrasi/sukses'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */