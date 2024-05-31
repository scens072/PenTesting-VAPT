<?php
class Pelayanan_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('pelayanan');
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
    }
    
  }

  function get_dt_peraturan($judul){
   return $this->db->query("SELECT * FROM pelayanan p
    WHERE key_pelayanan = '$judul'")->result();
 }

 function get_listimage($id){
  $this->db->select('*');
  $this->db->from('image');
  $this->db->where('kelompok', 'pelayanan');
  $this->db->where('id_ref', $id);
  $this->db->order_by('id', 'DESC');
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

function get_dtmenuju(){
 return $this->db->query("select * from tentang_kami where header like '%menuju%'")->row();

}
}
