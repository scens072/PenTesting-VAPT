<?php
class Jenis_pelayanan_m extends CI_Model
{
public function get_dt($id='')
  {
  	$this->db->select('*');
    $this->db->from('jenis_pelayanan');
    if($id!=''){
    	$this->db->where('id',$id);
    	 return $this->db->get()->row();
    }else{
    	 return $this->db->get()->result();
    }

   
  }

}
