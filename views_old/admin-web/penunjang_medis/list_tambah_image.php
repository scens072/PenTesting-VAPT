<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
          <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
      
    <div class="panel panel-default">
      <div class="panel-body">
      
      <fieldset>
      <legend>Gambar - <?=$dt->header?></legend>
    
        <div class="col-md-12">
        
          <div class="row">
              <div class="form-group col-xs-12 col-sm-12">
                    <?php echo anchor('pm/add_image/'.$dt->id_penunjang, 'Tambah', 'class="btn btn-success"') ?>
                    <?php echo anchor('pm', 'Penunjang Medis', 'class="btn btn-default"') ?>
                </div>
          </div>

          <?php if (isset($_SESSION['pesan'])) { ?>
        <div class="alert alert-block alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          <?php echo $this->session->flashdata('pesan'); ?>
        </div>
      <?php } ?>


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
                          <div class="thumbnail">
                           <a href="<?=base_url().$list_data[$n]->image?>" title="<?=$list_data[$n]->keterangan?>" width="253"><img src="<?=base_url().$list_data[$n]->image?>" alt="..." class="team-img"></a>
                           <div class="caption">
                             <small ><?=$list_data[$n]->keterangan?></small>
                           

                             
                           </div>
                           <p><?php echo anchor('pm/ubah_image/'.$list_data[$n]->id, 'Ubah', 'class="btn btn-default"') ?>
                            <?php echo anchor('pm/hapus_image/'.$list_data[$n]->id, 'Hapus', 'class="btn btn-default", onclick="return hapus('.$list_data[$n]->id.')"') ?></p>
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


<script type="text/javascript">
  function hapus(id){
  if(confirm("Apakah Anda yakin untuk menghapus?")){
    return true;
  }else{
    return false;
  }
}      
    function goTo(number){
   $('ul.pagination li:eq('+number+') a').tab('show');
   upgradePreNext(number);
}
function upgradePreNext(number){
   if (number>1){
       $('ul.pager li:eq(0)').attr("onclick","goTo("+(number-1)+")");
       $('ul.pager li:eq(0)').attr("class", "previous");
   } else {
       $('ul.pager li:eq(0)').attr("class", "disabled");
   }
    if (number<5){
       $('ul.pager li:eq(6)').attr("onclick","goTo("+(number+1)+")");
       $('ul.pager li:eq(6)').attr("class", "next");
   } else {
       $('ul.pager li:eq(6)').attr("class", "disabled");
   }
}
$(document).ready(function(){
    $('li a').on('click',function(e){
        goTo((e.target.innerHTML)-0);
  });
});
</script>