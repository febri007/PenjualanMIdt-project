<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-info">
			<th>NO</th>
			<th width="23%">PELANGGAN</th>
			<th>KODE</th>
			<th width="8%">TANGGAL</th>
			<th>TOTAL YANG HARUS DIBAYAR</th>
			<th>JUMLAH ITEM</th>
			<th>STATUS BAYAR</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($header_transaksi as $header_transaksi) { // ini tuh tabel header_transaksi?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $header_transaksi->nama_pelanggan ?>
				<br><small>
						Telepon 	: <?php echo $header_transaksi->telepon ?>
					<br>Email 		: <?php echo $header_transaksi->email ?>
					<br>Alamat Kirim: <br><?php echo nl2br($header_transaksi->alamat) // nl2br itu new line 2 <br> ?>
				</small>
			</td>
			<td><?php echo $header_transaksi->kode_transaksi ?></td>
			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			<td> Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			<td><?php echo $header_transaksi->total_item ?></td>
			<td><?php echo $header_transaksi->status_bayar ?></td>
			<td>
				<div class="btn-group">
					<table>
						<tr>
							<td>
								<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail </a>
							</td>

							<td>
								<p style="color: #fff">a</p>
							</td>

							<td>
								<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Cetak </a>		
							</td>

							<td>
								<p style="color: #fff">a</p>
							</td>

							<!-- <td>
								<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Update Status </a>
							</td> -->
							
						</tr>
				</div>
				<!-- <div class="clearfix"></div>  -->
				<br>

				<div class="btn-group">
				
						<!-- <tr>
							<td>
								<a href="<?php echo base_url('admin/transaksi/pdf/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Export PDF </a>
							</td>

							<td>
								<p style="color: #fff">a</p>
							</td>

							<td>
								<a href="<?php echo base_url('admin/transaksi/kirim/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Pengiriman</a>		
							</td>

							<td>
								<p style="color: #fff">a</p>
							</td>

							<td>
								<a href="<?php echo base_url('admin/transaksi/word/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-word-o"></i> Export Word </a>
							</td>
						</tr> -->
						
					</table>
				</div>

			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
