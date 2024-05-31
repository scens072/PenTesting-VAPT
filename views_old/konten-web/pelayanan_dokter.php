<?php require_once(APPPATH.'/views/header_konten.php') ?>

<section class="about-area" id="about">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
      <div  class="menu-jdl"><h2><?=$dt->header?></h2>
        <p><?=$dt->keterangan?></p>
      </div>


      <?=$dt->isi?>
    </div>
    <div class="row">
      <?php foreach ($image as $key => $value) {
       ?>
       <div class="col-md-6 col-sm-6">
         <div class="service-col wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
          <div class="image-hover-box">
           <?php 
           $ext = pathinfo(base_url().$value->image, PATHINFO_EXTENSION);
           if($ext=='mp4'){
            ?>

             <video controls id="click"><source src="<?=base_url().$value->image?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' /></video>
           
            <?php
          }
          else{
            ?>
            <figure>
              <img src="<?=base_url().$value->image?>" alt="">
            </figure>
            <?php
          }
          ?>

        </div>
        <div class="service-content">

         <p><?=$value->keterangan?></p>
       </div>
     </div>
   </div>
   <?php
 }?>


</div>
</div>

</div>
</section>
