<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Search Controller
*/
class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('SearchModel');
		$this->load->model('produk_model');
		// $this->load->model('konfigurasi_model');
	}
	public function index(){

		$listing_kategori	= $this->produk_model->listing_kategori();
		$data['recommended'] = "";
		// $data['category_brand'] = $this->load->view('front/category','',true);
		$data['search_data'] = $this->SearchModel->get_search();
		$data['feature'] = $this->load->view("produk/search",$data,true);
		// $this->load->view('produk/list',$data);
		

		$data = array(	'title'				=>	'Search',
			'isi'				=>	'produk/search',
			'listing_kategori'	=>	$listing_kategori
		);
		$this->load->view('layout/wrapper', $data, FALSE);

		
	}
}