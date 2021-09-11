<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		// $this->load->model('SearchModel');
		// Load Helper Random String
		$this->load->helper('string');
	}

	// Halaman Belanja
	public function index()
	{

		$keranjang 	= $this->cart->contents();

		$data 	= array(
			'title'		=> 'Keranjang Belanja',
			'keranjang'	=> $keranjang,
			'isi'		=> 'belanja/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Halaman localhost/toko/belanja/sukses
	public function sukses()
	{

		$data 	= array(
			'title'		=> 'Belanja Berhasil',
			'isi'		=> 'belanja/sukses'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Checkout...
	public function checkout()
	{
		//punya rajaongkir
		$provinsi = $this->province();

		// Cek Pelanggan udh login apa blm, jika blm maka nanti hrs registrasi dan juga skaligus login. Nah nanti mengeceknya dgn session email

		// Kondisi sudah login
		if ($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	= $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

			$keranjang 	= $this->cart->contents();
			$this->load->helpers('rupiah_helper');
			// Validasi Input
			$valid = $this->form_validation;

			$valid->set_rules(
				'nama_pelanggan',
				'Nama lengkap',
				'required',
				array('required'		=> '%s harus diisi')
			);

			$valid->set_rules(
				'telepon',
				'Nomor Telepon',
				'required',
				array('required'		=> '%s harus diisi')
			);

			$valid->set_rules(
				'alamat',
				'Alamat',
				'required',
				array('required'		=> '%s harus diisi')
			);

			$valid->set_rules(
				'email',
				'Email',
				'required|valid_email',
				array(
					'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'
				)
			);

			if ($valid->run() === FALSE) {
				// END Validasi

				$data 	= array(
					'province'	=> $provinsi,
					'title'		=> 'Checkout',
					'keranjang'	=> $keranjang,
					'pelanggan' => $pelanggan,
					'isi'		=> 'belanja/checkout' // views/belanja/checkout.php
				);
				$this->load->view('layout/wrapper', $data, FALSE);
				// Kemudian di Proses Disini Masuk Database
			} else {
				$i = $this->input;
				$data = array(
					'id_pelanggan'		=> $pelanggan->id_pelanggan,
					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
					'email'				=> $i->post('email'),
					'telepon'			=> $i->post('telepon'),
					'alamat'			=> $i->post('alamat'),
					'kode_transaksi'	=> $i->post('kode_transaksi'),
					'tanggal_transaksi' => $i->post('tanggal_transaksi'),
					'jumlah_transaksi'  => $i->post('jumlah_transaksi') + $i->post('ongkir'),
					'status_bayar'		=> 'Belum',
					'tanggal_post'      => date('Y-m-d H:i:s')
				);
				// Proses Masuk ke Header Transaksinya
				$this->header_transaksi_model->tambah($data);
				// Proses Masuk Ke Tabel Transaksi, ambil dari checkout. ini sesuai sama field tabel Transaksi
				foreach ($keranjang as $keranjang) {
					$sub_total = $keranjang['price'] * $keranjang['qty'];

					$data = array(
						'id_pelanggan'		=> $pelanggan->id_pelanggan,
						'kode_transaksi'	=> $i->post('kode_transaksi'),
						'id_produk'			=> $keranjang['id'], // diambil dari checkout.php line 32. itu yg cart bawaan CI UserGuide
						'harga'				=> $keranjang['price'],
						'jumlah'			=> $keranjang['qty'],
						'total_harga'       => $sub_total,
						'tanggal_transaksi' => $i->post('tanggal_transaksi')
					);
					$this->transaksi_model->tambah($data);
				}
				//End Proses Masuk ke Tabel Transaksi
				// Setelah masuk ke tabel transaksi, maka tabel keranjang dikosongkan lagi
				$this->cart->destroy();
				// End Pengosongan Keranjang...
				$this->session->set_flashdata('sukses', 'Check Out Berhasil');
				redirect(base_url('belanja/sukses'), 'refresh');
			}
			// End Database	
		} else {
			// Kalau blm, maka hrs registrasi
			$this->session->set_flashdata('sukses', 'Silahkan Login atau Registrasi terlebih dahulu');
			redirect(base_url('registrasi'), 'refresh');
		}
	}


	// Tambahkan ke Keranjang Belanja
	public function add()
	{
		// Ambil data dari form
		$id 			= $this->input->post('id');
		$qty			= $this->input->post('qty');
		$price			= $this->input->post('price');
		$name			= $this->input->post('name');
		$berat			= $this->input->post('berat');
		$redirect_page  = $this->input->post('redirect_page');

		// Proses Memasukan ke keranjang belanja, 'id' diambil dari variabel $id
		// $opt = array('berat' => $berat);
		$data = array(
			'id'		=> $id,
			'qty'		=> $qty,
			'price'		=> $price,
			'name'		=> $name,
			'berat'		=> $berat
		);
		$this->cart->insert($data);
		// Redirect Page
		redirect($redirect_page, 'refresh');
	}

	// Fungsi Form Update Cart
	public function update_cart($rowid)
	{
		// Jika ada data rowid
		if ($rowid) {
			$data = array(
				'rowid'		=> $rowid,
				'qty'		=> $this->input->post('qty')
			);
			$this->cart->update($data); // ini perintah update bawaan CI di User Guide cart
			$this->session->set_flashdata('sukses', 'Data Keranjang berhasil di Update'); // itu Notifnya
			redirect(base_url('belanja'), 'refresh');
		} else {
			// Jika gada row id
			redirect(base_url('belanja'), 'refresh');
		}
	}

	// Fungsi Hapus/Reset Keranjang Belanja
	public function hapus($rowid = '') // ='' biar pas di klik Bersihkan Keranjang gda Error, Jd Defaultnya itu kosong gada Valuenya..
	{
		if ($rowid) {
			// Hapus pe Item Keranjang, liat di user guide di cart make remove
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data Belanja Telah Dihapus');
			redirect(base_url('belanja'), 'refresh');
		} else {
			// Hapus All, Bersihkan Keranjang Belanja
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data Belanja Telah Dihapus');
			redirect(base_url('belanja'), 'refresh');
		}
	}

	//Raja Ongkir
	public function province()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: cefc621f270a8d8e08740f3db508d0ea"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			$hasil = json_decode($response, true);
			return $hasil["rajaongkir"]["results"];
		}
	}

	public function kabupaten()
	{
		$prov = $this->input->get('prov_id');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$prov",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: cefc621f270a8d8e08740f3db508d0ea"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$kab = $data['rajaongkir']['results'];
			for ($i = 0; $i < count($kab); $i++) {
				echo "<option value='" . $kab[$i]['city_id'] . "'>" . $kab[$i]['city_name'] . "</option>";
			}
		}
	}

	public function ongkir()
	{
		// Set Kota asal
		$asal = 39; //kota bantul (39)

		$tujuan = $this->input->post('kab_id');
		$berat = $this->input->post('weight');
		$kurir = $this->input->post('kurir');


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$asal&destination=$tujuan&weight=$berat&courier=$kurir",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: cefc621f270a8d8e08740f3db508d0ea"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$ongkir = $data['rajaongkir']['results'][0]['costs'];
			for ($i = 0; $i < count($ongkir); $i++) {
				echo "<option value='" .  $ongkir[$i]['cost'][0]['value'] . "'>" . $ongkir[$i]['service'] . " - Rp." . $ongkir[$i]['cost'][0]['value'] . "</option>";
			}
		}
	}
}
