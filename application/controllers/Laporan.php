<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_detailtransaksi');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Data Laporan';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['laporan']    = M_detailtransaksi::all();
        $this->load->view('template/header', $data);
        $this->load->view('form/laporan', $data);
        $this->load->view('template/footer', $data);
    }
}
