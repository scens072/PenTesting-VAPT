<?php
class Footer_m extends CI_Model
{

	function get_jadwal_footer(){
		return $this->db->query("SELECT * FROM jadwal_pelayanan_footer ORDER BY urut ASC")->result();
	}

	function get_info_footer(){
		return $this->db->query("SELECT * FROM info_footer")->row();
	}
public function get_dt($id='')
  {
  	$this->db->select('*');
    $this->db->from('jadwal_pelayanan_footer');
    if($id!=''){
    	$this->db->where('id',$id);
    	 return $this->db->get()->row();
    }else{
    	 return $this->db->get()->result();
    }

   
  }
  function get_menu_tambahan()
  {
    return $this->db->query("SELECT * FROM tbl_menu_tambah")->result();
  }
	
  function get_submenu_tambahan()
  {
    return $this->db->query("SELECT * FROM tbl_submenu_tambah")->result();
  }
  function get_dtsubmenu($id)
  {
    return $this->db->query("SELECT * FROM tbl_submenu_tambah WHERE id = {$id}")->row();
  }
  function get_menu_utama()
  {
    return $this->db->query("SELECT * FROM tbl_menu_utama")->result();
  }
}