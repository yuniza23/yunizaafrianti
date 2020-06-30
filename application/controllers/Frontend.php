<?php
 class Frontend extends CI_Controller{
	public function index(){
		$this->load->view('template/navbar');
		$this->load->view('template/header');
		$this->load->view('contents');
		$this->load->view('template/footer');
	}
}