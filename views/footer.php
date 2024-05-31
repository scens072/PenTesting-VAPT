 <style type="text/css">
 .container-foot{
  padding-right: 150px;
  padding-left: 150px;
  margin-right: auto;
  margin-left: auto;
}
</style>

<footer class="main-footer overlay-black">
  <div class="container-foot">
   <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
     <div class="footer-about-col col-default">
      <h4>Jaga Kesehatan Anda</h4>
      <div class="heading-under-line"></div>
      <p><?=$info_footer->informasi?></p>
      <ul class="about-info">
       <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p><?=$info_footer->alamat?></p></li>
      <!--  <li><i class="fa fa-phone" aria-hidden="true"></i> <p>+6231 5343.806 / 5319.619</p></li>
       <li><i class="fa fa-envelope" aria-hidden="true"></i> <p>info@rsmataundaan.co.id</p></li> -->
     </ul>
     <!--  <ul class="social">
       <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
     </ul> -->
   </div>
 </div>
 <div class="col-lg-4 col-md-6 col-sm-6">
   <div class="footer-about-col col-default">
    <h4>Hubungi Kami </h4>
    <div class="heading-under-line"></div>

    <!-- <ul class="about-info">
     <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Jl. Undaan Kulon 17 - 19</p></li>
     <li><i class="fa fa-phone" aria-hidden="true"></i> <p>+6231 5343 806 / (031) 5319 619</p></li>
     <li><i class="fa fa-envelope" aria-hidden="true"></i> <p>info@rsmataundaan.co.id</p></li>
   </ul> -->
   <ul class="social">
     <li><a href="<?=$info_footer->facebook?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
     <li><a href="<?=$info_footer->instagram?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
     <li><a target="_blank" rel="noopener noreferrer" href="<?=$info_footer->whatsapp?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
       <!-- <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> -->
     </ul>
   </div>
 </div>
 <div class="col-lg-4 col-md-6 col-sm-6">
   <div class="footer-timetable col-default">
    <h4>Jadwal Pelayanan</h4>
    <div class="heading-under-line"></div>
    <ul>
      <?php
      foreach ($jadwal_footer as $key => $value) {
        ?>
        <li><p><?=$value->nama?><span class="pull-right"><?=$value->jadwal?></span></p></li>
        <?php
      }
      ?>
     <!-- <li><p>Jam Operasional <span class="pull-right">07:00 - 20:00</span></p></li>
     <li><p>Layanan Poliklinik <span class="pull-right">06:00 - 13:00</span></p></li>
     <li><p>Layanan VIP Eksekutif <span class="pull-right">07:00 - 14:00</span></p></li>
     <li><p>Layanan Praktek Pribadi <span class="pull-right">14:00 - 20:00</span></p></li>
     <li><p>Jam Kunjung <span class="pull-right">07:00 - 20:00</span></p></li>
     <li><p>Layanan IGD <span class="pull-right">Standby 24/7</span></p></li>
     <li><p>Ambulance <span class="pull-right">Standby 24/7</span></p></li> -->
   </ul>
 </div>
</div>
</div>
</div>
</footer>
<!-- Copyright start from here -->
<div class="copyright">
  <div class="row">
   <div class="col-md-12">
    <div class="copyright-col text-center">
     <small style="color:#8c8c8c;">Copyright ©2022. <!-- RS Mata Undaan, Surabaya - Jawa Timur. --> Theme by PT Evolusi Teknologi Indonesia. All Rights Reserved</small>
     <?php echo anchor('login', 'MASUK', 'class=""') ?>
   </div>
 </div>
</div>
</div>

