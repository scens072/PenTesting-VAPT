<!-- <?php require_once(APPPATH.'/views/header_konten.php') ?> -->

<section class="about-area" id="about">
  <div class="container">
   <div class="row">
     <div class="row">
      <div class="col-md-12 col-sm-12">
       <center><div  class="menu-jdl"><h2><?=$dt->header?></h2></div>
        <p><?=$dt->keterangan?></p>
      </div>
    </div>
    <?php foreach ($image as $key => $value) {
      ?>
      <div class="col-md-4 col-sm-4">
       <div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
        <div class="image-hover-box">
         <figure>
          <img src="<?=base_url().$value->image?>" alt="">
        </figure>
      </div>
      <div class="service-content">

       <p><?=$value->keterangan?></p>
     </div>
   </div>
 </div>


 <?php
}?>


</div>

<div class="col-lg-12 col-md-12">
 <?=$dt->isi?>
</div>

</div>

</div>
</section>
