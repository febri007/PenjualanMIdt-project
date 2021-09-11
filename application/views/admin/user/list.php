<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<!-- ini kodingan muncul di toko/admin/user -->
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
			<th>EMAIL</th>
			<th>USERNAME</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($user as $user) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $user->nama ?></td>
				<td><?php echo $user->email ?></td>
				<td><?php echo $user->username ?></td>
				<td>
					<a href="<?php echo base_url('admin/user/edit/' . $user->id_user) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit </a>

					<a href="<?php echo base_url('admin/user/delete/' . $user->id_user) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Hapus </a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>