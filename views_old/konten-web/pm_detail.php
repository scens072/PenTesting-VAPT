
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>PENUNJANG MEDIS RS PKU - <?=$dt->header?></legend>
								<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
									<h2><?=$dt->header?></h2>
									<h4><?=$dt->keterangan?></h4>
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
           <div class="col-md-12 col-sm-12 col-xs-12" >
             <p><?=$dt->isi?></p>
           </div>
           <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
            <hr>
          </div>
          <div class="row">
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
                <h4 style="margin-left: 15px;">Fasilitas Penunjang Lainnya</h4>
                <div class="tab-pane <?=$active?>" id="tab<?=($i+1)?>" role="tabpanel">
                  <?php
                  for ($a=0; $a <4 ; $a++) { 

                    if($n<sizeof($list_data)){
                      ?>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail" style="height: 255px;">
                         <a href="<?=base_url().$list_data[$n]->gambar?>" title="<?=$list_data[$n]->header?>" width="253"><img src="<?=base_url().$list_data[$n]->gambar?>" alt="..." class="team-img"></a>
                         <div class="caption">
                           <h4 style="margin-bottom:0px;"><?php echo anchor('konten/pm_detail/'.$list_data[$n]->id_penunjang, $list_data[$n]->header, 'class="link-class"') ?></h4>
                           <small><?=$list_data[$n]->keterangan?></small>
                         </div>

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
      </fieldset>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

