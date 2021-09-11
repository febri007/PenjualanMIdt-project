<?php
// Mengambil data isi content website di controller dari vaiabel isi home.php
if ( $isi )
{
	$this->load->view($isi);
}


// if $isi jika ada variabel isi, diperintahkan untuk menload $this->load->view($isi); jadi home/listnya yg diload, dia memerintahkan meload tampilan isi yg ada di variabel $isi