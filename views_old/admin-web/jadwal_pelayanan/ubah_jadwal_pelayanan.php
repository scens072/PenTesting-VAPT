
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>JADWAL PELAYANAN</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('jadwal_pelayanan/update/'.$dt->id, array()); ?>  
		      <div class="form-group">
		        <label for="id_jenis_pelayanan">Jenis Pelayanan</label>
		        <select name="id_jenis_pelayanan" id="id_jenis_pelayanan" class="form-control">
		        	<?php

		        	foreach ($jenis_pelayanan as $key => $value) {
		        		$select=$value->id == $dt->id_jenis_pelayanan?'selected':'';

		        		?>
		        		<option value="<?=$value->id?>" <?=$select?>><?=$value->jenis_pelayanan?></option>
		        		<?php
		        	}
		        	?>
		        </select>
		      </div>
		      <div class="form-group">
		        <label for="hari">Hari</label>
		        <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari" value="<?=$dt->hari?>">
		      </div>
		      <div class="row">
		     		<div class="col-md-2">
		        	<div class="form-group">
		        		<label for="pagi1">Pagi</label>
		        		<input type="text" class="form-control" id="pagi1" name="pagi1" placeholder="00:00" value="<?=$pagi1?>">
		        	</div>
			        </div>
			        <div class="col-md-2">
			        	<div class="form-group">
			        		<label for="pagi1">&nbsp;</label>
			        		<input type="text" class="form-control" id="pagi2" name="pagi2" placeholder="00:00" value="<?=$pagi2?>">
			        	</div>
			        </div>
			        <div class="col-md-2">
		        	<div class="form-group">
		        		<label for="siang1">Siang</label>
		        		<input type="text" class="form-control" id="siang1" name="siang1" placeholder="00:00" value="<?=$siang1?>">
		        	</div>
			        </div>
			        <div class="col-md-2">
			        	<div class="form-group">
			        		<label for="siang1">&nbsp;</label>
			        		<input type="text" class="form-control" id="siang2" name="siang2" placeholder="00:00"  value="<?=$siang2?>">
			        	</div>
			        </div>
			        <div class="col-md-2">
		        	<div class="form-group">
		        		<label for="sore1">Sore</label>
		        		<input type="text" class="form-control" id="sore1" name="sore1" placeholder="00:00"  value="<?=$sore1?>">
		        	</div>
			        </div>
			        <div class="col-md-2">
			        	<div class="form-group">
			        		<label for="sore1">&nbsp;</label>
			        		<input type="text" class="form-control" id="sore2" name="sore2" placeholder="00:00"  value="<?=$sore2?>">
			        	</div>
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


