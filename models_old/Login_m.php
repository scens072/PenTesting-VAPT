<?php
class Login_m extends CI_Model
{
	public function get_login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get()->row();
	}

	function get_count_pameran_v(){
		return $this->db->query("SELECT COUNT(kd_pameran) AS count
			FROM pameran_virtual
			WHERE status = 'BERLANGSUNG'
			")->row();
	}
}
