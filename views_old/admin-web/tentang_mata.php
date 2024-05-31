
<div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col ">
		      <div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
		  
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		  <fieldset>
		  <legend>TENTANG KESEHATAN</legend>
		  <?php if (isset($_SESSION['pesan'])) { ?>
		        <div class="alert alert-block alert-info" role="alert">
		          <!--<button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		          </button>-->
		          <?php echo $this->session->flashdata('pesan'); ?>
		        </div>
		      <?php } ?>
		      <!-- <form> -->
		    <?php echo form_open_multipart('tentang_mata/update/'.$dt->id, array()); ?>  
		      <div class="form-group">
		        <label for="header">Judul</label>
		        <input type="text" class="form-control" id="header" name="header" placeholder="Judul" value="<?=$dt->header?>">
		      </div>
		      <div class="form-group">
		        <label for="keterangan">Keterangan</label>
		        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?=$dt->keterangan?>">
		      </div>
		      <div class="form-group">
		        <label for="keterangan">Isi</label>
		        <textarea type="text" class="form-control" id="isi" name="isi" placeholder="Isi"><?=$dt->isi?></textarea>
		      </div>
		      <div class="form-group">
		        <label for="image">Gambar Publikasi</label>
		        <input type="file" class="form-control" id="image" name="image" placeholder="Gambar Publikasi">
		      </div>
		      <div class="form-group">

		        <div id="div_value">
		        	<img src="<?=base_url().$dt->image?>" style="max-width:200px;">
		        </div>
		      </div>
		      
		      <button type="submit" class="btn btn-default">SIMPAN</button>
		      <?php echo anchor('tentang_mata/publikasi/'.$dt->id, 'TAMBAH KE PUBLIKASI', 'class="btn btn-default", onclick="return publikasi('.$dt->id.')"') ?>
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
function publikasi(id){
	if(confirm("Apakah Anda yakin untuk TAMBAH KE PUBLIKASI?")){
		
		return true;
	}else{
		
		return false;
	}
}   
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