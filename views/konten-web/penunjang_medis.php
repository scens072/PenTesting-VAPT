
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>INFORMASI FASILITAS PENUNJANG MEDIS RSUD KARAWANG</h2></div>
			<p></p>
			<br/>
		</center>
		<div class="row">
			<div class="row">
				<?php
				// foreach ($list_data as $key => $value) {
					?>	
					<!-- <div class="col-lg-12 col-md-12">			
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
								<div class="image-hover-box">
									<figure>
										<img width="100%" class="img-responsive" src="<?=base_url().$value->gambar?>" alt="">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<h3><?=$value->header?></h3>
							<h4><?=$value->keterangan?></h4>
							<p><?=$value->isi?></p>
						</div>
					</div> -->
					<?
				// }
				?>
				<div class="tab-content">
					<?php
					$n=0;
					for ($i=0; $i <$page ; $i++) { 
						$active='';
						if($i==0){
							$active='active';
						}else{
							$active='';
						}?>
						<div class="tab-pane <?=$active?>" id="tab<?=($i+1)?>" role="tabpanel">
							<?php
							for ($a=0; $a < 5 ; $a++) { 

								if($n<sizeof($list_data)){
									?>
									<!-- <div class="col-md-3 col-sm-3 col-xs-6">
										<div class="thumbnail" style="height: 295px;">
											<a href="<?=base_url().$list_data[$n]->gambar?>" title="<?=$list_data[$n]->header?>" time="<?=date('Y-m-d HH:ii:ss')?>" width="253"><img src="<?=base_url().$list_data[$n]->gambar?>" alt="..." class="team-img"></a>
											<div class="caption">
												<h3 style="margin-bottom:0px;"><?=$list_data[$n]->header?></h3>
												<small><?=$list_data[$n]->keterangan?></small>


											</div>

										</div>
									</div> -->
									<div class="col-lg-12 col-md-12">
										<div class="row list_fasilitas">		
											<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
												<div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
													<div class="image-hover-box">
														<figure>
															<img width="100%" class="img-responsive" src="<?=base_url().$list_data[$n]->gambar?>" alt="">
														</figure>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
												<h3><?=$list_data[$n]->header?></h3>
												<h4><?=$list_data[$n]->keterangan?></h4>
												<p><?=substr($list_data[$n]->isi, 0,200)?> ... <?php echo anchor('konten/pm_detail/'.$list_data[$n]->id_penunjang, 'Read More', 'class="link-class"') ?></p>
											</div>
										</div>
									</div>
									<?php
									$n++;
								}
							}
							?>
						</div>
						<?php

					}



					?>

				</div>
			</div>
			<div class="row" align="center">
				<nav aria-label="...">
					<ul class="pagination" role="tablist">
						<li class="previous" onclick="goTo(1);"><a href="#"><span aria-hidden="true">←</span> Previous</a></li>
						<?php
						for ($i=0; $i <$page ; $i++) { 
							if($i==0){
								?>
								<li class="active" id="first">
									<a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
								</li>
								<?php
							}else if(($i+1)==$page){
								?>
								<li id="last">
									<a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
								</li>
								<?php
							}else{
								?>
								<li>
									<a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
								</li>
								<?php
							}
						}
						?>

						<li class="next" onclick="goTo(2);"><a href="#">Next <span aria-hidden="true">→</span></a></li>
					</ul>
				</nav>
			</div>

		</div>
	</section>
