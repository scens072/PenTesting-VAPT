
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>Gambar - <?=$dt->header?></legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('karya_ilmiah/update_image/'.$data->id, array()); ?>  

		      <div class="form-group">
		        <label for="keterangan">Keterangan</label>
		        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?=$data->keterangan?>" >
		      </div>

		      <div class="form-group">
		        <label for="image">Image / Video</label>
		        <input type="file" class="form-control" id="image" name="image" placeholder="Image">
		      </div>
		       <div class="form-group">
		       	<?php
		       	$ext = pathinfo(base_url().$data->image, PATHINFO_EXTENSION);
                if($ext=='mp4'){
                	?>
                	<video style="max-width: 300px;" controls id="click"><source src="<?=base_url().$data->image?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' /></video>
                	<?php
                }else{
                	?>
                	<img src="<?=base_url().$data->image?>" style="max-width:200px;">
                	<?php
                }
		       	?>
		        	
		       </div>
		      
		      <button type="submit" class="btn btn-default">SIMPAN</button>
		      
		    </form>
		   
		  
		</fieldset>
		  </div>
		</div>
		</div>
     </div>
 </div>
</div>
</div>
