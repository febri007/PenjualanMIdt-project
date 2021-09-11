<?php
// PROTEKSI HALAMAN ADMIN WAJIB LOGIN DGN FUNGSI CEK_LOGIN yg ada di Simple_login
$this->simple_login->cek_login();
// GABUNGKAN SEMUA BAGIAN LAYOUT MENJADDI SATU
 require_once('head.php');
 require_once('header.php');
 require_once('nav.php');
 require_once('content.php');
 require_once('footer.php');
