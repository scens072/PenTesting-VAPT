<?php
class Berita_m extends CI_Model
{

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('berita');
    if($id!=''){
      $this->db->where('id', $id);
      return $this->db->get()->row();
    }else{
      $this->db->order_by('tanggal', 'DESC');
      return $this->db->get()->result();
    }
    
  }
  function get_dtlimit($limit){
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('20');
    return $this->db->get()->result();
  }

  function get_header_konten(){
    $this->db->select('*,DATE_FORMAT(tanggal,"%d-%m-%Y %H:%i:%S") as tanggal_berita');
    $this->db->from('berita');
    $this->db->order_by('tanggal', 'DESC');
    // $this->db->query("SELECT header, DATE_FORMAT(tanggal,'%d-%m-%Y %H:%i:%S') as tanggal_berita FROM berita
    //   ORDER BY tanggal DESC");
    return $this->db->get()->result();

  }

}
