
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>UBAH BACKGROUND</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('admin/save_background', array()); ?>  
		      <div class="form-group">
		        <label for="username">Opsi</label>
		        <select class="form-control" id="option" name="option">
		        	<option>-Pilih opsi-</option>
		        	<?php 
		        	foreach ($dt_option as $key => $value) {
		        		?>
		        		<option value="<?=$value->option?>" data-tipe="<?=$value->tipe?>" data-value="<?=$value->value?>"><?=ucwords(str_replace("_", " ", $value->option))?></option>
		        		<?php
		        	}
		        	?>
		        </select>
		      </div>
		      <div class="form-group">
		        <label for="value">Gambar / Video</label>
		        <input type="file" class="form-control" id="value" name="value" placeholder="Gambar/ Video">
		      </div>
		      <div class="form-group">
		        <label for="div_value"></label>
		        <div id="div_value">
		        	
		        </div>
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
<script type="text/javascript">
$("#option").on('change',function(){
	var selected = $(this).find('option:selected');
    var tipe = selected.data('tipe'); 
    var value = selected.data('value'); 

	$('#div_value').empty();
	if(tipe=='1'){
		 $('#div_value').prepend('<img style="max-width:400px;" src="'+base_url+value+'" />');
		}else{
			$('#div_value').prepend('<video style="max-width:400px;" controls id="click"><source src="'+base_url+value+'" type=\'video/mp4;codecs="avc1.42E01E, mp4a.40.2"\' /></video>');
			

		}
   

})
</script>


