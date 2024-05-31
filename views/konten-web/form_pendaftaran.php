<section class="about-area" id="about">
	<div class="container">
		<center>
			<br/>
			<div class="menu-jdl"><h2>FORMULIR PENDAFTARAN</h2></div>
			<p></p>
			<br/>
		</center>
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				Jenis Pasien
				<div class="form-check">
<!--
					<input type="radio" class="form-check-input" id="baru" name="optradio" value="baru">
					<label class="form-check-label" for="baru">Baru</label>
-->
					<input type="radio" class="form-check-input" id="lama" name="optradio" value="lama">
					<label class="form-check-label" for="lama">Lama</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				No. Medical Record (Isi Lalu Tekan Enter)
				<input id="id_no_rm" type="text" class="form-control" placeholder="No RM" disabled />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Nama Lengkap
				<input id="id_nama_lengkap" type="text" class="form-control" placeholder="Nama" disabled />
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5">
				Jenis Kelamin
				<select id="id_jenis_kelamin" class="form-control" disabled>
					<option value="-"> Pilih Jenis Kelamin </option>
		        	<?php
						foreach ($jenis_kelamin as $key => $value) {
		        	?>
		        		<option value="<?=$value->kd_jenis?>"><?=$value->jenis?></option>
		        	<?php
						}
		        	?>
		        </select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Tempat Lahir
				<input id="id_tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" disabled />
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5">
				Tanggal Lahir
				<input id="id_tgl_lahir" type="date" class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				Alamat Lengkap
				<input id="id_jalan" type="text" class="form-control" placeholder="Alamat" disabled />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				No. HP
				<input id="id_nohp" type="text" class="form-control" placeholder="No. HP" disabled />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Poli Tujuan
				<select id="id_poli_tujuan" class="form-control" disabled>
					<option value="-"> Pilih Poli </option>
		        	<?php
						foreach ($poli as $key => $value) {
		        	?>
		        		<option value="<?=$value->kd_unit?>"><?=$value->nama_unit?></option>
		        	<?php
						}
		        	?>
		        </select>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5">
				Dokter
				<select id="id_dokter" class="form-control" disabled>
					<option value="-"> Pilih Dokter </option>
		        </select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Penjamin
				<select id="id_penjamin" class="form-control" disabled>
					<option value="-"> Pilih Penjamin </option> 
		        	<?php
						foreach ($penjamin as $key => $value) {
		        	?>
		        		<option value="<?=$value->kd_detkelpenjamin?>"><?=$value->nama_penjamin?></option> 
		        	<?php
						}
		        	?>
		        </select>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5">
				Tgl Rencana Periksa
				<input id="id_tgl_rencana" type="date" class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-11">
				<button class="btn btn-primary" style="width: 178px !important;" type="button" id="daftar_online">DAFTAR</button>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$("#daftar_online").click(function(){
        var jenis = $("input[name=optradio]:checked").val();
        if(jenis=='lama' || jenis=='baru'){
			var rm = $("#id_no_rm").val();
			var nama = $("#id_nama_lengkap").val();
			var jkel = $("#id_jenis_kelamin").val();
			var tmplahir = $("#id_tempat_lahir").val();
			var tgllahir = $("#id_tgl_lahir").val();
			var alamat = $("#id_jalan").val();
			var no_hp = $("#id_nohp").val();
			var unit = $("#id_poli_tujuan").val();
			var dokter = $("#id_dokter").val();
			var penjamin = $("#id_penjamin").val();
			var tgl = $("#id_tgl_rencana").val();
			var form = {
				'jenis' : jenis,
				'rm' : rm,
				'nama' : nama,
				'jkel' : jkel,
				'tmplahir' : tmplahir,
				'tgllahir' : tgllahir,
				'alamat' : alamat,
				'no_hp' : no_hp,
				'unit' : unit,
				'dokter' : dokter,
				'penjamin' : penjamin,
				'tgl' : tgl
			};
			$.ajax({
				url: "Form_pendaftaran_online/savedaftar",
				type: "post",
				data: form,
				dataType : 'json',
				success: function (response) {
					alert(response);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
					alert('Failed Save Data');
				}
			});
		}
        else{
			alert('Mohon Pilih Jenis Pasien !!!');
		}
    }); 
	$("#id_poli_tujuan").on('change',function(){
		var unit = $("#id_poli_tujuan").val();
		var form = {
			'unit' : unit
        };
		$.ajax({
			url: "Form_pendaftaran_online/dtparamedis",
			type: "post",
			data: form,
			dataType : 'json',
			success: function (response) {
				$('#id_dokter').empty();
				var para = '';
				para += '<option value="-"> Pilih Dokter </option>';
				$.each(response , function(index, val) { 
					para += '<option value="'+val.kd_paramedis+'">'+val.nama_paramedis+'</option>';
				});
				$('#id_dokter').append(para);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				alert('Failed Get Data');
			}
		});
	});
	$("input[type=radio][name=optradio]").on('change',function(){
		$("#id_no_rm").val('');
		$("#id_nama_lengkap").val('');
		$("#id_jenis_kelamin").val('-');
		$("#id_tempat_lahir").val('');
		$("#id_tgl_lahir").val('');
		$("#id_jalan").val('');
		$("#id_nohp").val('');
		$("#id_poli_tujuan").val('-');
		$("#id_dokter").val('-');
		$("#id_penjamin").val('-');
		$("#id_tgl_rencana").val('');
		if(this.value=='baru'){
			$("#id_no_rm").prop("disabled",true);
			$("#id_nama_lengkap").prop("disabled",false);
			$("#id_jenis_kelamin").prop("disabled",false);
			$("#id_tempat_lahir").prop("disabled",false);
			$("#id_tgl_lahir").prop("disabled",false);
			$("#id_jalan").prop("disabled",false);
			$("#id_nohp").prop("disabled",false);
			$("#id_poli_tujuan").prop("disabled",false);
			$("#id_dokter").prop("disabled",false);
			$("#id_penjamin").prop("disabled",false);
			$("#id_tgl_rencana").prop("disabled",false);
		}else if(this.value=='lama'){
			$("#id_no_rm").prop("disabled",false);
			$("#id_nama_lengkap").prop("disabled",true);
			$("#id_jenis_kelamin").prop("disabled",true);
			$("#id_tempat_lahir").prop("disabled",true);
			$("#id_tgl_lahir").prop("disabled",true);
			$("#id_jalan").prop("disabled",true);
			$("#id_nohp").prop("disabled",true);
			$("#id_poli_tujuan").prop("disabled",false);
			$("#id_dokter").prop("disabled",false);
			$("#id_penjamin").prop("disabled",false);
			$("#id_tgl_rencana").prop("disabled",false);
		}
	});
	$("#id_no_rm").keydown(function (e) {
		if (e.keyCode == 13) {
			var nilai = this.value;
			var panjang = nilai.length;
			if(panjang==7){
				var rm = nilai.slice(0,1)+"-"+nilai.slice(1,3)+"-"+nilai.slice(3,5)+"-"+nilai.slice(5,7);
				$("#id_no_rm").val(rm);
				var form = {
					'rm' : rm
				};
				$.ajax({
					url: "Form_pendaftaran_online/dtpasien",
					type: "post",
					data: form,
					dataType : 'json',
					success: function (response) {
						$.each(response , function(index, val) { 
							$("#id_nama_lengkap").val(val.nama_pasien);
							$("#id_jenis_kelamin").val(val.kd_jenis);
							$("#id_tempat_lahir").val(val.tempat_lahir);
							$("#id_tgl_lahir").val(val.tanggal_lahir);
							$("#id_jalan").val(val.telpon);
							$("#id_nohp").val(val.alamat);
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
						alert('Failed Get Data');
					}
				});
			}else{
				alert("Masukkan 7 digit no medical record !!!");
			}
		}
	});
</script>
