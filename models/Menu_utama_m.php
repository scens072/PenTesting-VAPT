<?php
class Menu_utama_m extends CI_Model
{

	function get_dtmenu()
	{
		return $this->db->query("SELECT * FROM tbl_menu_utama")->result();
	}
public function get_dt($id='')
  {
  	$this->db->select('*');
    $this->db->from('tbl_menu_utama');
    if($id!=''){
    	$this->db->where('id_menu_utama',$id);
    	 return $this->db->get()->row();
    }else{
    	 return $this->db->get()->result();
    }

   
  }
}