
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>SUBMENU</legend>
								<?php if (isset($_SESSION['pesan'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>
								<!-- <form> -->
									<?php echo form_open_multipart('submenu/update/'.$dt->id, array()); ?>  
							      <div class="form-group">
							      	<label>Menu</label>
							      	<select class="form-control" id="id_menu" name="id_menu">
							      		<?php
							      		foreach ($menu as $key => $value) {
								      		$selected = 'false';
							      			if ($value->id_menu==$dt->id_menu) {
							      				$selected = 'true';
							      			}
							      			echo '<option value="'.$value->id_menu.'" selected="'.$selected.'">'.$value->nama_menu.'</option>';
							      		}
							      		?>
							      	</select>
							      </div> 
									<div class="form-group">
										<label for="header">Judul</label>
										<input type="text" class="form-control" id="header" name="header" placeholder="Judul" value="<?=$dt->header?>" >
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
										<label for="url_gambar">Image</label>
										<input type="file" class="form-control" id="url_gambar" name="url_gambar" placeholder="Image">
									</div>
									<p>Ukuran file Max 5MB</p>
									<p>Nama gambar bila spasi diberi _ (tidak terdapat spasi)</p>
									<p>Ukuran file 2000x3400</p>
									<div >
										<img src="<?=base_url().$dt->url_gambar?>" style="max-width:200px;">
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