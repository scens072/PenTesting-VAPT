
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>JENIS PELAYANAN</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('jenis_pelayanan/save', array()); ?>  
		      <div class="form-group">
		        <label for="nama_spesialis">Jenis Pelayanan</label>
		        <input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" placeholder="Jenis Pelayanan">
		      </div>
		      
		      <button type="submit" class="btn btn-default">TAMBAH</button>
		    </form>
		   
		  
		</fieldset>
		  </div>
		</div>
		</div>
     </div>
 </div>
</div>
</div>


