<?php
class Pm_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('penunjang_medis');
    if($id!=''){
      $this->db->where('id_penunjang', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id_penunjang', 'ASC');
      return $this->db->get()->result();
    }
    
  }
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('penunjang_medis');
    $this->db->order_by('id_penunjang', 'ASC');
    $this->db->limit('5');
    return $this->db->get()->result();
  }

  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('penunjang_medis');
    $this->db->order_by('id_penunjang', 'ASC');
    return $this->db->get()->result();

  }

  function get_listimage($id){
    $this->db->select('*');
    $this->db->from('image');
    $this->db->where('kelompok', 'penunjang_medis');
    $this->db->where('id_ref', $id);
    $this->db->order_by('id', 'ASC');
    return $this->db->get()->result();
  }

  function get_dtimage($id=''){
    $this->db->select('*');
    $this->db->from('image');
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
    }
    
  }

}
