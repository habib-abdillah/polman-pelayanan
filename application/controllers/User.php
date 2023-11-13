<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $this->admin();
    }

    public function admin()
    {
        $data['tittle'] = 'Dashboard';
        $data['users'] = M_users::where('username', $this->session->userdata('username'))->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
    }

    public function operator()
    {
        $data['tittle'] = 'Dashboard';
        $data['users'] = M_users::where('username', $this->session->userdata('username'))->get();
        $this->load->view('template/header', $data);
        $this->load->view('operator/dashboard', $data);
        $this->load->view('template/footer', $data);
    }
}
