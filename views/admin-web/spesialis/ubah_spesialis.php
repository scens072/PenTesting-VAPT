
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>SPESIALIS</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		         
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <?php echo form_open_multipart('spesialis/update/'.$dt->id, array()); ?>  
		      <div class="form-group">
		        <label for="nama_spesialis">Nama Spesialis</label>
		        <input type="text" class="form-control" id="nama_spesialis" name="nama_spesialis" placeholder="Nama Spesialis" value="<?=$dt->nama_spesialis?>">
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


