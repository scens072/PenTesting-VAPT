 <section class="menu-area">
   <div class="container">
   <div class="row">
  <br>
    <div class="dropdown">
    <div style="padding: 10px;padding-bottom:20px;background-color: #f1f1f1;" >
<!--     <div id="nav-icon" class="dropbtn1" onclick="myFunction()" >
      <span></span>
      <span></span>
      <span></span>
    </div> -->
</div>
<!--   <div id="myDropdown" class="dropdown-content">
    <?php echo anchor('welcome', 'BERANDA', 'class=""') ?>
    <?php echo anchor('konten/pelayanan/'.'pelayanan_rsmu', 'PELAYANAN RSUD', 'class=""') ?>
    <?php echo anchor('konten/pelayanan/'.'peraturan', 'PERATURAN DAN KEBIJAKAN RSUD', 'class=""') ?>
     <?php echo anchor('konten/pelayanan/'.'cari_dokter', 'CARI DOKTER', 'class=""') ?>
    <?php echo anchor('konten/pelayanan/'.'kamar', 'KAMAR', 'class=""') ?>
    <?php //echo anchor('konten/pelayanan/'.'faskes', 'FASILITAS KESEHATAN RSMU', 'class=""') ?>
  </div> -->
</div>
<div  class="menu-jdl"><h2><?=strtoupper(str_replace('_', " ", $judul))?></h2>

</div>
 </section>
 <script>
function myFunction() {
  $('#nav-icon').toggleClass('open');
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>
