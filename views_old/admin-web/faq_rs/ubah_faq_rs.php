
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>UBAH FAQ RS PKU</legend>
								<?php if (isset($_SESSION['pesan'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>
								<?php echo form_open_multipart('faq_rs/update/'.$dt->kd_faq, array()); ?>  
								<div class="form-group">
									<label for="header">Judul</label>
									<input type="text" class="form-control" id="header" name="header" placeholder="Judul" value="<?=$dt->tanya_faq?>" >
								</div>
								<div class="form-group">
									<label for="keterangan">Isi</label>
									<textarea type="text" class="form-control" id="isi" name="isi" placeholder="Isi"><?=$dt->isi_faq?></textarea>
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