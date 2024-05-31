<?php
class Jadwal_pelayanan_m extends CI_Model
{
  public function get_dt($id='')
  {
  	// $this->db->select('j.id,
   //    j.id_jenis_pelayanan,j.hari,jp.jenis_pelayanan');
   //  $this->db->from('jadwal_pelayanan j');
   //  $this->db->join('jenis_pelayanan jp','jp.id=j.id_jenis_pelayanan');
   //  $this->db->order_by('j.id_jenis_pelayanan,j.id', 'ASC');
    if($id!=''){
    	// $this->db->where('j.id',$id);
      return $this->db->query("SELECT j.id, j.id_jenis_pelayanan, j.hari,  j.pagi,
       j.siang,
       j.sore,
       jp.jenis_pelayanan
       FROM jadwal_pelayanan j
       INNER JOIN jenis_pelayanan jp ON jp.id = j.id_jenis_pelayanan
       WHERE j.id = '$id'
       ORDER BY j.id_jenis_pelayanan,j.id ASC")->row();
      // return $this->db->get()->row();
    }else{
     return $this->db->query("SELECT j.id, j.id_jenis_pelayanan, j.hari,  REPLACE(j.pagi, ' ', ' - ') as pagi,
      REPLACE(j.siang, ' ', ' - ') as siang,
      REPLACE(j.sore, ' ', ' - ') as sore,
      jp.jenis_pelayanan
      FROM jadwal_pelayanan j
      INNER JOIN jenis_pelayanan jp ON jp.id = j.id_jenis_pelayanan
      ORDER BY j.id_jenis_pelayanan,j.id ASC")->result();
      // return $this->db->get()->result();
   }


 }

}
