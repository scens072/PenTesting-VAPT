
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
		    <?php echo form_open_multipart('karya_ilmiah/save_image/'.$dt->id, array()); ?>  

		      <div class="form-group">
		        <label for="keterangan">Keterangan</label>
		        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" >
		      </div>

		      <div class="form-group">
		        <label for="image">Image / Video</label>
		        <input type="file" class="form-control" id="image" name="image" placeholder="Image">
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
