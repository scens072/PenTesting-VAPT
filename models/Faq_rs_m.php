<?php
class Faq_rs_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('faq_rs');
    if($id!=''){
      $this->db->where('kd_faq', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('kd_faq', 'DESC');
      return $this->db->get()->result();
    }
    
  }


  function get_header_konten(){
    $this->db->select('*');
    $this->db->from('faq_rs');
    $this->db->order_by('kd_faq', 'ASC');
    return $this->db->get()->result();

  }

  function get_dt_list(){
    $this->db->select('*');
    $this->db->from('faq_rs');
    $this->db->order_by('kd_faq', 'ASC');
    return $this->db->get()->result();
  }

}
