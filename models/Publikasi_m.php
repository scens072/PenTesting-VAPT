<?php
class Publikasi_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('publikasi');
    
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
    }
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

}
