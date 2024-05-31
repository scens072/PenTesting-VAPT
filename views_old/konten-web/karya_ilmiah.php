<!-- <?php require_once(APPPATH.'/views/header_konten.php') ?> -->

<section class="about-area" id="about">
	<div class="container">

		<?php
		foreach ($dt as $key => $dt) {
			?>
			<div class="row">
				<div class="col-lg-12 col-md-12">

					<div class="section-title-col text-center"><h2><?=strtoupper($dt->header)?></h2>
						<p><?=$dt->keterangan?></p>
					</div>

					<?=$dt->isi?>
				</div>
				<div class="row">
					<?php 
					$image=$this->Karya_ilmiah_m->get_listimage($dt->id);
					foreach ($image as $key => $value) {
						?>
						<div class="col-md-6 col-sm-6">
							<div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
								<div class="image-hover-box">
									<figure>
										<img src="<?=base_url().$value->image?>" alt="">
									</figure>
								</div>
								<div class="service-content">

									<p><?=$value->keterangan?></p>
								</div>
							</div>
						</div>
						<?php
					}?>


				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>