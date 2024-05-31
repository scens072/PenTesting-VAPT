<?php
class Fasilitas_rs_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('fasilitas_rs');
    if($id!=''){
      $this->db->where('id_fasrs', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id_fasrs', 'ASC');
      return $this->db->get()->result();
    }
    
  }
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('fasilitas_rs');
    $this->db->order_by('id_fasrs', 'ASC');
    $this->db->limit('5');
    return $this->db->get()->result();
  }

  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('fasilitas_rs');
    $this->db->order_by('id_fasrs', 'ASC');
    return $this->db->get()->result();

  }

}
