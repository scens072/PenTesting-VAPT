
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>RELASI SUPPORT MITRA RS PKU</h2></div>
		</center>
		<div class="">
			<div class="" style="margin-right: 0px;">
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
							for ($a=0; $a < 32 ; $a++) { 

								if($n<sizeof($list_data)){
									?>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="thumbnail" style="height: 295px;">
											<a href="<?=base_url().$list_data[$n]->gambar?>" title="<?=$list_data[$n]->header?>" time="<?=date('Y-m-d HH:ii:ss')?>" width="253"><img src="<?=base_url().$list_data[$n]->gambar?>" alt="..." class="team-img"></a>
											<div class="caption">
												<h3 style="margin-bottom:0px;"><?=$list_data[$n]->header?></h3>
												<!-- <h3 style="margin-bottom:0px;"><?php echo anchor('konten/berita_detail/'.$list_data[$n]->id, $list_data[$n]->header, 'class="link-class"') ?></h3> -->
												<small><?=$list_data[$n]->keterangan?></small>
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
		</div>

	</section>
	<section style="margin-bottom: 15px;">
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
	</section>
