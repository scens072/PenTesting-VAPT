
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>Tata Tertib Penunggu dan Pengunjung RSUD KARAWANG</h2></div>
		</center>
		<div class="row">
			<?php
			foreach ($tata_tertib as $key => $tata_tertib) {
				?>				
				<?php 
				$image=$this->Pelayanan_m->get_listimage($tata_tertib->id);
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
			<div class="menu-jdl"><p><?=$tata_tertib->isi?></p></div>
			<?php
		}?>
	</div>
</section>
