
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>UPDATE INFO PUBLIKASI DIVISI RSUD KARAWANG</h2></div>
		</center>
		<div class="row">
			<div class="row">
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
							for ($a=0; $a <12 ; $a++) { 

								if($n<sizeof($list_data)){
									?>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="thumbnail" style="height: 550px;">
											<a href="<?=base_url().$list_data[$n]->image?>" title="<?=$list_data[$n]->header?>" time="<?=$list_data[$n]->tanggal?>" width="253"><img src="<?=base_url().$list_data[$n]->image?>" alt="..." class="team-img"></a>
											<div class="caption">
												<h4 style="margin-bottom:0px;"><?php echo anchor('konten/publikasi_detail/'.$list_data[$n]->id, $list_data[$n]->header, 'class="link-class"') ?></h4>
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
