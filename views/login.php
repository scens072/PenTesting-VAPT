
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col text-center">
		      <div style="text-align: center;padding-top: 50px;padding-bottom: : 50px;padding-left: 300px;padding-right: 300px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>LOGIN ADMINISTRATOR</legend>
		      <!-- <form> -->
		    <?php echo form_open('login/masuk', array()); ?>  
		          <div class="form-group">
		        <label for="username">Username</label>
		        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
		      </div>
		      <div class="form-group">
		        <label for="password">Password</label>
		        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		      </div>
		      <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-danger" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <button type="submit" class="btn btn-default">MASUK</button>
		    </form>
		   
		  
		</fieldset>
		  </div>
		</div>
		</div>
     </div>
 </div>
</div>
</div>


