<!-- 
<section style="padding-top: 50px;">
	<center>
		<div class="menu-jdl"><h2>Tim Dokter RSMU</h2></div>
	</center>
</section> -->

<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>TIM DOKTER RSUD KARAWANG</h2></div>
		</center>
		<div class="col-md-4">
			<div class="appointment-col">
				<select class="form-control" id="cmbspesialis">
					<option value="">Pilih Penyakit</option>
					<?php
					foreach ($spesialis as $key => $value) {
						?>
						<option value="<?=$value->id?>"><?=$value->nama_spesialis?></option>
						<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="appointment-col">
				<input type="text" class="form-control" placeholder="Nama Dokter" id="nama_dokter">
			</div>
		</div>
		<div class="col-md-4">
			<div class="appointment-col">
				<button class="btn btn-default simple-btn" type="button" id="cari_dokter">Cari</button>&nbsp;
				<button class="btn btn-default simple-btn" type="button" id="clear_dokter">X</button>
			</div>
		</div>
		<div class="col-md-12 col-lg-12">
			<table class="table table-bordered animated" rules="all" id="tbljadwaldokter" style="font-size: 12px" >
				<thead style="background-color: #33a9ef">
					<tr style="color: white;">
						<th>No.</th>
						<th>Nama Dokter</th>
						<th>Waktu Praktek</th>
						<th>Senin</th>
						<th>Selasa</th>
						<th>Rabu</th>
						<th>Kamis</th>
						<th>Jum'at</th>
						<th>Sabtu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$id_dokter = '';$no=0;$n='';$dokter='';
					foreach ($jadwal as $key => $value) {
						if($id_dokter!=$value->id_dokter){
							$no++;
							$n=$no;
							// echo anchor('konten/dokter_detail/'.$value->id_dokter, $value->nama_dokter, 'class="link-class"')
							$dokter=$value->nama_dokter.'<br/><p style="font-weight:bold;font-size: 12px;font-family: serif;color:blue">'.$value->spesialis.'</p>';
							$id_dokter = $value->id_dokter;
						}else{
							$n='';
							$dokter='<div style="opacity:0;color">'.$value->nama_dokter.'<br/><p style="font-weight:bold;font-size: 12px;font-family: serif;color:blue">'.$value->spesialis.'</p></div>';
						}


						?>
						<tr>
							<td><?=$n?></td>
							<td><?php echo anchor('konten/dokter_detail/'.$value->id_dokter, $dokter, 'class="link-class" style="color:black;"') ?></td>
							<!-- <td><?=$dokter?></td> -->
							<td><?=$value->waktu?></td>
							<td><?=$value->senin?></td>
							<td><?=$value->selasa?></td>
							<td><?=$value->rabu?></td>
							<td><?=$value->kamis?></td>
							<td><?=$value->jumat?></td>
							<td><?=$value->sabtu?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<script type="text/javascript">
	$("#cari_dokter").on('click',function(){
		var searchString = $("#nama_dokter").val();
		var rows = $('#tbljadwaldokter>tbody>tr');
		if (searchString != '' && searchString.length > 0){
			rows.filter('tr').hide();
			rows.filter('tr:has(td:contains("'+searchString+'"))').show();
			rows.filter('tr:has(td:contains("'+searchString+'"))').next('tr').show();
		}else{
			rows.filter('tr').show();
		}

	})
	$("#cmbspesialis").on('change',function(){
		var searchString = $("#cmbspesialis").val();
		var rows = $('#tbljadwaldokter>tbody>tr');
		if (searchString != '' && searchString.length > 0){
			rows.filter('tr').hide();
			rows.filter('tr:has(td:contains("'+searchString+'"))').show();
			rows.filter('tr:has(td:contains("'+searchString+'"))').next('tr').show();
		}else{
			rows.filter('tr').show();
		}

	})

	$("#clear_dokter").on('click',function(){
		$("#nama_dokter").val('');
		$("#cari_dokter").trigger('click');
	})
</script>
