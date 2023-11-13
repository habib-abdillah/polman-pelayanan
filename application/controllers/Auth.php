<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_users');
        $this->load->model('m_track');
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $users = M_users::where('username', $username)->take(1)->get();
        if ($users->isEmpty()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
            redirect('auth');
        } else {
            foreach ($users as $key => $value) {
                if ($value->status_aktif == 1) {
                    if (password_verify($password, $value->password)) {
                        $data = [
                            'username'      => $value->username,
                            'id_role'       => $value->id_role,
                            'log'           => 'LOGIN USER',
                            'detail_log'    => 'BERHASIL',
                            'logged'        => 'TRUE'
                        ];
                        $this->session->set_userdata($data);
                        if ($value->id_role == 001) {
                            $this->track();
                            redirect('user/admin');
                        } else {
                            $this->track();
                            redirect('user/operator');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password salah!</div>');
                        $this->session->set_userdata('detail_log', 'GAGAL');
                        $this->track();
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak aktif!</div>');
                    $this->session->set_userdata('detail_log', 'GAGAL');
                    $this->track();
                    redirect('auth');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('logged');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda telah logout!</div>');
        redirect('auth');
    }

    public function track(){
        $username = $this->input->post('username');
        $users = M_users::where('username', $username)->take(1)->get();
        $m_track = new M_track();
        foreach ($users as $key => $value){
            $m_track->id                = random_string('alnum',13);
            $m_track->username          = $value->username;
            $m_track->pc_name           = $this->input->ip_address();
            $m_track->activity          = $this->session->userdata('log');
            $m_track->header_reference  = $value->id;
            $m_track->detail_reference  = $this->session->userdata('detail_log');
        }
        $m_track->save();
    }
}
