<?php
class Menu_m extends CI_Model
{

	function get_dtmenu()
	{
		return $this->db->query("SELECT * FROM tbl_menu_tambah")->result();
	}
public function get_dt($id='')
  {
  	$this->db->select('*');
    $this->db->from('tbl_menu_tambah');
    if($id!=''){
    	$this->db->where('id_menu',$id);
    	 return $this->db->get()->row();
    }else{
    	 return $this->db->get()->result();
    }

   
  }
  function get_dtmenu_utama()
  {
    return $this->db->query("SELECT * FROM tbl_menu_utama WHERE type = '1'")->result();
  }
  function get_dtsubmenu()
  {
    return $this->db->query("SELECT * FROM tbl_submenu_tambah WHERE id_menu = '0'")->result();
  }
}