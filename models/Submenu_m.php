<?php
class Submenu_m extends CI_Model
{
	function get_dtsubmenu()
	{
		return $this->db->query("SELECT A.nama_menu,B.* FROM tbl_submenu_tambah B LEFT JOIN tbl_menu_tambah A on A.id_menu = B.id_menu")->result();
	}
	function get_dtmenu()
	{
		return $this->db->query("SELECT * FROM tbl_menu_tambah where type = 1")->result();
	}

  function get_dt($id=''){
  	$this->db->select('*');
    $this->db->from('tbl_submenu_tambah');
    
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
    $this->db->from('tbl_submenu_tambah');
    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result();
    
  }

  function get_header_konten(){
    // $this->db->select('*');
    // $this->db->from('tbl_submenu_tambah');
    // $this->db->order_by('id_menu', 'ASC');
    // $this->db->order_by('id', 'ASC');
    return $this->db->query("SELECT A.nama_menu,B.* FROM tbl_submenu_tambah B INNER JOIN tbl_menu_tambah A on A.id_menu = B.id_menu order_by id_menu, id")->result();

  }

}