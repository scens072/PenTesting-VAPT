
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>HAK DAN KEWAJIBAN PASIEN</h2></div>
		</center>
		<div class="row">
			<?php
			foreach ($kewajiban as $key => $kewajiban) {
				?>				
				<?php 
				$image=$this->Pelayanan_m->get_listimage($kewajiban->id);
				foreach ($image as $key => $value) {
					?>
					<div class="col-md-3 col-sm-3">
						<div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
							<div class="image-hover-box">
								<figure>
									<img width="100%" src="<?=base_url().$value->image?>" alt="">
								</figure>
							</div>
							<div class="service-content">
								<p><?=$value->keterangan?></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="menu-jdl"><p><?=$kewajiban->isi?></p></div>
			<?php
		}?>
	</div>
</section>
