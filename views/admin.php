<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Rumah Sakit Umum Daerah Karawang</title>
 <link href="images/favicon.png" rel="shortcut icon" type="image/png">
 <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
 <link href="<?=base_url()?>css/style.css" rel="stylesheet">

</head>
<body>
 <div id="preloader"></div>
 <header class="main-herader">


  <div id="myNav" class="overlay">

    <div class="overlay-content">
      <?php echo anchor('welcome', 'BERANDA', 'class=""') ?>
      <!-- <?php echo anchor('konten/tentang_mata', 'TENTANG MATA KITA', 'class=""') ?> -->
      <?php echo anchor('konten/pelayanan', 'PELAYANAN PASIEN', 'class=""') ?>

      <!-- <a href="#">PELAYANAN DOKTOR</a> -->
      <?php echo anchor('konten/tentang_kami', 'TENTANG KAMI', 'class=""') ?>

    </div>
  </div>

  <div class="header-navbar fixed-header">
   <div class="containernew">
    <div class="row">
     <div class="col-md-12">
      <nav class="navbar navbar-default">
       <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="#" onclick="openNav()"><div class="row" id="logo-nav"><img style="height: auto; width: auto;" src="<?=base_url()?>images/logo.png" alt=""> <i class="fa fa-angle-down"></i></div></a>
     </div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="zoomIn">
      <ul class="nav navbar-nav navbar-left">
        <li class="<?=$judul=='ulasan'?'active':''?>"><?php echo anchor('ulasan', 'ULASAN', 'class="link-class" style="color: white;"') ?></li>

        <li class="dropdown">
          <a href="#" style="color: white;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ubah Background <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
           <li class="<?=$judul=='edit_background'?'active':''?>"><?php echo anchor('admin/edit_background', 'Ubah Background', 'class=""') ?></li>
           <li class="<?=$judul=='edit_slider'?'active':''?>"><?php echo anchor('admin/edit_slider', 'Ubah Slider', 'class=""') ?></li>
         </ul>
       </li>


       <li class="dropdown">
        <a href="#" style="color: white;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        <ul class="dropdown-menu">
         <li class="<?=$judul=='setting'?'active':''?>"><?php echo anchor('admin/setting_email', 'Setting Email', 'class=""') ?></li>
         <li class="<?=$judul=='spesialis'?'active':''?>"><?php echo anchor('spesialis', 'Spesialis', 'class=""') ?></li>
         <li class="<?=$judul=='dokter'?'active':''?>"><?php echo anchor('dokter', 'Dokter', 'class=""') ?></li>
         <li class="<?=$judul=='jenis_pelayanan'?'active':''?>"><?php echo anchor('jenis_pelayanan', 'Jenis Pelayanan', 'class=""') ?></li>
         <li class="<?=$judul=='jadwal_pelayanan'?'active':''?>"><?php echo anchor('jadwal_pelayanan', 'Jadwal Pelayanan', 'class=""') ?></li>
         <li class="<?=$judul=='tentang_mata'?'active':''?>"><?php echo anchor('tentang_mata', 'TENTANG KESEHATAN', 'class=""') ?></li>
         <li class="<?=$judul=='publikasi'?'active':''?>"><?php echo anchor('publikasi', 'PUBLIKASI', 'class=""') ?></li>
         <li class="<?=$judul=='berita'?'active':''?>"><?php echo anchor('berita', 'BERITA TERKINI', 'class=""') ?></li>
         <li class="<?=$judul=='mitra'?'active':''?>"><?php echo anchor('mitra', 'MITRA RUMAH SAKIT', 'class=""') ?></li>
         <li class="<?=$judul=='kelas_rwi'?'active':''?>"><?php echo anchor('kelas_rwi', 'KELAS KAMAR RWI', 'class=""') ?></li>
         <li class="<?=$judul=='pm'?'active':''?>"><?php echo anchor('pm', 'PENUNJANG MEDIS', 'class=""') ?></li>
         <li class="<?=$judul=='fasilitas_rs'?'active':''?>"><?php echo anchor('fasilitas_rs', 'FASILITAS RUMAH SAKIT', 'class=""') ?></li>
         <li class="<?=$judul=='pameran_virtual'?'active':''?>"><?php echo anchor('pameran_virtual', 'PAMERAN VIRTUAL', 'class=""') ?></li>
           <li class="<?=$judul=='footer'?'active':''?>"><?php echo anchor('footer', 'FOOTER', 'class=""') ?></li>
       </ul>
     </li>
     <li class="<?=$judul=='tentang_kami'?'active':''?>"><?php echo anchor('tentang_kami', 'TENTANG KAMI', 'class="" style="color: white;"') ?></li>
     <li class="<?=$judul=='pelayanan'?'active':''?>"><?php echo anchor('pelayanan', 'PELAYANAN', 'class="" style="color: white;"') ?></li>
     <li class="<?=$judul=='faq_rs'?'active':''?>"><?php echo anchor('faq_rs', 'FAQ RSUD', 'class="" style="color: white;"') ?></li>
     <!-- <li class="<?=$judul=='tentang_mata_kita'?'active':''?>"><?php echo anchor('tentang_mata_kita', 'TENTANG MATA KITA', 'class="" style="color: white;"') ?></li> -->

        <li class="dropdown">
          <a href="#" style="color: white;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Menu<i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
           <li class="<?=$judul=='edit_menu_utama'?'active':''?>"><?php echo anchor('menu_utama/edit_menu', 'Menu Utama', 'class=""') ?></li>
           <li class="<?=$judul=='edit_menu'?'active':''?>"><?php echo anchor('menu/edit_menu', 'Menu', 'class=""') ?></li>
           <li class="<?=$judul=='edit_submenu'?'active':''?>"><?php echo anchor('submenu', 'Sub Menu', 'class=""') ?></li>
         </ul>
       </li>

     <li class=""><?php echo anchor('login/keluar', 'KELUAR', 'class="link-class" style="color: white;"') ?></li>
   </ul>
 </div>
</nav>
</div>
</div>
</div>
</div>
</header>

<!-- jQuery -->
<script src="<?=base_url()?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>js/bootstrap.min.js"></script>

<!-- All Included JavaScript -->
<script src="<?=base_url()?>js/bootstrap-dropdownhover.min.js"></script>
<script src="<?=base_url()?>js/jquery-scrolltofixed-min.js"></script>
<script src="<?=base_url()?>js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>js/owl.carousel.min.js"></script>
<script src="<?=base_url()?>js/jarallax.js"></script>
<script src="<?=base_url()?>js/jquery.countup.min.js"></script>
<script src="<?=base_url()?>js/jquery.waypoints.min.js"></script>
<script src="<?=base_url()?>js/dyscrollup.js"></script>
<script src="<?=base_url()?>js/VideoPlayerPopUp.js"></script>
<script src="<?=base_url()?>js/jquery.mb.YTPlayer.min.js"></script>
<script src="<?=base_url()?>js/animated-text.js"></script>
<script src="<?=base_url()?>js/wow.min.js"></script>
<script src="<?=base_url()?>js/list.min.js"></script>
<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>

<!-- Custom Js -->
<script src="<?=base_url()?>js/main.js"></script>
<section id="konten">
  <section class="section-padding">
   <div class="container">
    <?php $this->load->view($konten); ?>
  </div>
</section>

</section>





<!-- footer start -->
<?php require_once('footer.php') ?>





</body>
<script>
 var base_url = '<?=base_url()?>';

 function openNav() {

  $("#imgarrow").toggleClass('flip');
  var element = document.getElementById('myNav'),
  style = window.getComputedStyle(element),
  height = style.getPropertyValue('height');
  if(height!='0px'){
    document.getElementById("myNav").style.height = "0%";
    $("#logo-nav i").css({'transform' : 'rotateZ(0deg)','transition': 'all 0.4s ease'});
  }else{
    document.getElementById("myNav").style.height = "100%";
    $("#logo-nav i").css({'transform' : 'rotateZ(-180deg)','transition': 'all 0.4s ease'});
  }
  
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>


<script type="text/javascript">

  $("#cari_dokter").on('click',function(){
   var searchString = $("#nama_dokter").val();
   var rows = $('#tbljadwaldokter>tbody>tr');
   if (searchString != '' && searchString.length > 0){
    rows.filter('tr').hide();
    rows.filter('tr:has(td:contains("'+searchString+'"))').show();
    rows.filter('tr:has(td:contains("'+searchString+'"))').next('tr').show();
  }else{
    rows.filter('tr').show();
  }

})
  $("#cmbspesialis").on('change',function(){
   var searchString = $("#cmbspesialis").val();
   var rows = $('#tbljadwaldokter>tbody>tr');
   if (searchString != '' && searchString.length > 0){
    rows.filter('tr').hide();
    rows.filter('tr:has(td:contains("'+searchString+'"))').show();
    rows.filter('tr:has(td:contains("'+searchString+'"))').next('tr').show();
  }else{
    rows.filter('tr').show();
  }

})

  $("#clear_dokter").on('click',function(){
   $("#nama_dokter").val('');
   $("#cari_dokter").trigger('click');
 })
  var $video = $("#click");
//jquery-wrapped video element
mousedown = false;
$video.click(function(){
  if (this.paused) {
    this.play();
    return false;
  }else{
    this.pause();
    return false;
  }
  return true;
});

</script>


</html>
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_fullscreen_video -->
<!-- http://jsbin.com/soyate/1/edit?html,css,js,output -->
