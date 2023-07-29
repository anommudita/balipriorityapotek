<?php

class Auth extends CI_Controller
{

    // function construct
    public function __construct(){
        parent:: __construct();

        // load model user
        $this->load->model('User_model', 'user');
    }

    // halaman login
    public function index()
    {
        // membersihkan session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [

            'required' => 'Username harus diisi!'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password harus diisi!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/auth_header');
            $this->load->view('auth/login');
            $this->load->view('auth/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    // proses login
    private function _login()
    {
        // ambil data input dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user->get_data_by_username($username);
        // Autentikasi untuk user!(admin dan dokter)
        if ($user) {

            // jika password benar yang diinputkan benar sesuai dengan database!
            if ((password_verify($password, $user['password']))){

                // jika user sudah berhasil login
                $this->db->set('status', 1);
                $this->db->where('username', $username);
                $this->db->update('user');

                // tambahkan data untuk menentukan access session
                $data = [
                    'username' => $user[ 'username'],
                    'role_id' => $user['role_id']
                ];

                // set session agar tersimpan di halaman selanjutnya
                $this->session->set_userdata($data);

                // perkondisian untuk menentukan halaman sesuai dengan role - nya
                if($user['role_id'] == 1){
                    // redirect ke halaman admin
                    redirect('admin');
                }elseif($user['role_id'] == 2){
                    // redirect ke halaman dokter
                    redirect('dokter');
                }
                
            } else {
                // Notifikasi gagal password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                // Redirect ke halaman login
                redirect('auth');
            }
        } else {
            // Notifikasi gagal tidak terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
            // Redirect ke halaman login
            redirect('auth');
        }
    }

    // halaman logout
    public function logout(){

        $username = $this->session->userdata('username');
        // jika user telah login ubah nilai ke 0
        $this->db->set('status', 0);
        $this->db->where('username', $username);
        $this->db->update('user');

        // membersihkan session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        // Notifikasi berhasil logout
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil logout!</div>');

        // Redirect ke halaman login
        redirect('auth');
    }

    // halaman block!
    public function block(){
        $username = $this->session->userdata('username');
        // jika user telah login ubah nilai ke 0
        $this->db->set('status', 0);
        $this->db->where('username', $username);
        $this->db->update('user');

        // membersihkan session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->load->view('auth/block');
    }
    
}


