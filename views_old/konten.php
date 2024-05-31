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
<?php require_once('header.php') ?>



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
 <section id="konten">
    <section class="section-padding">
     <div class="container">
      <?php $this->load->view($konten); ?>
     </div>
   </section>
      
  </section>
<?php require_once('footer.php') ?>
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

 </html>
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_fullscreen_video -->
<!-- http://jsbin.com/soyate/1/edit?html,css,js,output -->