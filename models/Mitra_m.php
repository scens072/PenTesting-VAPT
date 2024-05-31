<?php
class Mitra_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('mitra_rsmu');
    if($id!=''){
      $this->db->where('id_mitra', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id_mitra', 'DESC');
      return $this->db->get()->result();
    }
    
  }
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('mitra_rsmu');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('4');
    return $this->db->get()->result();
  }

  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('mitra_rsmu');
    $this->db->order_by('id_mitra', 'DESC');
    return $this->db->get()->result();

  }

}
