<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.classyqr.js"></script>
<?php
if(!function_exists('getBulan')){
	function getBulan($bln){
		switch ($bln){
			case 1: 
			return "Januari";
			break;
			case 2:
			return "Februari";
			break;
			case 3:
			return "Maret";
			break;
			case 4:
			return "April";
			break;
			case 5:
			return "Mei";
			break;
			case 6:
			return "Juni";
			break;
			case 7:
			return "Juli";
			break;
			case 8:
			return "Agustus";
			break;
			case 9:
			return "September";
			break;
			case 10:
			return "Oktober";
			break;
			case 11:
			return "November";
			break;
			case 12:
			return "Desember";
			break;
		}
	} 
}

if(!function_exists('getHari')){
	function getHari($bln){
		switch ($bln){
			case "Monday": 
			return "Senin";
			break;
			case "Tuesday":
			return "Selasa";
			break;
			case "Wednesday":
			return "Rabu";
			break;
			case "Thursday":
			return "Kamis";
			break;
			case "Friday":
			return "Jumat";
			break;
			case "Saturday":
			return "Sabtu";
			break;
			case "Sunday":
			return "Minggu";
			break;
		}
	} 
}

if(!function_exists('tgl_ina')){
	function tgl_ina($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan   = getBulan(substr($tgl,5,2));
		$tahun   = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}
?>
<html>
<head>
	<title>BUKTI RESERVASI PENDAFTARAN ONLINE</title>
</head>
<style type="text/css">
body{
	font-family: Helvetica;
	font-size: 8;
}
table{
	border-collapse: collapse; width: 100%;
}          
</style>
<body>
	<?php
	$no_antrian_modal=$this->input->get('no_antrian_modal');
	$tanggal_antrian_modal=$this->input->get('tanggal_antrian_modal');
	$waktu_antrian_modal=$this->input->get('waktu_antrian_modal');
	$medical_record_antrian_modal=$this->input->get('medical_record_antrian_modal');
	$nama_pasien_antrian_modal=$this->input->get('nama_pasien_antrian_modal');
	$layanan_antrian_modal=$this->input->get('layanan_antrian_modal');
	?>

	<table border="1" width="100%">
		<tr>
			<td style="font-size:14px;text-align: center;align-items: center;background-color: #00a1ff;color: white;" align="center" width="320"><strong>BUKTI RESERVASI PENDAFTARAN ONLINE</strong>
			</td>
		</tr>
	</table>
<!-- 	<table>
		<tr>
			<td align="center" width="700"><img src="http://203.123.57.122/pendaftaran_web/images/logo_rs_bawah.png" style="width: 15%;"></td>
		</tr>		
	</table> -->
	<table>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>No Antrian</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="no_antrian_modal"><strong><?php echo $no_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>Tanggal</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="tanggal_antrian_modal"><strong><?php echo $tanggal_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>Waktu</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="waktu_antrian_modal"><strong><?php echo $waktu_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>No RM</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="medical_record_antrian_modal"><strong><?php echo $medical_record_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>Nama Pasien</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="nama_pasien_antrian_modal"><strong><?php echo $nama_pasien_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td width="150"><p style="font-weight: 900;"><strong>Layanan</strong></p></td>
			<td width="350"><p style="font-weight: 900;" id="layanan_antrian_modal"><strong><?php echo $layanan_antrian_modal ?></strong></p></td>
		</tr>
		<tr>
			<td id="qr2"></td>
		</tr>
	</table>
	<br/>
	<h5 style="margin-bottom: 0px;">KETENTUAN : </h5>
	<!-- <p style="margin-bottom: 0px;">***) Jika pasien datang melebihi jam kedatangan dan antrian sudah terlewati maka no antrian tidak berlaku, pasien harap mengambil antrian ulang </p> -->
	<p style="margin-bottom: 0px;">***) Batas kedatangan sesuai dengan jam operasional pendaftaran poliklinik </p>
	<p style="margin-bottom: 0px;">BPJS : </p>
	<p style="margin-bottom: 0px;">Senin - Kamis : 06.00 - 11.30</p>
	<p style="margin-bottom: 0px;">Jumat : 06.00 - 11.00</p>
	<p style="margin-bottom: 0px;">Sabtu : 06.00 - 10.30</p>
	<p style="margin-bottom: 0px;">UMUM : </p>
	<p style="margin-bottom: 0px;">Senin - Jumat : 07.00 - 12.30</p>
	<p style="margin-bottom: 0px;">Sabtu : 07.00 - 11.30</p>
</body>
</html>

<script type="text/javascript">
	$( function() {
		var medical_record_antrian_modal = document.getElementById('medical_record_antrian_modal').textContent;
		$("#qr2").ClassyQR({
			create: true,
			type: 'text',
			text: medical_record
		});
	} );
</script>

