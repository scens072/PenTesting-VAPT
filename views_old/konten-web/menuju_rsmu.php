
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>MENUJU RUMAH SAKIT PKU MUHAMMADIYAH GOMBONG</h2></div>
		</center>
		<div class="col-lg-12 col-md-12">
			<div class="about-col">
				<div class="image-hover-box">
					<iframe src="https://maps.google.com/maps?q=rs%20pku%20gombong&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
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
