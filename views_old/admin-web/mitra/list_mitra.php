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
								<legend>MITRA RS PKU</legend>
								<?php if (isset($_SESSION['pesan'])) { ?>
									<div class="alert alert-block alert-info" role="alert">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
								<?php } ?>


								<div class="row">
									<div id="users" class="col-xs-12">
										<div class="filter-group row">
											<div class="col-xs-12 col-sm-12 col-md-4">
												<input type="text" class="search form-control" placeholder="Search" />
											</div>

											<div class="col-xs-12 col-sm-12">
												<button class="btn btn-danger" onclick="resetList();">Clear</button>
												<?php echo anchor('mitra/tambah', 'Tambah', 'class="btn btn-success"') ?>
											</div>
										</div>
										<hr>
										<ul class="list">
											<?php
											foreach ($list as $key => $value) {
												?>
												<li class="list--list-item">
												    <img src="<?=base_url().$value->gambar?>" style="max-width:200px;">
													<!--<h4 class="header"><?=$value->header?></h4>-->
													<p class="keterangan"><?=$value->keterangan?></p>
													<p class="action">
														<div class="btn-group" role="group" aria-label="...">
															<?php echo anchor('mitra/ubah/'.$value->id_mitra, 'Ubah', 'class="btn btn-default"') ?>
			
															<?php echo anchor('mitra/hapus/'.$value->id_mitra, 'Hapus', 'class="btn btn-default", onclick="return hapus('.$value->id_mitra.')"') ?>
			

														</div></p>
													</li>
													<?php
												}
												?>


											</ul>
											<div class="no-result">No Results</div>
											<ul class="pagination"></ul>
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