<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function index()
    {
        $data['title'] = "Halaman | Manager";
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
        
    }

}

/* End of file Manager.php */
