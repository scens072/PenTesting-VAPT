
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>DOKTER</legend>
								<?php if (isset($_SESSION['pesan'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>
								<?php echo form_open_multipart('dokter/update/'.$dt->id, array()); ?>  

								<div class="form-group">
									<label for="nama_dokter">Nama Dokter</label>
									<input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Nama Dokter" value="<?=$dt->nama_dokter?>">
								</div>
								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
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
									<div id="div_value">
										<img src="<?=base_url().$dt->foto?>" style="max-width:200px;">
									</div>
								</div>
								<div class="form-group">
									<label for="spesialis">Spesialis</label>
								</div>
								<div class="form-group">
									<?php 
									foreach ($spesialis as $key => $value) {
										$checked='';
										if(in_array($value->id, $id_spesialis)){
											$checked='checked';
										}
										?>
										<div class="col-md-4">
											<input type="checkbox" name="spesialis[]" value="<?=$value->id?>" <?=$checked?> > <?=$value->nama_spesialis?>
										</div>

										<?php
									}
									?>
								</div>
								<div class="row"></div>
								<br>
								<fieldset>
									<legend>Praktek Pagi</legend>

									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="senin1">Senin</label>
												<input type="text" class="form-control" id="senin1" name="senin1" placeholder="00:00" value="<?=$senin1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="senin1">&nbsp;</label>
												<input type="text" class="form-control" id="senin2" name="senin2" placeholder="00:00" value="<?=$senin2?>">
											</div>
										</div>
										<div class="col-md-2"> 
											<div class="form-group">
												<label for="selasa1">Selasa</label>
												<input type="text" class="form-control" id="selasa1" name="selasa1" placeholder="00:00" value="<?=$selasa1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="selasa1">&nbsp;</label>
												<input type="text" class="form-control" id="selasa1" name="selasa2" placeholder="00:00" value="<?=$selasa2?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="rabu1">Rabu</label>
												<input type="text" class="form-control" id="rabu1" name="rabu1" placeholder="00:00" value="<?=$rabu1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="rabu2">&nbsp;</label>
												<input type="text" class="form-control" id="rabu2" name="rabu2" placeholder="00:00" value="<?=$rabu2?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="kamis1">Kamis</label>
												<input type="text" class="form-control" id="kamis1" name="kamis1" placeholder="00:00" value="<?=$kamis1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="kamis2">&nbsp;</label>
												<input type="text" class="form-control" id="kamis2" name="kamis2" placeholder="00:00" value="<?=$kamis2?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="jumat1">Jum'at</label>
												<input type="text" class="form-control" id="jumat1" name="jumat1" placeholder="00:00" value="<?=$jumat1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="jumat2">&nbsp;</label>
												<input type="text" class="form-control" id="jumat2" name="jumat2" placeholder="00:00" value="<?=$jumat2?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="sabtu1">Sabtu</label>
												<input type="text" class="form-control" id="sabtu1" name="sabtu1" placeholder="00:00" value="<?=$sabtu1?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="sabtu2">&nbsp;</label>
												<input type="text" class="form-control" id="sabtu2" name="sabtu2" placeholder="00:00" value="<?=$sabtu2?>">
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend>Praktek Sore</legend>

									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="senin11">Senin</label>
												<input type="text" class="form-control" id="senin11" name="senin11" placeholder="00:00" value="<?=$senin11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="senin11">&nbsp;</label>
												<input type="text" class="form-control" id="senin22" name="senin22" placeholder="00:00" value="<?=$senin22?>">
											</div>
										</div>
										<div class="col-md-2"> 
											<div class="form-group">
												<label for="selasa11">Selasa</label>
												<input type="text" class="form-control" id="selasa11" name="selasa11" placeholder="00:00" value="<?=$selasa11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="selasa11">&nbsp;</label>
												<input type="text" class="form-control" id="selasa22" name="selasa22" placeholder="00:00" value="<?=$selasa22?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="rabu11">Rabu</label>
												<input type="text" class="form-control" id="rabu11" name="rabu11" placeholder="00:00" value="<?=$rabu11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="rabu22">&nbsp;</label>
												<input type="text" class="form-control" id="rabu22" name="rabu22" placeholder="00:00" value="<?=$rabu22?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="kamis11">Kamis</label>
												<input type="text" class="form-control" id="kamis11" name="kamis11" placeholder="00:00" value="<?=$kamis11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="kamis22">&nbsp;</label>
												<input type="text" class="form-control" id="kamis22" name="kamis22" placeholder="00:00" value="<?=$kamis22?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="jumat11">Jum'at</label>
												<input type="text" class="form-control" id="jumat11" name="jumat11" placeholder="00:00" value="<?=$jumat11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="jumat22">&nbsp;</label>
												<input type="text" class="form-control" id="jumat22" name="jumat22" placeholder="00:00" value="<?=$jumat22?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="sabtu11">Sabtu</label>
												<input type="text" class="form-control" id="sabtu11" name="sabtu11" placeholder="00:00" value="<?=$sabtu11?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="sabtu22">&nbsp;</label>
												<input type="text" class="form-control" id="sabtu22" name="sabtu22" placeholder="00:00" value="<?=$sabtu22?>">
											</div>
										</div>
									</div>
								</fieldset>	

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-default">SIMPAN</button>
									</div>
								</div>  


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