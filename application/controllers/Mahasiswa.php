<?php 
class Mahasiswa extends CI_Controller{
	public function index(){
		$data['mahasiswa']=$this->m_mahasiswa->view_mhs()->result();
		$this->load->view('blog/artikel');
		$this->load->view('mahasiswa',$data);
		$this->load->view('blog/footer');
	}

	public function add(){
		$npm	= $this->input->post('npm');
		$nama	= $this->input->post('nama');
		$jk	= $this->input->post('jk');
		$prodi	= $this->input->post('prodi');

		$data = array(
						'npm'		=> $npm,
						'nama'		=> $nama,
						'jk'		=> $jk,
						'prodi'		=> $prodi,

					);
		$this->m_mahasiswa->input_data($data,'tb_mahasiswa');
		redirect('mahasiswa/index');
	}
	public function edit($id){
	$where=array('id'=>$id);
	$data['mahasiswa']=$this->m_mahasiswa->edit_data($where,
		'tb_mahasiswa')->result();
	
		$this->load->view('blog/artikel');
		$this->load->view('edit',$data);
		$this->load->view('blog/footer');

}
public function update(){
	$id=$this->input->post('id');
	$npm=$this->input->post('npm');
	$nama=$this->input->post('nama');
	$jk=$this->input->post('jk');
	$prodi=$this->input->post('prodi');

	$data=array(
					'npm'      =>$npm,
					'nama'      =>$nama,
					'jk'      =>$jk,
					'prodi'      =>$prodi,
				);
	$where=array(
		'id'=>$id);
	$this->m_mahasiswa->update_data($where,$data,'tb_mahasiswa');
	redirect('mahasiswa/index');
}
public function delete ($id){
	$where = array('id'=>$id);
	$this->m_mahasiswa->delete_data($where,'tb_mahasiswa');
	redirect('mahasiswa/index');
}
}