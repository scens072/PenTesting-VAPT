<!-- <?php require_once(APPPATH.'/views/header_konten.php') ?> -->

<section class="about-area" id="about">
  <div class="container">
    <div class="col-lg-12 col-md-12">
      <center><div class="menu-jdl"><h2><?=strtoupper($dt->header)?></h2></div> </center>
      <p><?=$dt->keterangan?></p>
    </div>
    <div class="row">
      <?php foreach ($image as $key => $value) {
       if($indikator==$dt->id){
        ?>
        <div class="col-md-6 col-sm-6">
         <div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
          <div class="image-hover-box">
           <figure>
            <img src="<?=base_url().$value->image?>" alt="">
          </figure>
        </div>
        <!-- <div class="service-content"> -->
         <p><?=$value->keterangan?></p>
         <!-- </div> -->
       </div>
     </div>
     <?php
   }else{
    ?>
    <div class="col-md-12 col-sm-12">
     <div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
      <div class="image-hover-box">
       <figure>
        <img src="<?=base_url().$value->image?>" alt="">
      </figure>
    </div>
  <!-- <div class="service-content">
   <p><?=$value->keterangan?></p>
 </div> -->
</div>
</div>
<?php
}
?>

<?php
}?>
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <p><?=$dt->isi?></p>
</div>
</section>


