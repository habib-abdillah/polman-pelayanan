<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_pembayaran');
        $this->load->model('m_track');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Data Pembayaran';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['pembayaran'] = M_pembayaran::orderBy('created_at', 'asc')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/pembayaran', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_pembayaran()
    {
        $m_pembayaran = new M_pembayaran();
        $m_pembayaran->id = random_string('alnum', 13);
        $m_pembayaran->jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $m_pembayaran->keterangan       = $this->input->post('keterangan');
        $m_pembayaran->status_aktif     = "1";
        $m_pembayaran->user_id_buat     = $this->session->userdata('id_role');
        $m_pembayaran->user_id_ubah     = $this->session->userdata('id_role');

        try {
            if ($m_pembayaran->save()) {
                $this->session->set_flashdata('message', 'Disimpan');
                $data = [
                    'log'           => 'INPUT DATA PEMBAYARAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            } else {
                $this->session->set_flashdata('message', 'Gagal disimpan');
                $data = [
                    'log'           => 'INPUT DATA PEMBAYARAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_pembayaran()
    {
        $m_pembayaran = M_pembayaran::find($this->input->post('id'));
        $m_pembayaran->jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $m_pembayaran->keterangan       = $this->input->post('keterangan');
        $m_pembayaran->status_aktif     = $this->input->post('status_aktif');
        $m_pembayaran->user_id_ubah     = $this->session->userdata('id_role');

        try {
            if ($m_pembayaran->save()) {
                $this->session->set_flashdata('message', 'Diedit');
                $data = [
                    'log'           => 'EDIT DATA PEMBAYARAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            } else {
                $this->session->set_flashdata('message', 'Gagal diedit');
                $data = [
                    'log'           => 'EDIT DATA PEMBAYARAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function hapus_pembayaran($id)
    {
        $m_pembayaran = M_pembayaran::find($id);
        try {
            if ($m_pembayaran->delete()) {
                $this->session->set_flashdata('message', 'Dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PEMBAYARAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            } else {
                $this->session->set_flashdata('message', 'Gagal dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PEMBAYARAN',
                    'detail_log'    => 'GAGAL   ',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pembayaran');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function track()
    {
        $users = M_users::where('username', $this->session->userdata('username'))->take(1)->get();
        $m_track = new M_track();
        foreach ($users as $key => $value) {
            $m_track->id                = random_string('alnum', 13);
            $m_track->username          = $value->username;
            $m_track->pc_name           = $this->input->ip_address();
            $m_track->activity          = $this->session->userdata('log');
            $m_track->header_reference  = $value->id;
            $m_track->detail_reference  = $this->session->userdata('detail_log');
        }

        $m_track->save();
    }
}
