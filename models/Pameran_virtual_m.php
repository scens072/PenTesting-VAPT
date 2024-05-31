<?php
class Pameran_virtual_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('pameran_virtual');
    
    if($id!=''){
      $this->db->where('kd_pameran', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('kd_pameran', 'DESC');
      return $this->db->get()->result();
    }
  }

  function get_dt_list(){
    $this->db->select('*');
    $this->db->from('pameran_virtual');
    $this->db->order_by('kd_pameran', 'DESC');
    return $this->db->get()->result();
  }
  
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('publikasi');
    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result();
    
  }

  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('publikasi');
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get()->result();

  }

  function get_data_pameran_v(){
   return $this->db->query("SELECT
    pv.kd_pameran,
    pv.judul_pameran,
    pv.embed_code,
    pv.keterangan,
    pv.`status`,
    pv.tanggal_input,
    pv.waktu_input
    FROM pameran_virtual pv
    WHERE pv.`status` = 'BERLANGSUNG'
    ORDER BY pv.tanggal_input DESC, waktu_input DESC
    ")->row();
 }

}
