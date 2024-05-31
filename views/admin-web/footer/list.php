<style type="text/css">


.list {
	list-style-type:none;
	padding:0;
	margin:0;
}
.list--list-item {
	padding-bottom:20px;
	margin-bottom:20px;
	border-bottom:1px solid #cccccc;
	
	&:last-child {
		border-bottom:0;
		margin:0;
	}
}
.no-result {
	display:none;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>FOOTER</legend>
								<?php if (isset($_SESSION['pesan_info'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>
								<!-- <form> -->
							    <?php echo form_open_multipart('footer/update_info/'.'1', array()); ?> 
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
								        <label for="keterangan">Informasi RS</label>
								        <textarea type="text" class="form-control" id="informasi" name="informasi" placeholder="Informasi"><?=$info_footer->informasi?></textarea>
								      </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
								        <label for="keterangan">Alamat RS</label>
								        <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?=$info_footer->alamat?></textarea>
								      </div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4"> 
								      <div class="form-group">
								        <label for="fb">Facebook</label>
								        <input type="text" class="form-control" id="fb" name="fb" placeholder="Facebook"  value="<?=$info_footer->facebook?>">
								      </div>
									</div>
									<div class="col-xs-4"> 
								      <div class="form-group">
								        <label for="ig">Instagram</label>
								        <input type="text" class="form-control" id="ig" name="ig" placeholder="Instagram"  value="<?=$info_footer->instagram?>">
								      </div>
									</div>
									<div class="col-xs-4"> 
								      <div class="form-group">
								        <label for="wa">Whatsapp</label>
								        <input type="text" class="form-control" id="wa" name="wa" placeholder="Whatsapp"  value="<?=$info_footer->whatsapp?>">
								      </div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
								      <button type="submit" class="btn btn-success">SIMPAN</button>
									</div>
								</div>
								</form>
								<hr>
								<div class="row">
									<div id="users" class="col-xs-12">
										<!-- <div class="filter-group row">
											<div class="col-xs-12 col-sm-12 col-md-4">
												<input type="text" class="search form-control" placeholder="Search" />
											</div> -->
												<label style="font-size: 13pt;">Jadwal Pelayanan</label>

										<!-- </div> -->
										<hr>
										<?php if (isset($_SESSION['pesan'])) { ?>
											<div class="alert alert-block alert-info" role="alert">
												<?php echo $this->session->flashdata('pesan'); ?>
											</div>
										<?php } ?>
										<ul class="list">
											<?php
											foreach ($list as $key => $value) {
												?>
												<li class="list--list-item">
													<h4 class="header"><?=$value->nama?></h4>
													<!-- <p class="keterangan"><?=$value->keterangan?></p> -->
													<p class="action">
														<div class="btn-group" role="group" aria-label="...">
															<?php echo anchor('footer/ubah/'.$value->id, 'Ubah', 'class="btn btn-default"') ?>
			
															<?php echo anchor('footer/hapus/'.$value->id, 'Hapus', 'class="btn btn-default", onclick="return hapus('.$value->id.')"') ?>
			

														</div></p>
													</li>
													<?php
												}
												?>


											</ul>
											<div class="no-result">No Results</div>
											<ul class="pagination"></ul>
											<div class="col-xs-12 col-sm-12">
												<!-- <button class="btn btn-danger" onclick="resetList();">Clear</button> -->
												<?php echo anchor('footer/tambah', 'Tambah Jadwal', 'class="btn btn-success"') ?>
											</div>
										</div>
									</div>

								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	var options = {
	valueNames: [
		'header',
		'keterangan',
		'action',
		{ data: ['gender']}
	],
	page: 5,
	pagination: true
};
var userList = new List('users', options);

function resetList(){
	userList.search();
	userList.filter();
	userList.update();
	
	$('.search').val('');
	//console.log('Reset Successfully!');
};
  
function hapus(id){
	if(confirm("Apakah Anda yakin untuk menghapus?")){
		return true;
	}else{
		return false;
	}
}                           
$(function(){
 
	
	userList.on('updated', function (list) {
		if (list.matchingItems.length > 0) {
			$('.no-result').hide()
		} else {
			$('.no-result').show()
		}
	});
});
</script>