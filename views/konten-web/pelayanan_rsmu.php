<section class="about-area" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="section-title-col text-center">
					<h2>JADWAL PELAYANAN<span> RSUD KARAWANG</span></h2>
					<!-- <P>Jadwal kami fleksibel untuk melayani kesehatan anda</P> -->
					<table class="table table-bordered table-striped animated " style="width: 90%; margin-left: 5%;">
						<thead style="background-color: #33a9ef">
							<tr style="color: white;;">
								<th>No.</th>
								<th>Jenis Pelayanan</th>
								<th>Hari</th>
								<th>Pagi</th>
								<th>Siang</th>
								<th>Sore</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$jenis_pelayanan='';$jns='';$no=0;$n='';
							foreach ($jadwal as $key => $value) {
								if($jenis_pelayanan!=$value->id_jenis_pelayanan){
									$jns=$value->jenis_pelayanan;
									$jenis_pelayanan=$value->id_jenis_pelayanan;
									$no++;
									$n=$no;
								}else{
									$jns='';
									$n='';
								}
								echo '<tr><td>'.$n.'</td><td>'.$jns.'</td><td>'.$value->hari.'</td><td>'.str_replace("  ", " - ", $value->pagi).'</td><td>'.str_replace("  ", " - ", $value->siang).'</td><td>'.str_replace("  ", " - ", $value->sore).'</td></tr>';
							}
							?>	
						</tbody>

					</table>
				</div>
			</div>
		</div>
		<!-- <?php
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
					$image=$this->Pelayanan_m->get_listimage($dt->id);
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
		?> -->
	</div>
</section>
