
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>PAMERAN VIRTUAL</legend>
								<?php if (isset($_SESSION['pesan'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>
								<!-- <form> -->
									<?php echo form_open_multipart('pameran_virtual/save', array()); ?>  
									<div class="form-group">
										<label for="header">Judul Pameran</label>
										<input type="text" class="form-control" id="header" name="header" placeholder="Judul" >
									</div>
									<div class="form-group">
										<label for="keterangan">Embed Code Youtube</label>
										<textarea type="text" class="form-control" id="embed_code" name="embed_code" placeholder="Embed Code Youtube" style="height:200px;"></textarea>
									</div>
									<div class="form-group">
										<label for="keterangan">Keterangan</label>
										<textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan"></textarea>
									</div>
									<div class="form-group">
										<label for="status_pameran">Status Pameran</label>
										<select class="form-control" name="status_pameran" id="status_pameran">
											<option value="BERLANGSUNG">BERLANGSUNG</option>
											<option value="SELESAI">SELESAI</option>
										</select>
									</div>


									<button type="submit" class="btn btn-default">SIMPAN</button>

								<!-- </form> -->


							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace('keterangan', {
		height:300,
		filebrowserBrowseUrl : '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=files',
		filebrowserImageBrowseUrl:  '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=images',
		filebrowserFlashBrowseUrl:  '<?=base_url()?>kcfinder/browse.php?opener=ckeditor&type=flash',
		filebrowserUploadUrl : '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=files',
		filebrowserImageUploadUrl:  '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=images',
		filebrowserFlashUploadUrl : '<?=base_url()?>kcfinder/upload.php?opener=ckeditor&type=flash',
	});
</script>