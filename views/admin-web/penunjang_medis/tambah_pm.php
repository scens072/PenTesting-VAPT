
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>INFORMASI DETAIL PENUNJANG MEDIS</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('pm/save', array()); ?>  
		      <div class="form-group">
		        <label for="header">Judul</label>
		        <input type="text" class="form-control" id="header" name="header" placeholder="Judul" >
		      </div>
		      <div class="form-group">
		        <label for="keterangan">Keterangan</label>
		        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" >
		      </div>
		      <div class="form-group">
		        <label for="keterangan">Isi</label>
		        <textarea type="text" class="form-control" id="isi" name="isi" placeholder="Isi"></textarea>
		      </div>
		      <div class="form-group">
		        <label for="image">Image</label>
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
<script type="text/javascript">

CKEDITOR.replace('isi', {
  height:300,
   filebrowserBrowseUrl : '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=files',
   filebrowserImageBrowseUrl:  '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=images',
   filebrowserFlashBrowseUrl:  '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=flash',
   filebrowserUploadUrl : '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=files',
   filebrowserImageUploadUrl:  '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=images',
   filebrowserFlashUploadUrl : '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=flash',
    });
</script>