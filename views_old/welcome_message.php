<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Rumah Sakit PKU Muhammadiyah Gombong</title>
 <link href="images/favicon.png" rel="shortcut icon" type="image/png">
 <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
 <link href="<?=base_url()?>css/style.css" rel="stylesheet">

</head>
<body>
 <div id="preloader"></div>
<header class="main-herader">


  <div id="myNav" class="overlay">

  <div class="overlay-content">
    <a href="index.php">BERANDA</a>
    <a href="edukasi_mata.php">TENTANG MATA KITA</a>
    <a href="layanan_rsmu.php">PELAYANAN PASIEN</a>
    <a href="#">PELAYANAN DOKTOR</a>
    <a href="sambutan_direktur.php">TENTANG KAMI</a>
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
        <a class="navbar-brand" href="#" onclick="openNav()"><div class="row" id="logo-nav"><img src="<?=base_url()?>images/logo.jpg" alt=""> <i class="fa fa-angle-down"></i></div></a>
       </div>
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="zoomIn">
        
        <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><i class="" aria-hidden="true"></i>Melayani Dengan Ramah Santun & Islami</a></li>
       <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
       <li class=""><?php echo anchor('login', 'MASUK', 'class=""') ?></li>
     


        </ul>
       </div>
      </nav>
     </div>
    </div>
   </div>
  </div>
 </header>


  <section id="konten">
    <section class="section-padding">
     <div class="container">
      <?php $this->load->view($konten); ?>
     </div>
   </section>
      
  </section>





 <!-- footer start -->
<?php require_once('footer.html') ?>



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

 <!-- Custom Js -->
 <script src="<?=base_url()?>js/main.js"></script>

 </body>
<script>
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