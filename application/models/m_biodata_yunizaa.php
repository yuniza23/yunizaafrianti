<?php
class M_biodata_yunizaa extends CI_Model{
	public function view_biodata_yunizaa(){
	return $this->db->get('tb_biodata_yuniza');
}
}