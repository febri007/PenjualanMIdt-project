<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class="bgwhite">

				<h1><?php echo $title ?></h1>
				<hr>
				<div class="clearfix"></div>
				<br><br>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>

				<p class="alert alert-success">
					Terimakasih, Barang yang sudah Anda beli akan segera kami proses. <br>
					Silahkan lanjut ke proses pembayaran
				</p>

			</div>
		</div>

	</div>

	<div class="size10 trans-0-4 m-t-10 m-b-10">
		<!-- Tombol Reset -->


	</div>
	</div>


	</div>
</section>