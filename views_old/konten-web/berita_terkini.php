
<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>UPDATE INFO BERITA RS PKU</h2></div>
		</center>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<?php
			foreach ($list_data as $key => $value) {
				?>
				<h4 style="font-family: serif;font-weight: 800;font-size: 21px;"><?php echo anchor('konten/berita_detail/'.$value->id,$value->header, 'class=""') ?></h4>
				<p><?=$value->tanggal_berita?>, <?=$value->keterangan?></p>
				<br/>
			<?php } ?>
		</div>		
	</section>
