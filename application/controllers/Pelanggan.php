<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_pelanggan');
        $this->load->model('m_track');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Data Pelanggan';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['pelanggan']  = M_pelanggan::orderBy('created_at', 'asc')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/pelanggan', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_pelanggan()
    {
        $m_pelanggan = new M_pelanggan();
        $m_pelanggan->id = random_string('alnum', 13);
        $m_pelanggan->nama = $this->input->post('nama_pelanggan');
        $m_pelanggan->instansi = $this->input->post('nama_instansi');
        $m_pelanggan->keterangan = $this->input->post('keterangan');
        $m_pelanggan->status_aktif = "1";
        $m_pelanggan->user_id_buat = $this->session->userdata('id_role');
        $m_pelanggan->user_id_ubah = $this->session->userdata('id_role');

        try {
            if ($m_pelanggan->save()) {
                $this->session->set_flashdata('message', 'Disimpan');
                $data = [
                    'log'           => 'INPUT DATA PELANGGAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
            } else {
                $this->session->set_flashdata('message', 'Gagal disimpan');
                $data = [
                    'log'           => 'INPUT DATA PELANGGAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_pelanggan()
    {
        $m_pelanggan = M_pelanggan::find($this->input->post('id'));
        $m_pelanggan->nama = $this->input->post('nama_pelanggan');
        $m_pelanggan->instansi = $this->input->post('nama_instansi');
        $m_pelanggan->keterangan = $this->input->post('keterangan');
        $m_pelanggan->status_aktif = $this->input->post('status_aktif');
        $m_pelanggan->user_id_ubah = $this->session->userdata('id_role');

        try {
            if ($m_pelanggan->save()) {
                $this->session->set_flashdata('message', 'Diedit');
                $data = [
                    'log'           => 'EDIT DATA PELANGGAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
            } else {
                $this->session->set_flashdata('message', 'Gagal diedit');
                $data = [
                    'log'           => 'EDIT DATA PELANGGAN',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function hapus_pelanggan($id)
    {
        $m_pelanggan = M_pelanggan::find($id);
        try {
            if ($m_pelanggan->delete()) {
                $this->session->set_flashdata('message', 'Dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PELANGGAN',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
            } else {
                $this->session->set_flashdata('message', 'Gagal dihapus');
                $data = [
                    'log'           => 'HAPUS DATA PELANGGAN',
                    'detail_log'    => 'GAGAL   ',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('pelanggan');
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
            $m_track->header_reference  = $value->id_user;
            $m_track->detail_reference  = $this->session->userdata('detail_log');
        }

        $m_track->save();
    }
}
