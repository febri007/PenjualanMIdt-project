<p>
	<a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<!-- ini kodingan muncul di toko/admin/kategori -->
<?php
// Notifikasi
if ($this->session->flashdata('sukses')) {
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
			<th>NAMA</th>
			<th>SLUG</th>
			<th>URUTAN</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($kategori as $kategori) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $kategori->nama_kategori ?></td>
				<td><?php echo $kategori->slug_kategori ?></td>
				<td><?php echo $kategori->urutan ?></td>
				<td>
					<a href="<?php echo base_url('admin/kategori/edit/' . $kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

					<a href="<?php echo base_url('admin/kategori/delete/' . $kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Hapus </a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>