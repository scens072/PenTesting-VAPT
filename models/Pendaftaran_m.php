<?php
class Pendaftaran_m extends CI_Model
{
	
	function get_jenis_kelamin(){
		$pgsql = $this->load->database('pgsql', TRUE);
		$sql="select * from jenis_kelamin";    
		$query = $pgsql->query($sql);
		return $query->result();
	}
	
	function get_penjamin(){
		$pgsql = $this->load->database('pgsql', TRUE);
		$sql="SELECT
			* 
		FROM
			detail_kelpenjamin 
		WHERE
			status_aktif = '1' 
		ORDER BY
			nama_penjamin ASC;";
		$query = $pgsql->query($sql);
		return $query->result();
	}
	
	function get_unit(){
		$pgsql = $this->load->database('pgsql', TRUE);
		$sql="SELECT
			* 
		FROM
			unit 
		WHERE
		status_aktif = '1' 
		AND induk = '2'
		ORDER BY
			nama_unit ASC;";
		$query = $pgsql->query($sql);
		return $query->result();
	}
	
	function get_dokter($unit){
		$pgsql = $this->load->database('pgsql', TRUE);
		$sql="SELECT
			u.kd_user,
			pm.kd_paramedis,
			pm.nama_paramedis,
			pb.kd_instalasi 
		FROM
			para_medis pm
			INNER JOIN paramedis_bagian pb ON pb.kd_paramedis = pm.kd_paramedis
			LEFT JOIN users u ON pm.kd_paramedis = u.kd_paramedis
			INNER JOIN jabatan_paramedis jp ON jp.kd_jabatanparamedis = pm.kd_jabatanparamedis 
		WHERE
			pb.kd_unit = '$unit' 
			AND pm.kd_jabatanparamedis = '1' 
		ORDER BY
			nama_paramedis ASC;";
		$query = $pgsql->query($sql);
		return $query->result();
	}
	
	function get_pasien($rm){
		$pgsql = $this->load->database('pgsql', TRUE);
		$sql="select nama_pasien, tempat_lahir, tanggal_lahir, alamat, telpon, kd_jenis from pasien where no_medicalrecord = '$rm';";
		$query = $pgsql->query($sql);
		return $query->result();
	}
	
	function daftar($jenis,$rm,$nama,$jkel,$tmplahir,$tgllahir,$alamat,$no_hp,$unit,$dokter,$penjamin,$tgl){
		$pgsql = $this->load->database('pgsql', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$tgl_create = date("Y-m-d H:i:s");
		$tgl_kode = date("Ymd");
		$s="SELECT COUNT
			( * ) urut 
		FROM
			reservasi 
		WHERE
			create_date :: DATE = CURRENT_DATE;";
		$q = pg_query($s);
		if (pg_num_rows($q) > 0){
			$dt = pg_fetch_array($q);
			$urut = $dt['urut'];
			$urut++;
		}
		$sql="INSERT INTO reservasi (kd_pesan,tgl_pesan,kd_carapemesanan,nama_pemesan,kd_jabatanpenanggungjwb,no_medicalrecord,nama_pasien,alamat,kd_unit,kd_paramedis,kd_detkelpenjamin,biaya_titipan,status,status_terlayani,no_antrian,shift,no_telpon,create_date) VALUES ('{$tgl_kode}-{$urut}','{$tgl}','10','{$nama}','0','{$rm}','{$nama}','{$alamat}','{$unit}','{$dokter}','{$penjamin}','0','0','0','{$urut}','0','{$no_hp}','{$tgl_create}');";
		$qq = pg_query($sql);
		if (pg_affected_rows($qq) > 0){
			return 'Pendaftaran Sukses';
		}else{
			return 'Pendaftaran Gagal !! Mohon Coba Lagi !!';
		}
	}
	
	function daftarnew($jenis,$rm,$nama,$jkel,$tmplahir,$tgllahir,$alamat,$no_hp,$unit,$dokter,$penjamin,$tgl){
		$pgsql = $this->load->database('pgsql', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$sql="INSERT INTO pasien (no_medicalrecord,nama_pasien,tempat_lahir,tanggal_lahir,alamat,telpon,kd_jenis) VALUES ('{$rm}','{$nama}','{$tmplahir}','{$tgllahir}','{$alamat}','{$no_hp}','{$jkel}');";
		$qq = pg_query($sql);
		if (pg_affected_rows($qq) > 0){
			return 'sukses';
		}else{
			return 'gagal';
		}
	}
	
	function msimpangetmedrecbaru()
	{
			
			$pgsql = $this->load->database('pgsql', TRUE);
			date_default_timezone_set('Asia/Bangkok');

			$sql = "SELECT MAX(REPLACE(NO_MEDICALRECORD, '-', '')::NUMERIC) AS NO_MEDICALRECORD FROM PASIEN WHERE substr(NO_MEDICALRECORD, 2,1) = '-' and substr(NO_MEDICALRECORD, 5,1) = '-' and substr(NO_MEDICALRECORD, 8,1) = '-' and no_medicalrecord not in ('0-02-28-6767') AND substr ( no_medicalrecord, 1,2 ) != '2-' and status_rm_lompat !=1";
			$result = $pgsql->query($sql);
			$r1 = "";
			if($result->num_rows()>0)
			{
				foreach($result->result() as $q)
				{
					$r = ((int)$q->no_medicalrecord)+1;
					if(strlen($r)==1){
					  $r1="0-00-00-0".$r;
					}else if(strlen($r)==2){
					  $r1="0-00-00-".substr($r,-2);
					}else if(strlen($r)==3){
					  $r1="0-00-0".substr($r,-3,1)."-".substr($r,-2);
					}else if(strlen($r)==4){
					  $r1="0-00-".substr($r,-4,2)."-".substr($r,-2);
					}else if(strlen($r)==5){
					  $r1="0-0".substr($r,-5,1)."-".substr($r,-4,2)."-".substr($r,-2);
					}else if(strlen($r)==6){
					  $r1="0-".substr($r,-6,2)."-".substr($r,-4,2)."-".substr($r,-2);
					}else if(strlen($r)==7){
					  $r1=substr($r,-7,1)."-".substr($r,-6,2)."-".substr($r,-4,2)."-".substr($r,-2);
					}
				}
			}
			else
			{
				$r1="0-00-00-01";
			}
			return $r1;
	}

}
