<?php

class M_biodatayuniza extends CI_Model{
	public function view_bdy(){
		return $this->db->get('tb_biodata_yuniza');
	}
	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_data($where,$table){

	return $this->db->get_where($table,$where);
}
public function update_data($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}
public function delete_data($where, $table){
	$this->db->where($where);
	$this->db->delete($table);

}
public function detail_data($id=NULL){
	$query=$this->db->get_where('tb_biodata_yuniza', array('id'=> $id ))->row();
	return $query;
}
}