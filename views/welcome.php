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
 <link href="<?=base_url()?>css/responsive.css" rel="stylesheet" />
 <link href="<?=base_url()?>css/style.css" rel="stylesheet">


</head>

<style type="text/css">
.modal_dialog {
  position: fixed;
  top: 80px;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1076;
  display: none;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  outline: 0;
}

.video-container {
  position: relative;
  padding-bottom: 56.25%;
  padding-top: 30px; height: 0; overflow: hidden;
}
.video-container iframe,
.video-container object,
.video-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.modal-body {
  padding: 15px;
  height: 100%;

}
.modal-content{
  background: linear-gradient(42deg, #8a1b53 0%, #d51870 100%);
  background-size: cover;
}

</style>
<?php
if ($count_pv->count > '0') {
  ?>
  <body onLoad="bukaInfo()">
    <?php
  }else{
    ?>
    <body>
      <?php
    }
    ?>

    <div id="preloader"></div>
    <?php require_once('header.php') ?>
    <?php if($judul=='masuk'){
      ?>
      <section id="konten">
        <section class="section-padding">
         <div class="container">
          <?php $this->load->view($konten); ?>
        </div>
      </section>

    </section>
    <?php

  }else{
    ?>


    <section class="main-slider-area">
      <div class="main-container">
        <?php
        $ext = pathinfo(base_url().$bvideo->value, PATHINFO_EXTENSION);
        if($ext!='mp4'){?>
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php
            foreach ($slider as $key => $value) {

              ?>
              <li data-target="#carousel-example-generic" data-slide-to="0" class="<?=$key==0?'active':''?>"></li>
              <?php
            }
            ?>

          </ol>


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php
            foreach ($slider as $key => $value) {

              ?>
              <div class="item <?=$key==0?'active':''?>">
                <img src="<?=base_url().$value->image?>" alt="..." style="
                right: 0;
                bottom: 0;
                min-width: 100%; 
                min-height: 100%;" >

              </div>
              <?php
            }
            ?>


          </div>

          <!-- Controls -->

          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
           <span class="icon-prev" style="font-weight: bold;font-size:50px;"></span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="icon-next" style="font-weight: bold;font-size:50px;"></span>

        </a>
      </div>
    <?php }else {
      ?>
      <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <div class="carousel-inner" role="listbox">
         <div class="item active slide-1 text-left">

          <video autoplay muted loop  preload="auto" id="click" style="position: fixed; 
          right: 0;
          bottom: 0;
          min-width: 100%; 
          min-height: 100%;">
          <source src="<?=base_url().$bvideo->value?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
          </video>


        </div>

      </div>

    </div>
    <?php

  }?>

</div>
</section>

<!-- Notice Start -->
<section class="notice-area">
  <div class="container">
   <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
     <div class="notice-col">
      <h2>Info</h2>
    </div>
  </div>
  <div class="col-md-9 col-sm-9 col-xs-9">
   <div class="notice-col">
    <marquee>Selamat datang di website Rumah Sakit Umum Daerah Karawang. Melayani Dengan Ramah Santun & Islami</marquee>
  </div>
</div>
</div>
</div>
</section>

<section class="edukasi-area">
  <div class="container">
   <div class="row">
    <div class="col-lg-7 col-md-7">
      <h2><?=$tentang_mata->header?></h2>
      <p><?=$tentang_mata->keterangan?></p>
      <br/>

      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMalasngoding" aria-expanded="false" aria-controls="collapseMalasngoding">
        Klik Info ...
      </button>
      <!-- <a href="javascript:bukaInfo()">info lanjut</a>   -->

      <br/>

      <div class="collapse" id="collapseMalasngoding">
        <div class="card card-body">
          <p><?=$tentang_mata->isi?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-md-5">
      <img src="<?=base_url().$btentang_mata->value?>">
    </div>
  </div>
</div>
</section>


<!-- Appointment Start -->
<!-- <div id="daftar_online"></div> -->
<!--  <section class="appointment-area" id="daftar_online" style="background: url(<?=base_url().$bbuat_janji->value?>);">
  <div class="container">
   <div class="row">
    <div class="col-lg-6 col-md-12">
     <div class="appointment-col">
      <h2>Buat Janji</h2>
      <form>
       <div class="row">
        <div class="col-md-6">
         <div class="appointment-col">
          <input type="text" class="form-control" placeholder="Nama Lengkap">
         </div>
        </div>
        <div class="col-md-6">
         <div class="appointment-col">
          <input type="text" class="form-control" placeholder="No Telp">
         </div>
        </div>
        <div class="col-md-6">
         <div class="appointment-col">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
         </div>
        </div>
        <div class="col-md-6">
         <div class="appointment-col">
          <select class="form-control">
           <option>Layanan</option>
           <option>Poli</option>
           <option>Apotek</option>
           <option>Laboratorium</option>
           <option>Tindakan</option>
          </select>
         </div>
        </div>
        <div class="col-md-6">
         <div class="appointment-col">
          <select class="form-control">
           <option>Sex</option>
           <option>Male</option>
           <option>Female </option>
          </select>
         </div>
        </div>
        <div class="col-md-6">
         <div class="appointment-col">
          <div class="input-group date" >
           <input type="text"  id="datepicker" class="form-control">
           <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
           </div>
          </div>
         </div>
        </div>
        <div class="col-md-12">
         <div class="appointment-col center1199">
          <textarea class="form-control" rows="5" placeholder="Message"></textarea>
          <button class="btn btn-default simple-btn" type="submit">Kirim</button>
         </div>
        </div>
       </div>
      </form>
     </div>
    </div>
    <div class="col-lg-6 col-md-12">
     <div class="appointment-col appointment-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
      <img src="<?=base_url().$bbuat_janji_icon->value?>" alt="">
     </div>
    </div>
   </div>
  </div>
</section> -->


<!-- <?php
if(sizeof($menuju_rsmu)>0){
  ?> -->
  <section class="about-area" id="about">
    <div class="container">
     <div class="row">
      <div class="col-md-6 col-md-offset-3">
       <div class="section-title-col text-center">
        <h2><?=$menuju_rsmu->header?></h2>
        <p><?=$menuju_rsmu->keterangan?></p>

      </div>
    </div>
    <div class="col-lg-12 col-md-12">
     <div class="about-col">
      <div class="image-hover-box">
       <iframe src="https://maps.google.com/maps?q=rsud karawang&t=&z=10&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
<!--
       <div class="mapouter"><div class="gmap_canvas"><iframe width="770" height="510" id="gmap_canvas" src="https://maps.google.com/maps?q=rsud karawang&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:510px;width:770px;}</style><a href="https://embedgooglemap.2yu.co">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:510px;width:770px;}</style></div></div>
-->
     </div>
   </div>
 </div>
 <div class="col-lg-12 col-md-12">
   <p><?=$menuju_rsmu->isi?></p>
 </div>
</div>

</div>
</section>
<!--   <?php
}
?> -->

<section class="doctor-area">
  <div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
     <div class="section-title-col text-center">
      <h2>Publikasi <span>Terkini</span></h2>
      <p>Artikel Publikasi Divisi RSUD Karawang</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
   <div class="doctor-col doctor-carousel">
    <?php
    foreach ($publikasi as $key => $value) {
     ?>
     <div class="item">
       <div class="thumbnail" style="height: 100%;">
        <div class="pic">
          <a href="<?=base_url()?>index.php/konten/publikasi_detail/<?=$value->id ?>" title="<?=$value->header?>" width="253"><img src="<?=base_url().$value->image?>" alt="..." class="team-img"></a>
          
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</div>
</div>
</div>
</div>
</section>

<section class="doctor-area">
  <div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
     <div class="section-title-col text-center">
      <h2>Berita <span>Terkini</span></h2>
      <p>Update Informasi Berita RSUD Karawang</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
   <div class="doctor-col doctor-carousel">
    <?php
    foreach ($berita as $key => $value) {
     ?>
     <div class="item">
       <div class="thumbnail">
        <div class="pic">
          <a href="<?=base_url().$value->image?>" title="<?=$value->header?>" width="253"><img src="<?=base_url().$value->image?>" alt="..." class="team-img"></a>
          <div class="caption">
            <h4 style="text-align: left;"><?php echo anchor('konten/berita_detail/'.$value->id,$value->header, 'class=""') ?></h4>
            <small ><?=$value->keterangan?></small>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</div>
</div>
</div>
</div>
</section>

<section class="edukasi-area" style="margin-bottom: 5%;">
  <div class="">
   <div class="">
    <div class="">
     <div class="section-title-col text-center">
      <h2>Pelayanan Kami<span> Untuk Anda</span></h2>
    </div>    
  </div>
  <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;">
    <div class="col-md-6 col-sm-12" style="padding-right: 0px;padding-left: 0px;">
      <img src="<?=base_url().$bfind_doctor->value?>" class="img-responsive" style="width: 100%">
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12" style="padding-right: 0px;padding-left: 0px;">
     <a style="color: white;" target="_blank" href="<?=site_url()?>/konten/ulasan">
      <img src="<?=base_url().$bkirim_pertanyaan->value?>" class="img-responsive" style="width: 50%;margin-right:-1%;display: inline-grid;">
    </a>
    <a style="color: white;" target="_blank" href="<?=site_url()?>/konten/pelayanan/cari_dokter">
      <img src="<?=base_url().$bcari_dokter->value?>" class="img-responsive" style="width: 50%;display: inline-grid;">
    </a>
    <a style="color: white;" href="<?=site_url()?>/konten/pendaftaran"><span class="info-box-text"><!--  target="_blank" http://203.123.57.122/pendaftaran_web/index.php/konten/daftar_online -->
     <img src="<?=base_url().$bdaftar_online->value?>" class="img-responsive" style="width: 50%;margin-right:-1%;display: inline-grid;">
   </a>
   <a style="color: white;" target="_blank" rel="noopener noreferrer" href="https://wa.me/">
     <img src="<?=base_url().$bhubungi_kami->value?>" class="img-responsive" style="width: 50%;display: inline-grid;">
   </a>
 </div>


</div>
</div>
</div>
</section>

<div class="modal_dialog fade" id="infoku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;font-weight: 500"><strong>Selamat Datang, di Rumah Sakit Umum Daerah Karawang</strong></h4>
      </div>
      <div class="modal-body">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 justify-content-center">
          <!-- <h4 style="color: white"><?=$pameran_virtual->judul_pameran?></h4> -->
          <div class="pameran_virtual_keterangan"><?=$pameran_virtual->keterangan?></div>
          <br>
          <a class="btn btn-danger" href="<?=base_url()?>index.php/konten/pameran_virtual_detail/<?=$pameran_virtual->kd_pameran ?>">Klik, Lihat ...</a>
          <!-- <button type="button" class="btn btn-danger">Klik, Lihat ...</button> -->
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

        </div>  
        <div class="col-md-7 col-lg-7 col-sm-12">
          <div class="video-container">
           <?=$pameran_virtual->embed_code?>
         </div>
       </div>
     </div>
     <div class="modal-footer" style="border-top: 0px solid #e5e5e5;">
     </div>
     <br/>
     <br/>
   <!--    <div class="modal-footer">

   </div> -->
 </div>
</div>
</div>

<!-- Doctor Start -->
 <!-- <section class="doctor-area">
  <div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
     <div class="section-title-col text-center">
      <h2>Tim <span>Dokter</span></h2>
      <p>Kenyamanan anda bukan dari dokter spesialis terbaik,<br>tetapi dari tim kami yang solid.</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
   <div class="doctor-col doctor-carousel">
    <?php
    foreach ($dokter as $key => $value) {
      $foto = $value->foto!=''?$value->foto :'upload/dokter/man.jpg';
      ?>
      <div class="item">
       <div class="our-doctor">
        <div class="pic">
         <img src="<?=base_url().$value->foto?>" alt="" style="max-width:400px;border-radius: 50%; object-fit: cover;">
       </div>

     </div>
     <h4><?php echo anchor('konten/dokter_detail/'.$value->id, $value->nama_dokter.' (RSMU)', 'class="link-class"') ?></h4>
   </div>
   <?php
 }
 ?>
</div>
</div>
</div>
</div>
</section>  -->

<?php } ?>

<!-- footer start -->
<?php require_once('footer.php') ?>

<script type="text/javascript">
  function bukaInfo()
  {
    $('#infoku').modal('show');
  }
</script>

<!-- jQuery -->
<script src="<?=base_url('js/jquery.min.js')?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url('js/bootstrap.min.js')?>"></script>

<!-- All Included JavaScript -->
<script src="<?=base_url('js/bootstrap-dropdownhover.min.js')?>"></script>
<script src="<?=base_url('js/jquery-scrolltofixed-min.js')?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('js/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('js/jarallax.js')?>"></script>
<script src="<?=base_url('js/jquery.countup.min.js')?>"></script>
<script src="<?=base_url('js/jquery.waypoints.min.js')?>"></script>
<script src="<?=base_url('js/dyscrollup.js')?>"></script>
<script src="<?=base_url('js/VideoPlayerPopUp.js')?>"></script>
<script src="<?=base_url('js/jquery.mb.YTPlayer.min.js')?>"></script>
<script src="<?=base_url('js/animated-text.js')?>"></script>
<script src="<?=base_url('js/wow.min.js')?>"></script>

<!-- Custom Js -->
<script src="<?=base_url('js/main.js')?>"></script>
<!--Start of Zendesk Chat Script-->
<!-- <script type="text/javascript">
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
      _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
      $.src="https://v2.zopim.com/?5exgVdWRvMTfaZjHg7h4ofrnXfMe1jRj";z.t=+new Date;$.
      type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script> -->
    <!--End of Zendesk Chat Script-->

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

  function maintenance(){
    alert("Maaf, Fitur masih dalam proses Perbaikan.");
  }

  </script>


  </html>
  <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_fullscreen_video -->
<!-- http://jsbin.com/soyate/1/edit?html,css,js,output -->
