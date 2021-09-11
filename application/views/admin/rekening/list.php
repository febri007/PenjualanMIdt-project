<p>
	<a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<!-- ini kodingan muncul di toko/admin/rekening -->
<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
	// Nanti itu muncul belakangan
}
?>
<table class="table table-bordered" id="example1">
	<thead> 
		<tr>
			<th>NO</th>
			<th>NAMA BANK</th>
			<th>NO REKENING</th>
			<th>PEMILIK</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($rekening as $rekening) { // Ini tuh field2 dari table rekening?>
		<tr> 
			<td><?php echo $no ?></td>
			<td><?php echo $rekening->nama_bank ?></td>
			<td><?php echo $rekening->nomor_rekening ?></td>
			<td><?php echo $rekening->nama_pemilik ?></td>
			<td>
				<a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
	<?php $no++; } ?>
	</tbody>	
</table>
