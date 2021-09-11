<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="col-lg-3 table-bordered p-b-8">
			<div class="search_box">
				<form action="<?php echo base_url('search')?>" method="post">
					<input type="text" name="search" placeholder="search" />							
				</form>
			</div> 
		</div>

		&nbsp;

		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">



				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Kategori Produk
					</h4>

					<ul class="p-b-54">
						<?php foreach ($listing_kategori as $listing_kategori) { ?>
							<li class="p-t-4">
								<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
									<?php echo $listing_kategori->nama_kategori; ?>
								</a>
							</li>
						<?php } ?>

					</ul>



				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<h2 class="title text-center">Product Items</h2>
				<br>
				<!-- Product -->
				<div class="row">
					<?php foreach ($search_data as $value) {?>
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 text-center">
							<?php if($value->stok>=1){?>
								<?php
								echo form_open(base_url('belanja/add'));
								echo form_hidden('id', $value->id_produk);
								echo form_hidden('qty', 1);
								echo form_hidden('price', $value->harga);
								echo form_hidden('name', $value->nama_produk);
								?>
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="<?php echo base_url('assets/upload/image/thumbs/'.$value->gambar) ?>" alt="<?php echo $value->nama_produk ?>">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="fa fa-eye" aria-hidden="true"></i>
												<i class="fa fa-eye dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="<?php echo base_url('produk/detail/'.$value->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
											<?php echo $value->nama_produk ?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											Rp. <?php echo number_format($value->harga,'0',',','.') ?>
										</span>
									</div>

									<?php 
					// Clossing Form
									echo form_close();
									?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if($search_data==NUll){?>
						&nbsp;
						<div class="container">
							<h5 class="text-center">
								Produk Tidak Ada!
							</h5>
						<?php }else{?>

						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>