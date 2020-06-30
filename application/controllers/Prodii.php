<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodii extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_prodii');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('prodii/tb_prodii_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_prodii->json();
    }

    public function read($id) 
    {
        $row = $this->M_prodii->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'nama_prodi' => $row->nama_prodi,
	    );
            $this->load->view('prodii/tb_prodii_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodii'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodii/create_action'),
	    'no' => set_value('no'),
	    'nama_prodi' => set_value('nama_prodi'),
	);
        $this->load->view('prodii/tb_prodii_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->M_prodii->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prodii'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_prodii->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodii/update_action'),
		'no' => set_value('no', $row->no),
		'nama_prodi' => set_value('nama_prodi', $row->nama_prodi),
	    );
            $this->load->view('prodii/tb_prodii_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodii'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->M_prodii->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prodii'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_prodii->get_by_id($id);

        if ($row) {
            $this->M_prodii->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prodii'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodii'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_prodi', 'nama prodi', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_prodii.xls";
        $judul = "tb_prodii";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Prodi");

	foreach ($this->M_prodii->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_prodi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_prodii.doc");

        $data = array(
            'tb_prodii_data' => $this->M_prodii->get_all(),
            'start' => 0
        );
        
        $this->load->view('prodii/tb_prodii_doc',$data);
    }

}

/* End of file Prodii.php */
/* Location: ./application/controllers/Prodii.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-22 05:49:31 */
/* http://harviacode.com */