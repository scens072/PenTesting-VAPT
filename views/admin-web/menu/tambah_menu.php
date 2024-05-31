
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
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('Menu/save', array()); ?>  
		      <div class="form-group">
		      	<label>Menu Utama</label>
		      	<select class="form-control" id="id_menu_utama" name="id_menu_utama">
		      		<?php
		      		foreach ($menu_utama as $key => $value) {
		      			echo '<option value="'.$value->id_menu_utama.'">'.$value->nama_menu_utama.'</option>';
		      		}
		      		?>
		      	</select>
		      </div>
		      <div class="form-group">
		        <label for="nama_menu">Nama Menu</label>
		        <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Nama Menu">
		      </div> 
		      <div class="form-group">
		      	<label for="type">Type</label>
		      	<select class="form-control" id="type" name="type">
		      		<option value="1">Dropdown</option>
		      		<option value="0">URL</option>
		      	</select>
		      </div>
		      <div class="form-group">
		        <label for="url">URL <span style="color: red;">*bisa diganti dengan link dibawah</span></label>
		        <input type="text" class="form-control" id="url" name="url" placeholder="URL Menu">
		      </div>
		      <div class="form-group">
		      	<label>Link Submenu <span style="color: red;">*link langsung ke submenu</span></label>
		      	<select class="form-control" id="link" name="link">
		      		<option value="0">Kosong</option>
		      		<?php
		      		foreach ($submenu as $key => $value) {
		      			echo '<option value="'.site_url().'/konten/submenu/'.$value->id.'">'.$value->header.'</option>';
		      		}
		      		?>
		      	</select>
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


