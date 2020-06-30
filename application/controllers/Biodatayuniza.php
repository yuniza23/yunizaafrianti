<?php

class Biodatayuniza extends CI_Controller{
	public function index(){
		$data['biodatayuniza']=$this->m_biodatayuniza->view_bdy()->result();
		$this->load->view('blog/artikel');
		$this->load->view('biodatayuniza',$data);
		$this->load->view('blog/footer');
	
}
public function add(){
		$npm	= $this->input->post('npm');
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$semester	= $this->input->post('semseter');
		$jurusan	= $this->input->post('jurusan');
		
		$data = array(
						'npm'		=> $npm,
						'nama'		=> $nama,
						'alamat'		=> $alamat,
						'semester'		=> $semester,
						'jurusan'		=> $jurusan,
						

					);
		$this->m_biodatayuniza->input_data($data,'tb_biodata_yuniza');
		redirect('biodatayuniza/index');
	}
	public function edit($id){
	$where=array('id'=>$id);
	$data['biodatayuniza']=$this->m_biodatayuniza->edit_data($where,
		'tb_biodata_yuniza')->result();
	
		$this->load->view('blog/artikel');
		$this->load->view('edit',$data);
		$this->load->view('blog/footer');

}
public function update(){
	$id=$this->input->post('id');
	$npm=$this->input->post('npm');
	$nama=$this->input->post('nama');
	$alamat	= $this->input->post('alamat');
		$semester	= $this->input->post('semseter');
		$jurusan	= $this->input->post('jurusan');
		
	$data=array(
					'npm'      =>$npm,
					'nama'      =>$nama,
					'alamat'		=> $alamat,
						'semester'		=> $semester,
						'jurusan'		=> $jurusan,
						
				);
	$where=array(
		'id'=>$id);
	$this->m_biodatayuniza->update_data($where,$data,'tb_biodata_yuniza');
	redirect('biodatayuniza/index');
}
public function delete ($id){
	$where = array('id'=>$id);
	$this->m_biodatayuniza->delete_data($where,'tb_biodata_yuniza');
	redirect('biodatayuniza/index');
}
}