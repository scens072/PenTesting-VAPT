<?php
class Tentang_mata_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('tentang_mata');
    if($id!=''){
          $this->db->where('id', $id);
          return $this->db->get()->row();
        }else{
          $this->db->order_by('id', 'DESC');
          return $this->db->get()->result();
        }
    
  }
}
