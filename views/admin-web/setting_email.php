
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>SETTING EMAIL</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('admin/save_setting_email', array()); ?>  
		      
		      <div class="form-group">
		        <label for="smtp">Alamat SMTP</label>
		        <input type="text" class="form-control" id="smtp" name="smtp" placeholder="Alamat SMTP" value="<?=$smtp?>">
		      </div>
		      <div class="form-group">
		        <label for="port_smtp">Port SMTP</label>
		        <input type="text" class="form-control" id="port_smtp" name="port_smtp" placeholder="Port SMTP" value="<?=$port_smtp?>">
		      </div>
		      <div class="form-group">
		        <label for="email_rs">Email RS</label>
		        <input type="text" class="form-control" id="email_rs" name="email_rs" placeholder="Email RS" value="<?=$email_rs?>">
		      </div>
		      <div class="form-group">
		        <label for="password_email_rs">Password Email</label>
		        <input type="password" class="form-control" id="password_email_rs" name="password_email_rs" placeholder="Password Email" value="<?=$password_email_rs?>">
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



