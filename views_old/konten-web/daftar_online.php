<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.classyqr.js"></script>


<style type="text/css">
/*Penghalang*/
.penghalang {
	display: none;
	position: fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: rgba(0,0,0,0.4);
}

.petunjuk_daftar{
	font-family: 'Bitter', serif;
	color: #2d2d2d;
	line-height: 1.2;
	margin-top: 0;
	margin-bottom: 10px;
	padding: 0;
	text-transform: capitalize;
	font-weight: 0;
}

.cara_daftar{
	font-family: 'Bitter', serif;
	color: #2d2d2d;
	line-height: 1.2;
	margin-top: 0;
	margin-bottom: 10px;
	padding: 0;
	text-transform: capitalize;
	font-weight: 0;
	font-weight: 0;
	text-transform: none;
}
.back_petunjuk{
	background-color: #ffe5bf;
	width: auto;
	padding: 3%;
}

.resume_pasien{
	background-color: #ffcece;
	width: auto;
	padding: 3%;
}

@media only screen and (min-width: 480px) and (max-width: 767px) {
	.modal-content {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 90%;
	}
}

/* default tablet layout */
@media only screen and (min-width: 768px) and (max-width: 991px) {
	.modal-content {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 55%;
	}
}

/* default monitor layout */
@media only screen and (min-width: 992px) {
	.modal-content {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 35%;
	}
}
/*Modal */


/*Tombol X*/
#tutup {
	color: #aaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
}

#tutup:hover,
#tutup:focus {
	color: black;
	cursor: pointer;
}

/*Progress*/
@media handheld, screen and (max-width: 400px) {
	.progress-indicator.stacked {
		display: block;
		width: 100%;
	}
	.progress-indicator.stacked > li {
		height: 80px;
	}
}

.flexer,.progress-indicator {
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex
}


.flexer-element,.progress-indicator>li {
	-ms-flex: 1;
	-webkit-flex: 1;
	-moz-flex: 1;
	flex: 1
}

.progress-indicator>li {
	list-style: none;
	text-align: center;
	width: auto;
	padding: 0;
	margin: 0;
	position: relative;
	text-overflow: ellipsis;
	color: #bbb;
	display: block
}

.progress-indicator>li.completed,.progress-indicator>li.completed .bubble {
	color: #65d074
}

.progress-indicator>li .bubble {
	border-radius: 1000px;
	width: 20px;
	height: 20px;
	background-color: #bbb;
	display: block;
	margin: 0 auto .5em;
	border-bottom: 1px solid #888
}

.progress-indicator>li .bubble:after,.progress-indicator>li .bubble:before {
	display: block;
	position: absolute;
	top: 9px;
	width: 100%;
	height: 3px;
	content: '';
	background-color: #bbb
}

.progress-indicator>li.completed .bubble,.progress-indicator>li.completed .bubble:after,.progress-indicator>li.completed .bubble:before {
	background-color: #65d074;
	border-color: #247830
}

.progress-indicator>li .bubble:before {
	left: 0
}

.progress-indicator>li .bubble:after {
	right: 0
}

.progress-indicator>li:first-child .bubble:after,.progress-indicator>li:first-child .bubble:before {
	width: 50%;
	margin-left: 50%
}

.progress-indicator>li:last-child .bubble:after,.progress-indicator>li:last-child .bubble:before {
	width: 50%;
	margin-right: 50%
}

.progress-indicator>li.active,.progress-indicator>li.active .bubble {
	color: #337AB7
}

.progress-indicator>li.active .bubble,.progress-indicator>li.active .bubble:after,.progress-indicator>li.active .bubble:before {
	background-color: #337AB7;
	border-color: #122a3f
}


@media handheld,screen and (max-width: 400px) {
	.progress-indicator {
		font-size:60%
	}
}

/* Make circles that indicate the steps of the form: */
.step {
	height: 15px;
	width: 15px;
	margin: 0 2px;
	background-color: #bbbbbb;
	border: none;  
	border-radius: 50%;
	display: inline-block;
	opacity: 0.5;
}

.step.active {
	opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
	background-color: #4CAF50;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
	background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab_daftar {
	display: none;
}

#prevBtn {
	background-color: #9c9c9c;
}

</style>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">
					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend style="color: red"><strong>Lakukan Pendaftaran Online Untuk Kemudahan Pelayanan Pemeriksaan Anda di RS PKU</strong></legend>
								<!-- <p style="color: red"><span style="color: red">*</span> Mohon maaf untuk saat ini pendaftaran dapat dilakukan di Aplikasi android RSMU EYE CARE, karena pendafataran via web sedang maintenance</p> -->
								<div class="back_petunjuk">
									<div class="section-title-col petunjuk_daftar">
										<p>Perhatikan dan baca petunjuk pendaftaran online dengan cermat sebelum melakukan pendaftaran online:</p>
									</div>
									<div class="cara_daftar" >
										<p>1. Pendaftaran dapat dilakukan 1 s.d. 2 HARI sebelum pemeriksaan.</p>
										<p>2. Bagi Pasien Lama silahkan memilih Pasien Lama dan diharapkan mempersiapkan Nomer Rekam Medik yang ada di kartu pasien RS PKU.</p>
										<p>3. Bagi Pasien Baru diharapkan mengisi form sesuai identitas diri.</p>
										<p>4. Setelah mememilih jenis pasien, pasien memilih kelompok pasien Poliklinik atau VIP Ekskutif.</p>
										<p>5. Bagi Pasien Poliklinik, selanjutnya memilih kategori penjamin UMUM atau BPJS</p>
										<p>6. Bagi pasien yang sudah mendaftar secara online akan mendapatkan nomor antrian digital untuk aktivasi saat pemeriksaan ke rumah sakit.</p>
										<p>7. Pasien yang sudah mendaftar online, diharapkan datang sesuai waktu pada nomor antrian digital.</p>
										<p>8. Pasien yang sudah mendapatkan nomor antrian aktivasi, akan dipanggil sesuai urutan nomor antrian.</p>
									</div>
								</div>
								
								<br/>

								<form id="regForm">
									<div class="form-group tab_daftar" id="status_pasien">
										<ul class="progress-indicator">
											<li class="active">
												<span class="bubble"></span>
												Step 1. <br><small>Pilih Kategori Pasien</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 2. <br><small>(complete)</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 3. <br><small>(active)</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 4.
											</li>
										</ul>
										<br/>
										<br/>
										<center>
											<a onclick="pasien_lama()" style="color: #ffffff;background-color: red;padding: 15px;"> Pasien Lama
											</a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="pasien_baru()" style="color: #ffffff;background-color: #cf10b8;padding: 15px;"> Pasien Baru
											</a>
										</center>
									</div>

									<div class="tab_daftar">
										<ul class="progress-indicator">
											<li class="completed">
												<span class="bubble"></span>
												Step 1. <br><small>Pilih Kategori Pasien</small>
											</li>
											<li class="active">
												<span class="bubble"></span>
												Step 2. <br><small>Masukkan Identitas Pasien</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 3. <br><small>(active)</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 4.
											</li>
										</ul>
										<br/>
										<br/>

										<div class="form-group" id="status_pasien_baru">
											<div class="form-group">
												<div class="col-md-6 col-lg-6 col-sm-6">
													<input type="text" class="form-control" id="nama_pasien_baru" name="nama_pasien_baru" placeholder="Nama Pasien (*)">
												</div>
												<div class="col-md-6 col-lg-6 col-sm-6">
													<input type="text" class="form-control" id="alamat_pasien_baru" name="alamat_pasien_baru" placeholder="Alamat Pasien (*)">
												</div>
												<div class="col-md-3 col-lg-3 col-sm-3">
													<input type="text" class="form-control" name="telepon_pasien_baru" id="telepon_pasien_baru" placeholder="Telepon Pasien Baru (*)">
												</div>
												<div class="col-md-3 col-lg-3 col-sm-3">
													<input type="date" class="form-control" name="tanggal_lahir_baru" id="tanggal_lahir_baru" placeholder="Tanggal Lahir (*)">
												</div>
												<div class="col-md-2 col-lg-2 col-sm-2">
													<input type="text" class="form-control" name="usia_baru" id="usia_baru" placeholder="Umur" disabled>
												</div>
												<div class="col-md-4 col-lg-4 col-sm-4">
													<select  name="jenis_kelamin_baru" id="jenis_kelamin_baru" class="form-control">
														<option value="1">Laki-Laki</option>
														<option value="0">Perempuan</option>
													</select >
												</div>
												<div class="form-group">
													<div class="col-md-12 col-lg-12 col-sm-12">
														<label>Pilih tanggal Pendaftaran</label>
													</div>
													<div class="col-md-12 col-lg-12 col-sm-12">
														<input type="date" class="form-control" name="tanggal_daftar_baru" id="tanggal_daftar_baru" placeholder="Pilih tanggal" min="" max="">
													</div>
												</div>	

											</div>

										</div>

										<div class="form-group" id="status_pasien_lama">
											<div class="form-group">
												<div class="col-md-12 col-lg-12 col-sm-12">
													<label>Masukkan No Rekam Medis Pasien</label>
												</div>
												<div class="col-md-10 col-lg-10 col-sm-10">
													<input type="text" class="form-control" id="medical_record" name="medical_record" placeholder="No Rekam Medis Pasien (*)">
												</div>
												<div class="col-md-2 col-lg-2 col-sm-2">
													<a onclick="cek_rekam_medis()" id="cek_rekam_medis" name="cek_rekam_medis" class="btn btn-warning">Cek Rekam Medis</a>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-6 col-lg-6 col-sm-6">
													<input type="text" class="form-control" name="nama_pesien" id="nama_pesien" placeholder="Nama Pasien" disabled>
												</div>
												<div class="col-md-6 col-lg-6 col-sm-6">
													<input type="text" class="form-control" name="alamat_pasien" id="alamat_pasien" placeholder="Alamat Pasien" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12 col-lg-12 col-sm-12">
													<label>Pilih tanggal</label>
												</div>
												<div class="col-md-12 col-lg-12 col-sm-12">
													<input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Pilih tanggal" min="" max="">
												</div>
											</div>	
										</div>
									</div>

									<div class="form-group tab_daftar" id="jenis_pelayanan">
										<ul class="progress-indicator">
											<li class="completed">
												<span class="bubble"></span>
												Step 1. <br><small>Pilih Kategori Pasien</small>
											</li>
											<li class="completed">
												<span class="bubble"></span>
												Step 2. <br><small>Masukkan Identitas Pasien</small>
											</li>
											<li class="active">
												<span class="bubble"></span>
												Step 3. <br><small>Pilih Jenis Pelayanan dan Penjamin Pendaftaran</small>
											</li>
											<li>
												<span class="bubble"></span>
												Step 4.
											</li>
										</ul>
										<br/>
										<br/>
										<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
											<center>
												<a onclick="eksekutif()"> <i class="fa fa-address-card fa-4" 
													style="font-size: 2em;" aria-hidden="true"></i> RESERVASI EKSEKUTIF
												</a>
											</center>								
										</div>
										<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
											<a onclick="poliklinik()" style="color: green;"> 
												<i class="fa fa-building fa-4"
												style="font-size: 2em;color: green;" aria-hidden="true"></i> RESERVASI POLIKLINIK
											</a>
										</div>
										<div id="reservasi_penjamin" style="display: none">									
											<div class="form-group">
												<div class="col-md-12 col-lg-12 col-sm-12">
													<label style="color: #0095ff;">Penjamin</label>
												</div>
												<hr>
												<div class="col-md-12 col-lg-12 col-sm-12">
													<label>
														<input type="checkbox" name="bpjs" id="bpjs"
														onclick="pilih_penjamin_bpjs()" value="BPJS">&nbsp;&nbsp; BPJS
													</label>&nbsp;&nbsp;
													<label>
														<input type="checkbox" name="umum" id="umum" onclick="pilih_penjamin_umum()"
														value="UMUM">&nbsp;&nbsp; UMUM
													</label>
												</div>										
											</div>
											<div id="penjamin_bpjs" style="display:none;">
												<div class="form-group">
													<div class="col-md-10 col-lg-10 col-sm-10">
														<input type="text" class="form-control" id="no_kartu_bpjs" name="no_kartu_bpjs" placeholder="No Kartu BPJS (*)">
													</div>
													<div class="col-md-2 col-lg-2 col-sm-2">
														<a onclick="cek_kartu_pasien()" class="btn btn-danger">Cek Keaktifan</a>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12 col-lg-12 col-sm-12">
														<input type="text" class="form-control" id="status_aktif_kartu" name="status_aktif_kartu" placeholder="Status Keaktfian kartu BPJS (*)" disabled>
													</div>	
												</div>

												<div class="form-group">
													<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
														<label style="color: #0095ff;">Asal Rujukan</label>
													</div>
												</div>
												<br/>
												<hr>
												<div class="form-group">
													<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
														<label><input type="checkbox" id="puskesmas" name="puskesmas" onclick="pilih_puskesmas()" value="puskesmas">&nbsp;&nbsp; Puskesmas </label>
														&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="rumah_sakit" id="rumah_sakit" 
															onclick="pilih_rumah_sakit()" value="rumah_sakit">&nbsp;&nbsp; Rumah Sakit</label>	
														</div>									
													</div>
													<br/>
													<br/>

													<div class="form-group">
														<div class="col-md-10 col-lg-10 col-sm-10">
															<input type="text" class="form-control" id="no_rujukan" name="no_rujukan" placeholder="No Rujukan (*)">
														</div>
														<div class="col-md-2 col-lg-2 col-sm-2">
															<a onclick="cek_rujukan()" class="btn btn-danger">Cek Status Rujukan</a>
														</div>
													</div>
													<div class="form-group">
														<div class="col-md-12 col-lg-12 col-sm-12">
															<input type="text" class="form-control" id="status_aktif_rujukan" name="status_aktif_rujukan" placeholder="Status Keaktfian no Rujukan (*)" disabled>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12">
															<input type="text" class="form-control" id="asal_nama_rujukan" name="asal_nama_rujukan" placeholder="Asal Nama Rujukan (*)" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group" style="display: none">
											<div class="col-md-3 col-lg-3 col-sm-3">
												<input type="text" class="form-control" name="status_pasien_value" id="status_pasien_value" placeholder="Status Pasien" disabled>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-3">
												<input type="text" class="form-control" name="id_kel_pasien" id="id_kel_pasien" placeholder="Kelompok Pasien" disabled>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-3">
												<input type="text" class="form-control" name="kd_detkelpenjamin" id="kd_detkelpenjamin" placeholder="Detail Kelompok Penjamin" disabled>
											</div>
										</div>									
										<div class="col-md-12 col-lg-12 col-sm-12 tab_daftar" style="margin-top: 25px;display: none" id="tombol_action">
											<ul class="progress-indicator">
												<li class="completed">
													<span class="bubble"></span>
													Step 1. <br><small>Pilih Kategori Pasien</small>
												</li>
												<li class="completed">
													<span class="bubble"></span>
													Step 2. <br><small>Masukkan Identitas Pasien</small>
												</li>
												<li class="completed">
													<span class="bubble"></span>
													Step 3. <br><small>Pilih Jenis Pelayanan dan Penjamin Pendaftaran</small>
												</li>
												<li class="active">
													<span class="bubble"></span>
													Step 4.<br><small>Completed !!, Cek kembali, dan tekan Daftar Antrian</small>
												</li>
											</ul>
											<br/>																					
											
											<div class="resume_pasien">
												<table>
													<center><h4 style="font-weight: bold">IDENTITAS PENDAFTARAN PASIEN</h4></center>
													<tr>
														<td><p>Jenis Pasien</p></td>
														<td id="jenis_pasien_resume"></td>
													</tr>
													<tr>
														<td><p>Kelompok Pasien</p></td>
														<td id="kelompok_pasien_resume"></td>
													</tr>
													<tr id="medical_record_resume_group" style="display: none;">
														<td><p>No Medical Record</p></td>
														<td id="medical_record_resume"></td>
													</tr>
													<tr>
														<td><p>Nama Pasien</p></td>
														<td id="nama_pesien_resume"></td>
													</tr>
													<tr>
														<td><p>Alamat Pasien</p></td>
														<td id="alamat_pasien_resume"></td>
													</tr>
													<tr id="tanggal_lahir_resume_group" style="display: none;">
														<td><p>Tanggal Lahir</p></td>
														<td id="tanggal_lahir_resume"></td>
													</tr>
													<tr>
														<td><p>Tanggal Pendaftaran</p></td>
														<td id="tgl_daftar_resume"></td>
													</tr>
													<tr>
														<td><p>Jenis Penjamin</p></td>
														<td id="penjamin_resume"></td>
													</tr>
													<tr id="no_kartu_bpjs_resume_group" style="display: none;">
														<td><p>No Kartu BPJS</p></td>
														<td id="no_kartu_bpjs_resume"></td>
													</tr>
													<tr id="no_rujukan_bpjs_resume_group" style="display: none;">
														<td><p>No Rujukan BPJS</p></td>
														<td id="no_rujukan_bpjs_resume"></td>
													</tr>
													<tr id="asal_rujukan_bpjs_resume_group" style="display: none;">
														<td><p>Asal Rujukan</p></td>
														<td id="asal_rujukan_bpjs_resume"></td>
													</tr>
												</table>
											</div>	
											<br/>
											<br/>
											<label>
												<input type="checkbox" name="check_akurat_data" id="check_akurat_data" >&nbsp;&nbsp; Saya yakin bahwa data di atas adalah informasi akurat, lengkap, dan terbaru tentang saya
											</label>	
											<br/>
											<a onclick="simpan()" class="btn btn-info">Daftar Antrian</a>
											<a onclick="reset()" class="btn btn-danger">Reset</a>
											<a class="btn btn-info" style="background-color: #9c9c9c" onclick="nextPrev_back(-1)">Previous</a>
										</div>

										<br/>
										<br/>
										<div>
											<div style="float:left;">
												<button type="button" class="btn btn-info" id="prevBtn" onclick="nextPrev_back(-1)">Previous</button>
												<button type="button" class="btn btn-warning" id="nextBtn" onclick="nextPrev_go(1)">Next</button>
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

	<div id="myModal" class="penghalang">
		<div class="modal-content">
			<span id="tutup">&times;</span>
			<center><p style="background-color: #00a1ff;color: white;">Bukti Reservasi</p></center>
			<center><img src="http://pendaftaran.rsmataundaan.co.id/pendaftaran_web/images/logo_rs_bawah.png" style="width: 12%;margin-bottom: 2%; margin-top: 2%"></center>
			<table class="table table-stripped" style="margin-bottom: 0px;">
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">No Antrian</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="no_antrian_modal"></p></td>
				</tr>
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">Tanggal</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="tanggal_antrian_modal"></p></td>
				</tr>
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">Waktu</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="waktu_antrian_modal"></p></td>
				</tr>
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">No RM</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="medical_record_antrian_modal"></p></td>
				</tr>
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">Nama Pasien</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="nama_pasien_antrian_modal"></p></td>
				</tr>
				<tr>
					<td width="40%"><p style="font-weight: 600;font-family: initial;margin-left: 55%">Layanan</p></td>
					<td width="40%"><p style="font-weight: 600;font-family: cursive;" id="layanan_antrian_modal"></p></td>
				</tr>
			</table>
			<center>
				<div id="qr2"></div>
			</center>
			<p style="color: red">** Silahkan Capture / Screen Shoot Bukti Ini untuk dilampirkan saat kedatangan pendaftaran</p>
			<br/>
			<!-- <a onclick="cetak_bukti()" class="btn btn-info">Simpan Bukti Reservasi</a> -->
			<br/>
			<br/>
			<h5>KETENTUAN : </h5>
			<!-- <br/> -->
			<!-- <p>***) Jika pasien datang melebihi jam kedatangan dan antrian sudah terlewati maka no antrian tidak berlaku, pasien harap mengambil antrian ulang </p> -->
			<p>***) Batas kedatangan sesuai dengan jam operasional pendaftaran poliklinik </p>
			<br/>
			<p>BPJS : </p>
			<p>Senin - Kamis : 06.00 - 11.30</p>
			<p>Jumat : 06.00 - 11.00</p>
			<p>Sabtu : 06.00 - 10.30</p>
			<br/>
			<p></p>
			<p>UMUM : </p>
			<p>Senin - Jumat : 07.00 - 12.30</p>
			<p>Sabtu : 07.00 - 11.30</p>

		</div>
	</div>


	<script type="text/javascript">

		var modal = document.getElementById('myModal');
		var tutup = document.getElementById("tutup");
		var tanggal_lahir_baru = document.getElementById("tanggal_lahir_baru");

		tutup.onclick = function() {
			modal.style.display = "none";
			window.location.reload();
		}

		tanggal_lahir_baru.onchange = function() {
			var date = document.getElementById('tanggal_lahir_baru').value;
			var today = new Date();
			var birthday = new Date(date);
			var year = 0;
			if (today.getMonth() < birthday.getMonth()) {
				year = 1;
			} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
				year = 1;
			}
			var age = today.getFullYear() - birthday.getFullYear() - year;

			if(age < 0){
				age = 0;
			}
			// alert(age);
			document.getElementById("usia_baru").value = age +' Tahun';
		}

		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab

		function showTab(n) {
  			// This function will display the specified tab of the form...
  			var x = document.getElementsByClassName("tab_daftar");
  			x[n].style.display = "block";
  			//... and fix the Previous/Next buttons:
  			if (n == 0) {
  				document.getElementById("prevBtn").style.display = "none";
  				document.getElementById("nextBtn").style.display = "none";
  			} else if(n == 3){
  				document.getElementById("prevBtn").style.display = "none";
  				document.getElementById("nextBtn").style.display = "none";
  			}else {
  				document.getElementById("prevBtn").style.display = "inline";
  				document.getElementById("nextBtn").style.display = "inline";
  			}
  			// if (n == (x.length - 1)) {
  			// 	document.getElementById("nextBtn").innerHTML = "Submit";
  			// } else {
  			// 	document.getElementById("nextBtn").innerHTML = "Next";
  			// }
 			//... and run a function that will display the correct step indicator:
 			fixStepIndicator(n)
 		}

 		function fixStepIndicator(n) {
  			// This function removes the "active" class of all steps...
  			var i, x = document.getElementsByClassName("step");
  			for (i = 0; i < x.length; i++) {
  				x[i].className = x[i].className.replace(" active", "");
  			}
  			//... and adds the "active" class on the current step:
  			x[n].className += " active";
  		}


  		function reset(){
  			window.location.reload();
  		}
  		function pasien_baru(n = 1) {
  			alert('Maaf untuk sementara, pendaftaran via online hanya untuk Pasien Lama RS PKU');

			// // This function will figure out which tab to display
			// var x = document.getElementsByClassName("tab_daftar");
  	// 		// Exit the function if any field in the current tab is invalid:
  	// 		// Hide the current tab:
  	// 		x[currentTab].style.display = "none";
  	// 		// Increase or decrease the current tab by 1:
  	// 		currentTab = currentTab + n;  			
  	// 		// if you have reached the end of the form...
  	// 		if (currentTab >= x.length) {
   //  			// ... the form gets submitted:
   //  			document.getElementById("regForm").submit();
   //  			return false;
   //  		}
   //  		var w = document.getElementById("status_pasien");
   //  		var x = document.getElementById("status_pasien_lama");
   //  		var y = document.getElementById("status_pasien_baru");
   //  		document.getElementById("medical_record_resume_group").style.display = "none";
   //  		document.getElementById("tanggal_lahir_resume_group").style.display = "revert";
   //  		w.style.display = "none";
   //  		y.style.display = "block";
   //  		x.style.display = "none";
   //  		document.getElementById("status_pasien_value").value = "0";
   //  		document.getElementById("medical_record").value = "";
   //  		document.getElementById("nama_pesien").value = "";
   //  		document.getElementById("alamat_pasien").value = "";
   //  		document.getElementById("kelompok_pasien_resume").innerHTML = "";
   //  		document.getElementById("nama_pesien_resume").innerHTML = "";
   //  		document.getElementById("alamat_pasien_resume").innerHTML = "";
   //  		document.getElementById("medical_record_resume").innerHTML = "";
   //  		document.getElementById("tanggal_lahir_resume").innerHTML = "";
   //  		document.getElementById("tgl_daftar_resume").innerHTML = "";
   //  		document.getElementById("penjamin_resume").innerHTML = "";
   //  		document.getElementById("no_kartu_bpjs_resume").innerHTML = "";
   //  		document.getElementById("no_rujukan_bpjs_resume").innerHTML = "";
   //  		document.getElementById("asal_rujukan_bpjs_resume").innerHTML = "";
   //  		document.getElementById("jenis_pasien_resume").innerHTML = '&nbsp; : PASIEN BARU';
   //  		document.getElementById("no_kartu_bpjs").value = "";
   //  		document.getElementById("status_aktif_kartu").value = "";
   //  		document.getElementById("no_rujukan").value = "";
   //  		document.getElementById("status_aktif_rujukan").value = "";
   //  		document.getElementById("asal_nama_rujukan").value = "";
   //  		document.getElementById("id_kel_pasien").value = "";
   //  		var x = document.getElementById("reservasi_penjamin");
   //  		x.style.display = "none";
   //  		var c = document.getElementById("penjamin_bpjs");
   //  		c.style.display = "none";
   //  		$('#rumah_sakit').prop('checked', false);
   //  		$('#puskesmas').prop('checked', false);
   //  		$('#bpjs').prop('checked', false);
   //  		$('#umum').prop('checked', false);		
  	// 		// Otherwise, display the correct tab:
  	// 		showTab(currentTab);
  }  		

  function pasien_lama(n = 1){
  	// alert('Maaf untuk saat ini, pendaftaran hanya dapat dilakukan di Aplikasi android RSMU EYE CARE');
  			// This function will figure out which tab to display
  			var x = document.getElementsByClassName("tab_daftar");
  			// Exit the function if any field in the current tab is invalid:
  			// Hide the current tab:
  			x[currentTab].style.display = "none";
  			// Increase or decrease the current tab by 1:
  			currentTab = currentTab + n;  			
  			// if you have reached the end of the form...
  			if (currentTab >= x.length) {
    			// ... the form gets submitted:
    			document.getElementById("regForm").submit();
    			return false;
    		}
    		var w = document.getElementById("status_pasien");
    		var x = document.getElementById("status_pasien_lama");
    		var y = document.getElementById("status_pasien_baru");
    		document.getElementById("medical_record_resume_group").style.display = "revert";
    		document.getElementById("tanggal_lahir_resume_group").style.display = "none";
    		w.style.display = "none";
    		y.style.display = "none";
    		x.style.display = "block";
    		document.getElementById("status_pasien_value").value = "1";
    		document.getElementById("nama_pasien_baru").value = "";
    		document.getElementById("alamat_pasien_baru").value = "";
    		document.getElementById("tanggal_lahir_baru").value = "";
    		document.getElementById("telepon_pasien_baru").value = "";
    		document.getElementById("kelompok_pasien_resume").innerHTML = "";
    		document.getElementById("nama_pesien_resume").innerHTML = "";
    		document.getElementById("alamat_pasien_resume").innerHTML = "";
    		document.getElementById("medical_record_resume").innerHTML = "";
    		document.getElementById("tanggal_lahir_resume").innerHTML = "";
    		document.getElementById("tgl_daftar_resume").innerHTML = "";
    		document.getElementById("penjamin_resume").innerHTML = "";
    		document.getElementById("no_kartu_bpjs_resume").innerHTML = "";
    		document.getElementById("no_rujukan_bpjs_resume").innerHTML = "";
    		document.getElementById("asal_rujukan_bpjs_resume").innerHTML = "";
    		document.getElementById("id_kel_pasien").value = "";
    		document.getElementById("jenis_pasien_resume").innerHTML = "&nbsp; : PASIEN LAMA";
    		document.getElementById("no_kartu_bpjs").value = "";
    		document.getElementById("status_aktif_kartu").value = "";
    		document.getElementById("no_rujukan").value = "";
    		document.getElementById("status_aktif_rujukan").value = "";
    		document.getElementById("asal_nama_rujukan").value = "";
    		var x = document.getElementById("reservasi_penjamin");
    		x.style.display = "none";
    		var c = document.getElementById("penjamin_bpjs");
    		c.style.display = "none";
    		$('#rumah_sakit').prop('checked', false);
    		$('#puskesmas').prop('checked', false);
    		$('#bpjs').prop('checked', false);
    		$('#umum').prop('checked', false);	
  			// Otherwise, display the correct tab:
  			showTab(currentTab);
  		}

  		function nextPrev_go(n) {
  			// alert('HEELO');
  			var status_pasien_value = document.getElementById("status_pasien_value").value;
  			var nama_pasien_baru = document.getElementById("nama_pasien_baru").value;
  			var alamat_pasien_baru = document.getElementById("alamat_pasien_baru").value;
  			var telepon_pasien_baru = document.getElementById("telepon_pasien_baru").value;
  			var tanggal_daftar_baru = document.getElementById("tanggal_daftar_baru").value;
  			var tanggal_lahir_baru = document.getElementById("tanggal_lahir_baru").value;

  			// Pasien Lama
  			var medical_record = document.getElementById("medical_record").value;
  			var nama_pesien = document.getElementById("nama_pesien").value;
  			var alamat_pasien = document.getElementById("alamat_pasien").value;
  			var tanggal_daftar = document.getElementById("tanggal_daftar").value;

  			// Penjamin pasien
  			var id_kel_pasien = document.getElementById("id_kel_pasien").value;
  			var bpjs = document.getElementById("bpjs").checked;
  			var umum = document.getElementById("umum").checked;

  			// Penjamin BPJS
  			var no_kartu_bpjs = document.getElementById("no_kartu_bpjs").value;
  			var status_aktif_kartu = document.getElementById("status_aktif_kartu").value;
  			var no_rujukan = document.getElementById("no_rujukan").value;
  			var status_aktif_rujukan = document.getElementById("status_aktif_rujukan").value;

  			if (status_pasien_value == '0') {
  				if (nama_pasien_baru == '' || nama_pasien_baru == undefined) {
  					alert('Silahkan Memasukkan Nama Pasien');
  					return false;
  				}else if(alamat_pasien_baru == '' || alamat_pasien_baru == undefined){
  					alert('Silahkan Memasukkan Alamat Pasien');
  					return false;
  				}else if(telepon_pasien_baru == '' || telepon_pasien_baru == undefined){
  					alert('Silahkan Memasukkan Tempat Lahir Pasien Pasien');
  					return false;
  				}else if (tanggal_lahir_baru == '' || tanggal_lahir_baru == undefined) {
  					alert('Silahkan Memasukkan Tanggal Lahir Pasien');
  					return false;
  				}else if (tanggal_daftar_baru == '' || tanggal_daftar_baru == undefined) {
  					alert('Silahkan Memilih Tanggal Pendaftaran');
  					return false;
  				}else{
  					document.getElementById("medical_record_resume").innerHTML = "&nbsp; : - ";
  					document.getElementById("nama_pesien_resume").innerHTML = "&nbsp; : "+nama_pasien_baru;
  					document.getElementById("alamat_pasien_resume").innerHTML = "&nbsp; : "+alamat_pasien_baru;
  					document.getElementById("tgl_daftar_resume").innerHTML = "&nbsp; : "+tanggal_daftar_baru;
  					document.getElementById("tanggal_lahir_resume").innerHTML = "&nbsp; : "+tanggal_lahir_baru;
  				}
  			}else if(status_pasien_value == '1'){
  				if (nama_pesien == '' || nama_pesien == undefined) {
  					alert('Nama Tidak Ditemukan, Silahkan Memasukkan No. RM dengan Benar');
  					return false;
  				}else if (medical_record == '' || medical_record == undefined) {
  					alert('RM Tidak Ditemukan, Silahkan Memasukkan No. RM dengan Benar');
  					return false;
  				}else if (tanggal_daftar == '' || tanggal_daftar == undefined) {
  					alert('Silahkan Memilih Tanggal Pendaftaran');
  					return false;
  				}else{
  					document.getElementById("medical_record_resume").innerHTML = "&nbsp; : "+medical_record;
  					document.getElementById("nama_pesien_resume").innerHTML = "&nbsp; : "+nama_pesien;
  					document.getElementById("alamat_pasien_resume").innerHTML = "&nbsp; : "+alamat_pasien;
  					document.getElementById("tgl_daftar_resume").innerHTML = "&nbsp; : "+tanggal_daftar;
  				}
  			}

  			// This function will figure out which tab to display
  			var x = document.getElementsByClassName("tab_daftar");
  			// Exit the function if any field in the current tab is invalid:
  			// Hide the current tab:
  			if(currentTab == '2'){
  				if (id_kel_pasien == '1') {
  					if (bpjs == false && umum == false) {
  						alert('Silahkan Memilih Penjamin Pendaftaran');
  						return false;
  					}else if(bpjs == true){
  						if (status_aktif_kartu == '' || no_kartu_bpjs == '') {
  							alert('Silahkan Memasukkan No Kartu BPJS Anda');
  							return false;
  						}else if (status_aktif_rujukan == '' || no_rujukan == '') {
  							alert('Silahkan Memasukkan No Rujukan BPJS Anda');
  							return false;
  						}else if (status_aktif_kartu != 'AKTIF') {
  							alert('Maaf Kartu BPJS Anda Tidak Aktif');
  							return false;
  						}else if (status_aktif_rujukan != 'AKTIF') {
  							alert('Maaf Status Rujukan BPJS Anda Tidak Aktif');
  							return false;
  						}
  					}
  				}else if (id_kel_pasien == '2') {
  					alert('Maaf untuk saat ini, pendaftaran tidak dapat dilakukan'); //pendaftaran hanya dapat dilakukan di Aplikasi android RSMU EYE CARE
  					return false;
  				}else if (id_kel_pasien == null || id_kel_pasien == '') {
  					alert('Maaf Silahkan Memilih Jenis Pelayanan Pendaftaran');
  					return false;
  				}
  			}
  			x[currentTab].style.display = "none";
  			// Increase or decrease the current tab by 1:
  			currentTab = currentTab + n;
  			// if you have reached the end of the form...
  			if (currentTab >= x.length) {
    			// ... the form gets submitted:
    			document.getElementById("regForm").submit();
    			return false;
    		}
  			// Otherwise, display the correct tab:
  			showTab(currentTab);
  		}

  		function nextPrev_back(n) {
   			// This function will figure out which tab to display
   			var x = document.getElementsByClassName("tab_daftar");
  			// Exit the function if any field in the current tab is invalid:
  			// Hide the current tab:
  			x[currentTab].style.display = "none";
  			// Increase or decrease the current tab by 1:
  			currentTab = currentTab + n;
  			// if you have reached the end of the form...
  			if (currentTab >= x.length) {
    			// ... the form gets submitted:
    			document.getElementById("regForm").submit();
    			return false;
    		}
  			// Otherwise, display the correct tab:
  			showTab(currentTab);
  		}


  		function cetak_bukti(){
  			var no_antrian_modal = document.getElementById('no_antrian_modal').textContent;
  			var tanggal_antrian_modal = document.getElementById('tanggal_antrian_modal').textContent;
  			var waktu_antrian_modal = document.getElementById('waktu_antrian_modal').textContent;
  			var medical_record_antrian_modal = document.getElementById('medical_record_antrian_modal').textContent;
  			var nama_pasien_antrian_modal = document.getElementById('nama_pasien_antrian_modal').textContent;
  			var layanan_antrian_modal = document.getElementById('layanan_antrian_modal').textContent;

  			var url = '<?php echo base_url();?>index.php/konten/cetak_bukti?no_antrian_modal='+no_antrian_modal+'&tanggal_antrian_modal='+tanggal_antrian_modal+'&waktu_antrian_modal='+waktu_antrian_modal
  			+'&medical_record_antrian_modal='+medical_record_antrian_modal+'&nama_pasien_antrian_modal='+nama_pasien_antrian_modal+'&layanan_antrian_modal='+layanan_antrian_modal;
  			var win = window.open(url, '_blank');
  			win.focus();

  		}

  		function simpan(){
  			// alert('Maaf untuk saat ini, pendaftaran hanya dapat dilakukan di Aplikasi android RSMU EYE CARE');
  			var medical_record = document.getElementById("medical_record").value;
  			var nama_pesien = document.getElementById("nama_pesien").value;
  			var alamat_pasien = document.getElementById("alamat_pasien").value;
  			var tanggal_daftar = document.getElementById("tanggal_daftar").value;			
  			var status_pasien_value = document.getElementById("status_pasien_value").value;
  			var kd_detkelpenjamin = document.getElementById("kd_detkelpenjamin").value;
  			var no_kartu_bpjs = document.getElementById("no_kartu_bpjs").value;
  			var status_aktif_kartu = document.getElementById("status_aktif_kartu").value;
  			var no_rujukan = document.getElementById("no_rujukan").value;
  			var status_aktif_rujukan = document.getElementById("status_aktif_rujukan").value;
  			var asal_nama_rujukan = document.getElementById("asal_nama_rujukan").value;
  			var id_kel_pasien = document.getElementById("id_kel_pasien").value;
  			var bpjs = document.getElementById("bpjs").checked;
  			var umum = document.getElementById("umum").checked;
  			var nama_pasien_baru = document.getElementById("nama_pasien_baru").value;
  			var alamat_pasien_baru = document.getElementById("alamat_pasien_baru").value;
  			var telepon_pasien_baru = document.getElementById("telepon_pasien_baru").value;
  			var tanggal_daftar_baru = document.getElementById("tanggal_daftar_baru").value;
  			var tanggal_lahir_baru = document.getElementById("tanggal_lahir_baru").value;
  			var check_akurat_data = document.getElementById("check_akurat_data").checked;

  			if (status_pasien_value == '0') {

  				if (nama_pasien_baru == '' || nama_pasien_baru == undefined) {
  					alert('Silahkan Memasukkan Nama Pasien');
  				}else if(alamat_pasien_baru == '' || alamat_pasien_baru == undefined){
  					alert('Silahkan Memasukkan Alamat Pasien');
  				}else if(telepon_pasien_baru == '' || telepon_pasien_baru == undefined){
  					alert('Silahkan Memasukkan Tempat Lahir Pasien Pasien');
  				}else if (tanggal_lahir_baru == '' || tanggal_lahir_baru == undefined) {
  					alert('Silahkan Memasukkan Tanggal Lahir Pasien');
  				}else if (tanggal_daftar_baru == '' || tanggal_daftar_baru == undefined) {
  					alert('Silahkan Memilih Tanggal Pendaftaran');
  				}else if(check_akurat_data == false){
  					alert('Silahkan Menyetujui Keakuratan Data Pasien');
  				}
  				alert('Mohon Maaf, Jenis Pasien Baru RS PKU masih Dalam Pengembangan');
  			}else if(status_pasien_value == '1'){
  				if(check_akurat_data == false){
  					alert('Silahkan Menyetujui Keakuratan Data Pasien');
  				}else if (id_kel_pasien == '1') {
  					if (bpjs == false && umum == false) {
  						alert('Silahkan Memilih Penjamin Pendaftaran');
  					}else if(bpjs == true){
  						if (no_kartu_bpjs == '' || no_kartu_bpjs == undefined) {
  							alert('Silahkan Memasukkan No Kartu BPJS Anda');
  						}
  						else if (no_rujukan == '' || no_rujukan == undefined) {
  							alert('Silahkan Memasukkan No Rujukan BPJS Anda');
  						}
  						else if (status_aktif_kartu != 'AKTIF') {
  							alert('Maaf Kartu BPJS Anda Tidak Aktif');
  						}else if (status_aktif_rujukan != 'AKTIF') {
  							alert('Maaf Status Rujukan BPJS Anda Tidak Aktif');
  						}else{
  							simpan_poli();
  						}
  					}
  					else if(umum ==  true){
  						simpan_poli();
  					}
  					else{
  						simpan_poli();
  					}
  				}else if (id_kel_pasien == '2') {
  					alert('Maaf untuk saat ini, pendaftaran tidak dapat dilakukan'); //pendaftaran hanya dapat dilakukan di Aplikasi android RSMU EYE CARE
  				}else if (id_kel_pasien == null || id_kel_pasien == '') {
  					alert('Maaf Silahkan Memilih Jenis Pelayanan Pendaftaran');
  				}							
  			}
  		}

  		function convertDateDBtoIndo(string) {
  			bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

  			tanggal = string.split("-")[2];
  			bulan = string.split("-")[1];
  			tahun = string.split("-")[0];

  			return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
  		}

  		function simpan_poli(){
			// alert('Maaf untuk saat ini, pendaftaran hanya dapat dilakukan di Aplikasi android RSMU EYE CARE');
			var medical_record = document.getElementById("medical_record").value;
			var nama_pesien = document.getElementById("nama_pesien").value;
			var alamat_pasien = document.getElementById("alamat_pasien").value;
			var tanggal_daftar = document.getElementById("tanggal_daftar").value;
			var id_kel_pasien = document.getElementById("id_kel_pasien").value;
			var kd_detkelpenjamin = document.getElementById("kd_detkelpenjamin").value;
			var no_kartu_bpjs = document.getElementById("no_kartu_bpjs").value;
			var no_rujukan = document.getElementById("no_rujukan").value;
			var bpjs = document.getElementById("bpjs").checked;
			var umum = document.getElementById("umum").checked;
			var modal = document.getElementById('myModal');
			if(bpjs == true && umum == false){
				var kd_detkelpenjamin_new = '2';
			}else if(umum == true && bpjs == false){
				var kd_detkelpenjamin_new = '1';
			}else{
				alert('Silahkan Memilih Penjamin Pendaftaran');
			}

			var hari_daftar = $.ajax({
				type : "POST",
				url  : "<?php echo base_url(); ?>index.php/konten/hari_daftar",
				data : {
					tanggal_daftar: tanggal_daftar
				},
				async : false,
				success: function(data){
					
				},
				error:function(data)
				{
					$.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
				}
			}).responseText;
			if(hari_daftar == 'Sun'){
				alert('Mohon Maaf Hari Minggu Pelayanan Poliklinik Tutup');
				return;
			}

			var cek_kuota = $.ajax({
				type : "POST",
				url  : "<?php echo base_url(); ?>index.php/konten/cek_kuota",
				data : {
					tanggal_daftar: tanggal_daftar,
					id_kel_pasien: id_kel_pasien,
					kd_detkelpenjamin_new: kd_detkelpenjamin_new
				},
				async : false,
				success: function(data){
					
				},
				error:function(data)
				{
					$.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
				}
			}).responseText;
			if(cek_kuota == '1'){
				alert('Mohon Maaf Kuota Pendafaran Online di Tanggal Tersebut Sudah Habis, Anda Bisa Datang Langsung ke RS PKU Untuk Pendaftaran Secara Offline');
				return;
			}

			var rm_daftar = $.ajax({
				type : "POST",
				url  : "<?php echo base_url(); ?>index.php/konten/rm_daftar",
				data : {
					medical_record: medical_record,
					tanggal_daftar: tanggal_daftar,
					id_kel_pasien: id_kel_pasien,
					kd_detkelpenjamin_new: kd_detkelpenjamin_new
				},
				async : false,
				success: function(data){
					
				},
				error:function(data)
				{
					$.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
				}
			}).responseText;
			if(rm_daftar == 1){
				alert('Mohon Maaf Pasien Sudah Melakukan Pendaftaran di Tanggal Tersebut');
				return;
			}

			$.ajax({
				url : "<?php echo base_url();?>index.php/konten/simpan_poli",
				method : "POST",
				data : {
					medical_record: medical_record,
					nama_pesien: nama_pesien,
					alamat_pasien: alamat_pasien,
					tanggal_daftar: tanggal_daftar,
					id_kel_pasien: id_kel_pasien,
					kd_detkelpenjamin: kd_detkelpenjamin,
					no_kartu_bpjs: no_kartu_bpjs,
					no_rujukan: no_rujukan,
					kd_detkelpenjamin_new: kd_detkelpenjamin_new
				},
				datatype:'json',
				success: function(data){
					data= JSON.parse(data);
					document.getElementById("no_antrian_modal").innerHTML = data.initial;
					document.getElementById("tanggal_antrian_modal").innerHTML = convertDateDBtoIndo(tanggal_daftar);
					document.getElementById("waktu_antrian_modal").innerHTML = data.time_datang;
					document.getElementById("medical_record_antrian_modal").innerHTML = medical_record;
					document.getElementById("nama_pasien_antrian_modal").innerHTML = nama_pesien;
					document.getElementById("layanan_antrian_modal").innerHTML = data.layanan;
					
					$("#qr2").ClassyQR({
						create: true,
						type: 'text',
						text: medical_record
					});

					modal.style.display = "block"; 
				},
				error:function(data)
				{
					alert('Kesalahan input data, silahkan ulangi kembali');

				}
			});
		}

		function eksekutif() {			
			var x = document.getElementById("reservasi_penjamin");
			x.style.display = "none";
			var c = document.getElementById("penjamin_bpjs");
			c.style.display = "none";
			alert('Maaf, Layanan Eksekutif masih dalam pemeliharaan');
			document.getElementById("id_kel_pasien").value = "2";
			document.getElementById("kd_detkelpenjamin").value = "1";
			document.getElementById("kelompok_pasien_resume").innerHTML = "&nbsp; : VIP Eksekutif";
			document.getElementById("no_kartu_bpjs").value = "";
			document.getElementById("status_aktif_kartu").value = "";
			document.getElementById("no_rujukan").value = "";
			document.getElementById("status_aktif_rujukan").value = "";
			document.getElementById("asal_nama_rujukan").value = "";
			$('#rumah_sakit').prop('checked', false);
			$('#puskesmas').prop('checked', false);
			$('#bpjs').prop('checked', false);
			$('#umum').prop('checked', false);
			return false;
		}

		function poliklinik(){
			document.getElementById("id_kel_pasien").value = "1";
			document.getElementById("kelompok_pasien_resume").innerHTML = "&nbsp; : Poliklinik";
			// document.getElementById("kd_detkelpenjamin").value = "";
			var x = document.getElementById("reservasi_penjamin");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "block";
			}

		}

		function pilih_puskesmas(){
			$('#puskesmas').prop('checked', true);
			$('#rumah_sakit').prop('checked', false);

		}

		function pilih_rumah_sakit(){
			$('#rumah_sakit').prop('checked', true);
			$('#puskesmas').prop('checked', false);

		}

		function pilih_penjamin_bpjs(){
			$('#bpjs').prop('checked', true);
			$('#umum').prop('checked', false);
			document.getElementById("penjamin_resume").innerHTML = "&nbsp; : BPJS Kesehatan";
			document.getElementById("no_kartu_bpjs_resume_group").style.display = "revert";
			document.getElementById("no_rujukan_bpjs_resume_group").style.display = "revert";
			document.getElementById("asal_rujukan_bpjs_resume_group").style.display = "revert";
			document.getElementById("kd_detkelpenjamin").value = "2";
			var x = document.getElementById("penjamin_bpjs");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "block";
			}
		}

		function pilih_penjamin_umum(){
			$('#bpjs').prop('checked', false);
			$('#umum').prop('checked', true);
			document.getElementById("penjamin_resume").innerHTML = "&nbsp; : UMUM (Pribadi Perorangan)";
			document.getElementById("no_kartu_bpjs_resume").innerHTML = "-";
			document.getElementById("no_rujukan_bpjs_resume").innerHTML = "-";
			document.getElementById("asal_rujukan_bpjs_resume").innerHTML = "-";
			document.getElementById("no_kartu_bpjs_resume_group").style.display = "none";
			document.getElementById("no_rujukan_bpjs_resume_group").style.display = "none";
			document.getElementById("asal_rujukan_bpjs_resume_group").style.display = "none";
			document.getElementById("kd_detkelpenjamin").value = "1";
			var x = document.getElementById("penjamin_bpjs");
			x.style.display = "none";
			document.getElementById("no_kartu_bpjs").value ="";
			document.getElementById("status_aktif_kartu").value = "";
			document.getElementById("no_rujukan").value = "";
			document.getElementById("status_aktif_rujukan").value = "";
			document.getElementById("asal_nama_rujukan").value = "";
			$('#rumah_sakit').prop('checked', false);
			$('#puskesmas').prop('checked', false);

		}

		function cek_rekam_medis(){
			var medical_record = document.getElementById("medical_record").value;

			$.ajax({
				url : "<?php echo base_url();?>index.php/konten/cek_rekam_medis",
				method : "POST",
				data : {medical_record: medical_record},
				datatype:'json',
				success: function(data){
					if (medical_record.includes('APT') == true || medical_record.includes('apt') == true) {
						alert('Mohon maaf, masukkan No Rekam medis bukan no antrian apotik');
						document.getElementById("nama_pesien").value = "";
						document.getElementById("alamat_pasien").value = "";
					}				
					else if(data!=""){
						data= JSON.parse(data);
						document.getElementById("nama_pesien").value = data.nama_pasien;
						document.getElementById("alamat_pasien").value = data.alamat;	
					}else{
						alert('Data tidak ditemukan, silahkan cek kembali atau hubungi administrator');
						document.getElementById("nama_pesien").value = "";
						document.getElementById("alamat_pasien").value = "";
					}      
				},
				error:function(data)
				{
					alert('Kesalahan input data, silahkan ulangi kembali');
					document.getElementById("medical_record").value = "";
					document.getElementById("alamat_pasien").value = "";
					document.getElementById("nama_pesien").value = "";
				}
			});
		}

		function cek_rujukan(){
			var no_rujukan = document.getElementById("no_rujukan").value;
			var puskesmas = document.getElementById("puskesmas");
			var rumah_sakit = document.getElementById("rumah_sakit");
			var tanggal_daftar = document.getElementById("tanggal_daftar").value;

			if (puskesmas.checked == true){
				$('#rumah_sakit').prop('checked', false);
				var faskes = '1';
			}else if (rumah_sakit.checked == true) {
				$('#puskesmas').prop('checked', false);
				var faskes = '2';
			}else{
				alert('Mohon memilih asal rujukan BPJS anda');
			}



			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>index.php/konten/cek_rujukan',
				data : 'no_rujukan=' + no_rujukan + '&faskes='+faskes + '&tanggal_daftar='+tanggal_daftar,
				datatype:'json',
				success:function(data_sep){
					if (no_rujukan == null || no_rujukan == '' || no_rujukan == undefined) {
						alert('Mohon mengisi No rujukan, yang telah terdaftar');
					}
					else if(data_sep!=""){
						data_sep= JSON.parse(data_sep)
						if (data_sep.message == null) {
							alert('Warning','Koneksi jaringan server BPJS terputus.<br>Silahkan hubungi administrator atau petugas BPJS !','warning');
						}

						else if (data_sep.message != 'OK') {
							alert(data_sep.message);
							document.getElementById("status_aktif_rujukan").value = "";
							document.getElementById("asal_nama_rujukan").value = "";
						}
						else if (data_sep.statusPeserta != 'AKTIF') {
							alert('No Rujukan Sudah Melewati Masa Aktif');
							document.getElementById("status_aktif_rujukan").value = data_sep.statusPeserta;
							document.getElementById("asal_nama_rujukan").value = "";
						}

						else if (data_sep.statusPeserta == 'AKTIF') {
							document.getElementById("status_aktif_rujukan").value = data_sep.statusPeserta;
							document.getElementById("asal_nama_rujukan").value = 'Asal Rujukan : '+data_sep.nama_rujukan;
							document.getElementById("no_rujukan_bpjs_resume").innerHTML = "&nbsp; : "+no_rujukan;
							document.getElementById("asal_rujukan_bpjs_resume").innerHTML = "&nbsp; : "+data_sep.nama_rujukan;
						}
					}
				},
				error:function(data_sep)
				{
					alert('Data tidak ditemukan, silahkan cek kembali atau hubungi administrator');
					document.getElementById("status_aktif_rujukan").value = "";
					document.getElementById("asal_nama_rujukan").value = "";
				}
			});

		}

		function cek_kartu_pasien(){
			var no_kartu_bpjs = document.getElementById("no_kartu_bpjs").value;

			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>index.php/konten/cek_kartu_pasien',
				data : 'no_kartu_bpjs=' + no_kartu_bpjs,
				datatype:'json',
				success:function(data_sep){
					if (no_kartu_bpjs == null || no_kartu_bpjs == '' || no_kartu_bpjs == undefined) {
						alert('Mohon mengisi No Kartu BPJS Anda');
					}
					else if(data_sep!=""){
						data_sep= JSON.parse(data_sep)

						if (data_sep.message == null) {
							alert('Warning','Koneksi jaringan server BPJS terputus.<br>Silahkan hubungi administrator atau petugas BPJS !','warning');
							document.getElementById("status_aktif_kartu").value = "";
						}

						else if (data_sep.message != 'OK') {
							document.getElementById("status_aktif_kartu").value = "";
							alert(data_sep.message);
						}

						else if (data_sep.keterangan != 'AKTIF') {
							document.getElementById("status_aktif_kartu").value = "";
							alert(data_sep.keterangan);
						}

						else if (data_sep.keterangan == 'AKTIF') {
							document.getElementById("status_aktif_kartu").value = data_sep.keterangan;
							document.getElementById("no_kartu_bpjs_resume").innerHTML = "&nbsp; : "+no_kartu_bpjs;
							// alert('HALLO');
						}
					}else{
						alert('Data tidak ditemukan, silahkan cek kembali atau hubungi administrator');
						document.getElementById("status_aktif_kartu").value = "";
					}

				},
				error:function(data_sep)
				{
					alert('Data tidak ditemukan, silahkan cek kembali atau hubungi administrator');
					document.getElementById("status_aktif_kartu").value = "";
				}
			});
		}

	</script>
	<script>
		$( function() {
			var today = new Date();
			var dd = today.getDate()+2;
			var mm = today.getMonth()+1; 
			var yyyy = today.getFullYear();

			var dd_min = today.getDate()+1;
			var mm_min = today.getMonth()+1; 
			var yyyy_min = today.getFullYear();

			if(dd<10){
				dd='0'+dd
			} 
			if(mm<10){
				mm='0'+mm
			} 

			today_max = yyyy+'-'+mm+'-'+dd;
			today_min = yyyy_min+'-'+mm_min+'-'+dd_min;
			document.getElementById("tanggal_daftar").setAttribute("min", today_min);
			document.getElementById("tanggal_daftar").setAttribute("max", today_max);

			document.getElementById("tanggal_daftar_baru").setAttribute("min", today_min);
			document.getElementById("tanggal_daftar_baru").setAttribute("max", today_max);
		} );
	</script>