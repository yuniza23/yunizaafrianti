    <?php

    class Blog extends CI_Controller{
    public function index(){
    $this->load- >view('blog/artikel');
     $this->load->view('contents');
      $this->load->view('blog/footer');
    
    }
    }