<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_pelayanan');
        $this->load->model('m_track');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Data Pelayanan';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['pelayanan']  = M_pelayanan::orderBy('created_at', 'asc')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/pelayanan', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_pelayanan()
    {
        $harga = $this->input->post('harga');
        $fharga = preg_replace("/[^0-9]/", "", $harga);
        $m_pelayanan = new M_pelayanan();
        $m_pelayanan->id = random_string('alnum', 13);
        $m_pelayanan->kode_pelayanan = $this->input->post('kode_pelayanan');
        $m_pelayanan->nama_pelayanan = $this->input->post('nama_pelayanan');
        $m_pelayanan->harga = $fharga;
        $m_pelayanan->keterangan = $this->input->post('keterangan');
        $m_pelayanan->status_aktif = "1";
        $m_pelayanan->user_id_buat = $this->session->userdata('id_role');
        $m_pelayanan->user_id_ubah = $this->session->userdata('id_role');

        try {
            if ($m_pelayanan->save()) {
                $this->session->set_flashdata('message', 'Disimpan');
                $data = [
                    'log'           => 'INPUT DATA PELAYANAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelayanan');
            } else {
                $data = [
                    'log'           => 'INPUT DATA PELAYANAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                $this->session->set_flashdata('message', 'Gagal disimpan');
                redirect('pelayanan');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_pelayanan()
    {
        $m_pelayanan = M_pelayanan::find($this->input->post('id'));
        $m_pelayanan->kode_pelayanan = $this->input->post('kode_pelayanan');
        $m_pelayanan->nama_pelayanan = $this->input->post('nama_pelayanan');
        $m_pelayanan->harga = $this->input->post('harga');
        $m_pelayanan->keterangan = $this->input->post('keterangan');
        $m_pelayanan->status_aktif = $this->input->post('status_aktif');
        $m_pelayanan->user_id_ubah = $this->session->userdata('id_role');
        try {
            if ($m_pelayanan->save()) {
                $this->session->set_flashdata('message', 'Diedit');
                $data = [
                    'log'           => 'EDIT DATA PELAYANAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelayanan');
            } else {
                $this->session->set_flashdata('message', 'Gagal diedit');
                $data = [
                    'log'           => 'EDIT DATA PELAYANAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelayanan');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function hapus_pelayanan($id)
    {
        $m_pelayanan = M_pelayanan::find($id);
        try {
            if ($m_pelayanan->delete()) {
                $this->session->set_flashdata('message', 'Dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PELAYANAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelayanan');
            } else {
                $this->session->set_flashdata('message', 'Gagal dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PELAYANAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelayanan');
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
