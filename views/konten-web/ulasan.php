<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend><strong>Ceritakan Pengalaman dan Testimoni Anda Tentang RSUD KARAWANG</strong></legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('konten/save_ulasan', array()); ?>  
		      
		      <div class="form-group">
		        <label for="nama">Nama Anda</label>
		        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" >
		      </div>
		      <div class="form-group">
		        <label for="email">Masukkan Email Anda</label>
		        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" >
		      </div>
		      <div class="form-group">
		        <label for="ulasan">Ceritakan Kenyamanan Anda Bersama Kami</label>
		        <textarea type="text" class="form-control" id="ulasan" name="ulasan" placeholder="Ceritakan Kenyamanan Anda Bersama Kami" style="min-height: 100px;" ></textarea>
		      </div>
		      
		      <button type="submit" class="btn btn-default" onclick="return cek()">SIMPAN</button>
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
	function cek(){
		if($("#nama").val()=='' || $("#email").val()=='' || $("#ulasan").val()==''){
			alert("Periksa kembali data Anda");
			return false;
		}else{
			return true;
		}
	}
</script>



