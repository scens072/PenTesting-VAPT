<?php
class Tentang_mata_kita_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('tentang_mata_kita');
    if($id!=''){
      $this->db->where('id_layanan', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id_layanan', 'DESC');
      return $this->db->get()->result();
    }
    
  }

  function get_listimage($id){
    $this->db->select('*');
    $this->db->from('image');
    $this->db->where('kelompok', 'tentang_mata_kita');
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

 //  function get_dtmenuju(){
 //   return $this->db->query("select * from tentang_kami where header like '%menuju%'")->row();

 // }

 // function get_dtindikator(){
 //   return $this->db->query("select * from tentang_kami where header like '%indikator%'")->row();

 // }

 function get_header_konten(){
  $this->db->select('*');
  $this->db->from('tentang_mata_kita');
  $this->db->order_by('id_layanan', 'ASC');
  return $this->db->get()->result();

}
}
