<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">

				<h1><?php echo $title ?></h1>
				<hr>
				<div class="clearfix"></div>
				<br><br>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1">GAMBAR</th>
						<th class="column-2">PRODUK</th>
						<th class="column-3">HARGA</th>
						<th class="column-4">JUMLAH</th>
						<th class="column-5" width="15%">SUB TOTAL</th>
						<!-- <th class="column-6" width="20%">ACTION</th> -->
					</tr>
					<?php
					// Lopping Data Keranjang Belanja
					$subberat = 0;
					foreach ($keranjang as $keranjang) {
						// Ambil data produk
						$id_produk = $keranjang['id'];
						$produk    = $this->produk_model->detail($id_produk);
						$subberat = $subberat + ($keranjang['berat'] * $keranjang['qty']);

						// Form Update Keranjang
						echo form_open(base_url('belanja/update_cart/' . $keranjang['rowid']));
					?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" alt="<?php echo $keranjang['name'] // name itu diambil dari shoping cartnya 
																															?>">
								</div>
							</td>
							<td class="column-2"><?php echo $keranjang['name'] // Buat nama produknya biar keliatan 
													?></td>
							<td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" disabled>
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" name="qty" value="<?php echo $keranjang['qty'] // nampilin jumlah belinya
																											?>" readonly>

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" disabled>
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">Rp.
								<?php
								$sub_total = $keranjang['price'] * $keranjang['qty'];
								echo number_format($sub_total, '0', ',', '.');
								?>
							</td>

						</tr>
					<?php
						// Echo Form Close
						echo form_close();
						// End Looping Keranjang Belanja
					}

					?>
					<tr class="table-row bg-warning text-strong" style="font-weight: bold; color: white !important;">
						<td colspan="4" class="column-1">Total Belanja</td>
						<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(), '0', ',', '.') ?></td>
					</tr>

				</table>
				<br>
				<?php
				echo form_open(base_url('belanja/checkout'));
				$kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 8)); // strtoupper buat gedein hrufnya
				?>
				<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
				<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
				<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d') ?>">
				<table class="table">
					<thead>
						<tr>
							<th width="25%"> Kode Transaksi </th>
							<th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
						</tr>
						<tr>
							<th width="25%"> Nama Penerima </th>
							<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required> </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> Email Penerima </td>
							<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required> </td>
						</tr>
						<tr>
							<td> Telepon Penerima </td>
							<td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required> </td>
						</tr>
						<tr>
							<td> Alamat Pengiriman </td>
							<td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
						</tr>
						<tr>
							<td></td>

						</tr>
					</tbody>
				</table>
				<div class="container">
					<div class="card mt-3">
						<div class="card-header">
							Ongkir
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Province</label>
								<select class="form-control" id="provinsi">
									<?php foreach ($province as $pro) : ?>
										<option value="<?= $pro['province_id'] ?>"><?= $pro['province'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Kabupaten</label>
								<select class="form-control" id="kabupaten"></select>
							</div>
							<div class="form-group">
								<label>Kurir</label>
								<select class="form-control" id="kurir">
									<option value="tiki">JNE</option>
									<option value="pos">TIKI</option>
								</select>
							</div>
							<div class="form-group">
								<label>Berat (KG)</label>
								<input type="number" class="form-control" id="berat" value="<?= $subberat ?>" readonly>
							</div>
							<div class="form-group">
								<label>Ongkir</label>
								<select class="form-control" name="ongkir" id="ongkir"></select>
							</div>


						</div>
						<div class="card-footer">
							Total belanja = <?php echo number_format($this->cart->total(), '0', ',', '.') ?> + Ongkir Rp.<span id="ongkos"></span> = Rp. <span id="total"></span>
						</div>
					</div>
				</div>
				<br>
				<table class="table">

					<body>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-danger btn-lg" type="reset">
									<i class="fa fa-times"></i> Reset
								</button>
								<button class="btn btn-primary btn-lg" type="submit">
									<i class="fa fa-save"></i> Check Out Sekarang
								</button>
							</td>
						</tr>
					</body>
				</table>

				<?php echo form_close(); ?>
			</div>
		</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="flex-w flex-m w-full-sm">

			</div>
		</div>
		<div class="size10 trans-0-4 m-t-10 m-b-10">
			<!-- Tombol Reset -->

		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function() {
			// Ongkir
			function cekongkir() {
				var kab = $('#kabupaten').val();
				var berat = $('#berat').val();
				var kurir = $('#kurir').val();


				$.ajax({
					type: 'POST',
					url: "<?= base_url('belanja/ongkir') ?>",
					data: {
						'kab_id': kab,
						'weight': berat,
						'kurir': kurir
					},
					success: function(data) {
						$("#ongkir").html(data);
						getOngkir();
					}
				});
			};

			$("#provinsi").change(function() {
				var prov = $('#provinsi').val();

				$.ajax({
					type: 'GET',
					url: "<?= base_url('belanja/kabupaten') ?>",
					data: 'prov_id=' + prov,
					success: function(data) {
						$("#kabupaten").html(data);
					}
				});
			});

			$("#kabupaten").change(function() {
				cekongkir();
			});

			$("#kurir").change(function() {
				cekongkir();
			});

			$("#ongkir").change(function() {
				getOngkir();
			});

			function getOngkir() {
				var ongkir = $('#ongkir').val();
				$('#ongkos').text(ongkir);
				var total = <?php echo ($this->cart->total()) ?> + parseInt(ongkir);
				$('#total').text(total);
			}

		});
	</script>

	</div>
</section>