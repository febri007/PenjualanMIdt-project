<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {
	
	public function get_search(){
		$match = $this->input->post('search');
	  	$this->db->like('nama_produk',$match);
	  	$this->db->or_like('slug_produk',$match);
	  	$query = $this->db->get('produk');
	  return $query->result();
	}
}