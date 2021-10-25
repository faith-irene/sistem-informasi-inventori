<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    
    public function index(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        
        if ($this->form_validation->run() == TRUE ) {
            $this->login();
        } else {
            $data['title'] = "Halaman | Login";
            $this->load->view('auth/login', $data);
        }
        
        
        
        
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'fullname', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('userphone', 'userphone', 'trim|required|max_length[18]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'password confirmation', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == TRUE ) {
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $phone = $this->input->post('userphone');
            $password = $this->input->post('passconf');

            $data = [
                'username' => $username,
                'password' => md5($password),
                'nama' => $fullname,
                'no_telp' => $phone,
                'is_active' => 1
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata("sukses","sukses");
            redirect('auth/register');
        } else {
            $data['title'] = "Halaman | Registrasi";
            $this->load->view('auth/register', $data);
        }
    }

    private function login(){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $user = $this->db->get_where("user",['username'=>$username])->row_array();
            if ($user) {
                if ( substr(md5($password),0,10) == substr($user['password'],0,10) ) {
                    $data = [ 
                        'nama_user' => $user['nama'] , 
                        'last_login' => $user['last_login'],
                        'role' => $user['role'] 
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 1) {
                        
                        redirect('admin','refresh');

                    } elseif ($user['role'] == 2) {
                        
                        redirect('pegawai','refresh');
                        
                    } elseif ($user['role'] == 3){
                        
                        redirect('manager','refresh');
                        
                    }
                } else {
                    echo "password salah";
                }
            } else {
                echo "user tidak ada";
            }
    }

    public function logout()
    {
       $this->session->unset_userdata(['nama_user','last_login','role']);
       $this->cart->destroy();
       redirect('auth','refresh');
    }

    public function blocked()
    {
        # code...
    }
}

/* End of file Controllername.php */
