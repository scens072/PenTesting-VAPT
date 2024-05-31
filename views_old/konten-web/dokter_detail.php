<!-- <?php require_once(APPPATH.'/views/header_konten.php') ?> -->

<section class="about-area" id="about">
  <div class="container">
   <div class="row">
     <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="col-md-3 col-sm-3 col-xs-3">
         <div class="our-doctor">
          <div class="pic">
            <img src="<?=base_url().$dt->foto?>" alt="" style="max-width:400px;border-radius: 50%; object-fit: cover;">
          </div>

        </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-8">
       <div  class="menu-jdl"><h3><?=$dt->nama_dokter?> (RS PKU)</h3></div>
       <h5>Spesialis : <?=$dt->spesialis?></h5>
       <p><?=$dt->isi?></p>
     </div>
   </div>
 </div>
</div>

<div class="col-md-12 col-lg-12">
  <div class="row">
    <table class="table table-bordered animated" rules="all" id="tbljadwaldokter" style="font-size: 12px" >
      <thead style="background-color: #33a9ef">
        <tr style="color: white;">
          <th>Waktu Praktek</th>
          <th>Senin</th>
          <th>Selasa</th>
          <th>Rabu</th>
          <th>Kamis</th>
          <th>Jum'at</th>
          <th>Sabtu</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id_dokter = '';$no=0;$n='';$dokter='';
        foreach ($detail_jadwal as $key => $value) {
          // if($id_dokter!=$value->id_dokter){
          //   $no++;
          //   $n=$no;
          //   $dokter=$value->nama_dokter.'<br/><p style="font-weight:bold;font-size: 12px;font-family: serif;">'.$value->spesialis.'</p>';
          //   $id_dokter = $value->id_dokter;
          // }else{
          //   $n='';
          //   $dokter='<div style="opacity:0;">'.$value->nama_dokter.'<br/><p style="font-weight:bold;font-size: 12px;font-family: serif;">'.$value->spesialis.'</p></div>';
          // }
          ?>
          <tr>
            <td><?=$value->waktu?></td>
            <td><?=$value->senin?></td>
            <td><?=$value->selasa?></td>
            <td><?=$value->rabu?></td>
            <td><?=$value->kamis?></td>
            <td><?=$value->jumat?></td>
            <td><?=$value->sabtu?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="section-title-col text-center">
    <h2>Tim <span>Dokter</span></h2>
    <p>Kenyamanan anda bukan dari dokter spesialis terbaik,<br>tetapi dari tim kami yang solid.</p>
  </div>
</div>
<div class=""> 
  <div class="tab-content">
    <?php
    $n=0;
    for ($i=0; $i <$page ; $i++) { 
      $active='';
      if($i==0){
        $active='active';
      }else{
        $active='';
      }?>
      <div class="tab-pane <?=$active?>" id="tab<?=($i+1)?>" role="tabpanel">
        <?php
        for ($a=0; $a <4 ; $a++) { 

          if($n<sizeof($list_data)){
            ?>
            <div class="col-md-3 col-sm-3 col-xs-6">
             <a href="<?=base_url().$list_data[$n]->foto?>" title="<?=$list_data[$n]->nama_dokter?>" width="253"><img src="<?=base_url().$list_data[$n]->foto?>" alt="..." class="team-img"></a>
             <div class="caption">
              <center><h4 style="margin-bottom:0px;"><?php echo anchor('konten/dokter_detail/'.$list_data[$n]->id, $list_data[$n]->nama_dokter, 'class="link-class"') ?></h4>
                <h5><?php echo $list_data[$n]->spesialis ?></h5>
              </center>
            </div>
          </div>
          <?php
          $n++;
        }
      }
      ?>
    </div>
    <?php

  }
  ?>
</div>
</div>
<div class="row" align="center">
  <nav aria-label="...">
    <ul class="pagination" role="tablist">
      <li class="previous" onclick="goTo(1);"><a href="#"><span aria-hidden="true">←</span> Previous</a></li>
      <?php
      for ($i=0; $i <$page ; $i++) { 
        if($i==0){
          ?>
          <li class="active" id="first">
            <a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
          </li>
          <?php
        }else if(($i+1)==$page){
          ?>
          <li id="last">
            <a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
          </li>
          <?php
        }else{
          ?>
          <li>
            <a aria-controls="tab<?=($i+1)?>" data-toggle="tab" href="#tab<?=($i+1)?>" role="tab"><?=($i+1)?></a>
          </li>
          <?php
        }
      }
      ?>

      <li class="next" onclick="goTo(2);"><a href="#">Next <span aria-hidden="true">→</span></a></li>
    </ul>
  </nav>
</div>
</div>
</section>
