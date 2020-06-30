<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'buku/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'buku/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'buku/index.html';
            $config['first_url'] = base_url() . 'buku/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_buku->total_rows($q);
        $buku = $this->M_buku->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'buku_data' => $buku,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $this->load->view('adminlte/header');
      $this->load->view('adminlte/navbar');  
      $this->load->view('adminlte/sidebar');
        $this->load->view('buku/tb_buku_list', $data);
          $this->load->view('adminlte/footer');
    }

    public function read($id) 
    {
        $row = $this->M_buku->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'email' => $row->email,
		'pesan' => $row->pesan,
		'tgl_pesan' => $row->tgl_pesan,
	    );
            $this->load->view('adminlte/header');
      $this->load->view('adminlte/navbar');  
      $this->load->view('adminlte/sidebar');
            $this->load->view('buku/tb_buku_read', $data);
                $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('buku/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'pesan' => set_value('pesan'),
	    'tgl_pesan' => set_value('tgl_pesan'),
	);
         $this->load->view('adminlte/header');
      $this->load->view('adminlte/navbar');  
      $this->load->view('adminlte/sidebar');
        $this->load->view('buku/tb_buku_form', $data);
           $this->load->view('adminlte/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
		'tgl_pesan' => $this->input->post('tgl_pesan',TRUE),
	    );

            $this->M_buku->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('buku'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_buku->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buku/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'pesan' => set_value('pesan', $row->pesan),
		'tgl_pesan' => set_value('tgl_pesan', $row->tgl_pesan),
	    );
             $this->load->view('adminlte/header');
      $this->load->view('adminlte/navbar');  
      $this->load->view('adminlte/sidebar');
            $this->load->view('buku/tb_buku_form', $data);
              $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
		'tgl_pesan' => $this->input->post('tgl_pesan',TRUE),
	    );

            $this->M_buku->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('buku'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_buku->get_by_id($id);

        if ($row) {
            $this->M_buku->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('buku'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');
	$this->form_validation->set_rules('tgl_pesan', 'tgl pesan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_buku.xls";
        $judul = "tb_buku";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Pesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pesan");

	foreach ($this->M_buku->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pesan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pesan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_buku.doc");

        $data = array(
            'tb_buku_data' => $this->M_buku->get_all(),
            'start' => 0
        );
        
        $this->load->view('buku/tb_buku_doc',$data);
    }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-29 08:40:39 */
/* http://harviacode.com */