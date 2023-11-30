<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_pelayanan');
        $this->load->model('m_pelanggan');
        $this->load->model('m_transaksi');
        $this->load->model('m_detailtransaksi');
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
        $data['tittle']     = 'Dashboard';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['user']       = M_users::count();
        $data['pelayanan']  = M_pelayanan::count();
        $data['pelanggan']  = M_pelanggan::count();
        $data['pelanggan']  = M_pelanggan::count();
        $data['transaksi']  = M_transaksi::where('created_at', date('Y-m-d'))->count();
        $data['chartBulan']  = M_detailtransaksi::selectRaw('Month(created_at) bulan, count(id_transaksi) as jumlah')->groupBy('bulan')->get();
        $data['chartTransaksi']  = M_transaksi::selectRaw('Month(created_at) bulan, count(id_transaksi) as jumlah')->groupBy('bulan')->get();
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
