<header class="main-herader">


<!--   <div id="myNav" class="overlay">
    <div class="overlay-content">
      <?php echo anchor('welcome', 'BERANDA', 'class=""') ?>
      <?php echo anchor('konten/tentang_mata', 'TENTANG MATA KITA', 'class=""') ?>
      <?php echo anchor('konten/pelayanan', 'PELAYANAN PASIEN', 'class=""') ?>
      <?php echo anchor('konten/tentang_kami', 'TENTANG KAMI', 'class=""') ?>
    </div>
</div> -->

<div class="header-navbar fixed-header">
	<center>
		<div class="containernew">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" style="padding-right: 0px;">
						<div class="col-md-3">
							<div class="navbar-header" style="margin-right: -1%;">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?=site_url()?>/welcome" onclick="openNav()"><div class="row" id="logo-nav"><img style="height: auto; width: auto;" src="<?=base_url()?>images/logo.png" alt=""> </div></a>
								<div class="row" style=" padding-top: 15px; padding-left: 15px;">
									Rumah Sakit<br>PKU Muhammadiyah Gombong
								</div>
							</div>
						</div>
						<div class="col-md-7" style="padding: 0px;">
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="zoomIn">
								<div class="row">
									<ul class="nav navbar-nav">
										<li class="nav-item">
											<a class="nav-link" href="<?=site_url()?>/welcome">BERANDA</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												PELAYANAN PASIEN
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
												<a class="dropdown-item" href="<?=site_url()?>/konten/pelayanan/cari_dokter">Dokter</a>
												<a class="dropdown-item" href="#">Pendaftaran Online</a><!-- http://203.123.57.122/pendaftaran_web/index.php/konten/daftar_online -->
												<a class="dropdown-item" href="<?=site_url()?>/konten/penunjang_medis">Penunjang Medis</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/pelayanan/pelayanan_rsmu">Jadwal Pelayanan</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/kelas_rwi">Rawat Inap</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/fasilitas_rs">Fasilitas Rumah Sakit</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/pelayanan/menuju_rsmu">Menuju RS PKU</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/pelayanan/kewajiban_pasien">Hak dan Kewajiban Pasien</a>
												<a class="dropdown-item" href="<?=site_url()?>/konten/pelayanan/peraturan">Tata Tertib Penunggu dan Pengunjung RS</a>
											</div>
										</li>
										<!-- <li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												TENTANG MATA KITA
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
												<?php
												// $koneksi = mysqli_connect("192.168.0.201","root","chayank","web_undaan_new");
												$koneksi = mysqli_connect("localhost","root","","website");
												$menu= mysqli_query($koneksi,"SELECT * FROM tentang_mata_kita ORDER BY id_layanan ASC");
												while($dataMenu = mysqli_fetch_array($menu)){
													?>
													<a class="dropdown-item" href="<?=site_url()?>/konten/tentang_mata_kita/<?php echo $dataMenu['id_layanan']?>"><?php echo $dataMenu['header']?></a>
													<?php
												}
												?>
											</div>
										</li> -->
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												TENTANG KAMI
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
												<?php
												// $koneksi = mysqli_connect("192.168.0.201","root","chayank","web_undaan_new");
												$koneksi = mysqli_connect("localhost","root","","website");
												$menu= mysqli_query($koneksi,"SELECT * FROM tentang_kami ORDER BY id ASC");
												while($dataMenu = mysqli_fetch_array($menu)){
													?>
													<a class="dropdown-item" href="<?=site_url()?>/konten/tentang_kami/<?php echo $dataMenu['id']?>"><?php echo $dataMenu['header']?></a>
													<?php
												}
												?>
												<a class="dropdown-item" href="<?=site_url()?>/konten/publikasi">Publikasi</a>            
												<a class="dropdown-item" href="<?=site_url()?>/konten/mitra">Mitra Kami</a>
											</div>
										</li>
										<li>
											<a class="" href="<?=site_url()?>/konten/faq_rs">FAQ</a>
										</li>
										<li class="">
											<a id='blink_' style="color: red;font-weight: 600;" class="" href="<?=site_url()?>/konten/berita_terkini">Berita Terkini</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div style="float: right" class="hidden-sm hidden-xs col-md-2">
							<div style="padding-top: 18px;" align="right"><!-- <img src="<?=base_url()?>images/sbyadvcarensmile.jpg" alt="" width="100%"> &nbsp;&nbsp;  -->
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</center>
</div>

</header>

<script>
	function blink_(){
		var el=document.getElementById("blink_").style.opacity;
		if(el==1){
			document.getElementById("blink_").style.opacity=0;
		}else{
			document.getElementById("blink_").style.opacity=1;
		}
		setTimeout('blink_()', 500);
	}
	blink_();


</script>

<!-- <script type="text/javascript">
 function submenu(){
  var teks = $("a[title]").attr("href");
  alert(teks);
}
</script> -->