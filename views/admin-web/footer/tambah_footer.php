
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>Jadwal Footer</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('footer/save', array()); ?>  
		      <div class="form-group">
		        <label for="nama">Nama Jadwal</label>
		        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jadwal">
		      </div>
		      <div class="form-group">
		        <label for="jadwal">Waktu</label>
		        <input type="text" class="form-control" id="jadwal" name="jadwal" placeholder="00:00 - 00:00">
		      </div>
		      <div class="form-group">
		        <label for="urut">Urut</label>
		        <input type="text" class="form-control" id="urut" name="urut" placeholder="No. Urut">
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


