 <section class="menu-area">
   <div class="container">
     <div class="row">
      <br>
      <div class="dropdown">
        <div style="padding: 10px;padding-bottom:20px;background-color: #f1f1f1;" >
          <div id="nav-icon" class="dropbtn1" onclick="myFunction()" >
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div id="myDropdown" class="dropdown-content">
          <?php echo anchor('welcome', 'BERANDA', 'class=""') ?>
          <?php
          if($judul!='karya_ilmiah'){
            foreach ($header_konten as $key => $value) {
              echo anchor('konten/'.$judul.'/'.$value->id, $value->header, 'class=""');
            }
            if($judul=='tentang_kami'){
              echo anchor('konten/karya_ilmiah','KARYA ILMIAH', 'class=""');
            }
          }else{
            echo anchor('konten/karya_ilmiah','KARYA ILMIAH', 'class=""');
          }

          ?>
        </div>
      </div>
      <center><div class="menu-jdl"><h2><?=strtoupper(str_replace('_', " ", $judul))?></h2></div></center>
    </section>
    <script>
      function myFunction() {
        $('#nav-icon').toggleClass('open');
        document.getElementById("myDropdown").classList.toggle("show");
      }
    </script>