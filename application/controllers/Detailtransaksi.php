<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailtransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_track');
        $this->load->model('m_transaksi');
        $this->load->model('m_detailtransaksi');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Data Transaksi';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['transaksi']  = M_transaksi::select('ms_transaksi.id_transaksi', 'ms_transaksi.total', 'ms_transaksi.created_at', 'ms_transaksi.updated_at', 'ms_transaksi.timestamp', 'ms_users.nama_user')->join('ms_users', 'ms_users.id', '=', 'ms_transaksi.id_admin')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/view_transaksi', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_data()
    {
        if ($this->input->post('invoice')) {
            $detail = M_detailtransaksi::where('id_transaksi', $this->input->post('invoice'))->get();
            foreach ($detail as $isi) {
                echo "
                                <tr>
                                        <td>" . $isi['nama_pelayanan'] . "</td>
                                        <td align='right'>" . $isi['qty'] . "</td>
                                        <td align='right'>Rp. " . number_format($isi['harga']) . "</td>
                                        <td align='right'>Rp. " . number_format($isi['subtotal']) . "</td>
                                </tr>
                            
                        ";
            }
            $transaksi = M_transaksi::where('id_transaksi', $this->input->post('invoice'))->get();
            foreach ($transaksi as $value) {
                echo "
                                <tr style='background:#eee;border-bottom:1px solid #ddd;font-weight:bold;'>
                                        <td colspan='3'>Total</td>
                                        <td align='right'>Rp. " . number_format($value['total']) . "</td>
                                </tr>
                                <tr>
                                    <td height='80px' colspan='4' align='center'><b>Terimakasih !!</b></td>
                                </tr>
                                <tr>
                                    <td colspan='4' align='center'><b>Politeknik Manufaktur Negeri Bandung</b></td>
                                </tr>
                    ";
            }
        }
    }
}
