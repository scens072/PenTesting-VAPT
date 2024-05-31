<?php
class Kelas_rwi_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('kelas_rawat_inap');
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id', 'ASC');
      return $this->db->get()->result();
    }
    
  }
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('kelas_rawat_inap');
    $this->db->order_by('id', 'ASC');
    $this->db->limit('4');
    return $this->db->get()->result();
  }

  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('kelas_rawat_inap');
    $this->db->order_by('id', 'ASC');
    return $this->db->get()->result();

  }

}
