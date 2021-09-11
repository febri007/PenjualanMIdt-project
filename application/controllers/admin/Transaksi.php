<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	// Load 3 Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}

	// Data transaksi
	public function index()
	{
		$header_transaksi 	= $this->header_transaksi_model->listing(); // function listing, $header_transaksi itu nanti dipanggil di table buat di foreach

		$data = array(
			'title'				=> 'Data Transaksi',
			'header_transaksi'	=> $header_transaksi,
			'isi'				=> 'admin/transaksi/list' // ini tuh url page list itu file di transaksi/list.php
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Function Detail buat di tombol klik Detail  di Menu Admin REKENING
	public function detail($kode_transaksi) // ini copy dari controller Dasbor.php function detail
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi); // manggil function pelanggan di Header_transaksi_model.php
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi); // ini dari Transaksi_model.php function kode_transaksi

		$data = array(
			'title'				=>	'Riwayat Belanja',
			'header_transaksi'	=>	$header_transaksi,
			'transaksi'			=>	$transaksi,
			'isi'				=>	'admin/transaksi/detail' // ini nama folder sama file detail.php atau url di pagenya
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tombol Cetak
	public function cetak($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site			  = $this->konfigurasi_model->listing(); // lalu load modelnya di line 13

		$data = array(
			'title'				=> 'Riwayat Belanja',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site,
		);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	// Tombol Export PDF
	public function pdf($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site			  = $this->konfigurasi_model->listing(); // lalu load modelnya di line 13

		$data = array(
			'title'				=> 'Riwayat Belanja',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site,
		);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);   buat variabel $html 
		$html = $this->load->view('admin/transaksi/cetak',  $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output a PDF file directly to the browser
		$mpdf->Output();  // Ini tuh lansung ke download
	}

	// Tombol Pengiriman
	public function kirim($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site			  = $this->konfigurasi_model->listing(); // lalu load modelnya di line 13

		$data = array(
			'title'				=> 'Riwayat Belanja',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site,
		);
		// $this->load->view('admin/transaksi/kirim', $data, FALSE);   buat variabel $html 
		$html = $this->load->view('admin/transaksi/kirim',  $data, true);
		// Load FUngsi MPdf
		$mpdf = new \Mpdf\Mpdf();
		// Setting HEADER dan FOOTER
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
		    <img src="' . base_url('assets/upload/image/' . $site->logo) . '" style="height: 50px; width: auto;"> 
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color: orange; color: white; font-size: 12px;">
				Alamat: ' . $site->namaweb . ' (' . $site->alamat . ')<br>
				Telepon: ' . $site->telepon . '
			</div>
		'); // Line 97 itu buat nampilin Logo di pdf pas mau di print
		// End Setting Header dan Footer
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output tampil dengan Nama Baru atau bisa di Save
		$nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
		$mpdf->Output($nama_file_pdf, 'I');
	}
}
