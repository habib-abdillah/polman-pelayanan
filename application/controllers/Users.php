<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
        $data['tittle']     = 'Data Users';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['user']       = M_users::orderBy('created_at','asc')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/users', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_user()
    {
    	$m_user = new M_users();
        $m_user->id = random_string('alnum',13);
        $m_user->nama_user = $this->input->post('nama_user');
        $m_user->username = $this->input->post('username');
        $m_user->password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $m_user->id_role = $this->input->post('role');
        $m_user->keterangan = $this->input->post('keterangan');
        $m_user->status_aktif = "1";
        $m_user->user_id_buat = $this->session->userdata('id_role');
        $m_user->user_id_ubah = $this->session->userdata('id_role');

        try {
            if ($m_user->save()) {
                $this->session->set_flashdata('message', 'Disimpan');
                $data = [
                    'log'           => 'INPUT DATA USER',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            } else {
                $this->session->set_flashdata('message', 'Gagal disimpan');
                $data = [
                    'log'           => 'INPUT DATA USER',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            }
        } catch(Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_user()
    {
    	$m_user = M_users::find($this->input->post('id'));
        $m_user->nama_user = $this->input->post('nama_user');
        $m_user->username = $this->input->post('username');
        $m_user->password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $m_user->id_role = $this->input->post('role');
        $m_user->keterangan = $this->input->post('keterangan');
        $m_user->status_aktif = $this->input->post('status_aktif');
        $m_user->user_id_ubah = $this->session->userdata('id_role');

        try {
            if ($m_user->save()) {
                $this->session->set_flashdata('message', 'Diedit');
                $data = [
                    'log'           => 'EDIT DATA USER',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            } else {
                $this->session->set_flashdata('message', 'Gagal diedit');
                $data = [
                    'log'           => 'EDIT DATA USER',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            }
        } catch(Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function hapus_user($id){
        $m_user = M_users::find($id);
        try {
            if ($m_user->delete()) {
                $this->session->set_flashdata('message', 'Dihapus');
                $data = [
                    'log'           => 'HAPUS DATA USER',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            } else {
                $this->session->set_flashdata('message', 'Gagal dihapus');
                $data = [
                    'log'           => 'HAPUS DATA USER',
                    'detail_log'    => 'GAGAL   ',
                ];
                $this->session->set_userdata($data);
                $this->track();
                redirect('users');
            }
        } catch(Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function track(){
        $users = M_users::where('username', $this->session->userdata('username'))->take(1)->get();
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