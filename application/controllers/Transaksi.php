<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model('m_track');
        $this->load->model('m_transaksi');
        $this->load->model('m_pelayanan');
        $this->load->model('m_pelanggan');
        $this->load->model('m_transaksi');
        $this->load->model('m_pembayaran');
        $this->load->model('m_detailtransaksi');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('auth');
            redirect($url);
        };
    }

    public function index()
    {
        $data['tittle']     = 'Transaksi';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['pelayanan']  = M_pelayanan::all();
        $data['pelanggan']  = M_pelanggan::where('status_aktif', 1)->get();
        $data['transaksi']  = M_transaksi::orderBy('id_transaksi', 'desc')->take(1)->get();
        $data['pembayaran'] = M_pembayaran::where('status_aktif', 1)->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/transaksi', $data);
        $this->load->view('template/footer', $data);
    }

    public function table_transaksi()
    {
        $data['tittle']     = 'Data Transaksi';
        $data['users']      = M_users::where('username', $this->session->userdata('username'))->get();
        $data['transaksi']  = M_transaksi::join('ms_users', 'ms_users.id_user', '=', 'ms_transaksi.id_admin')->get();
        $data['d_transaksi'] = M_transaksi::join('trs_detail', 'trs_detail.id_transaksi', '=', 'ms_transaksi.id_transaksi')->get();
        $this->load->view('template/header', $data);
        $this->load->view('form/view_transaksi', $data);
        $this->load->view('template/footer', $data);
    }

    function add_to_cart()
    { //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('id_pelayanan'),
            'name' => $this->input->post('nama_pelayanan'),
            'price' => $this->input->post('harga_pelayanan'),
            'qty' => $this->input->post('quantity')
        );
        // alert($data);
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    function show_cart()
    { //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                                <tr>
                                        <td>' . $items['name'] . '</td>
                                        <td>' . number_format($items['price']) . '</td>
                                        <td>' . $items['qty'] . '</td>
                                        <td>' . number_format($items['subtotal']) . '</td>
                                        <td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                                </tr>
                        ';
        }
        $output .= '
                        <tr>
                                <th colspan="3">Total</th>
                                <th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
                        </tr>
                ';
        return $output;
    }

    function load_cart()
    { //load data cart
        echo $this->show_cart();
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    public function tambah_transaksi()
    {
        $this->tambah_detail_transaksi();
        $m_transaksi = new M_transaksi();
        $m_transaksi->id_transaksi = $this->input->post('kode_invoice');
        $m_transaksi->total = $this->cart->total();
        $m_transaksi->id_pelanggan = $this->input->post('pelanggan');
        $m_transaksi->id_admin = $this->session->userdata('id_user');
        $m_transaksi->metode_pembayaran = $this->input->post('pembayaran');
        try {
            if ($m_transaksi->save()) {
                $this->session->set_flashdata('message', 'Disimpan');
                $data = [
                    'log'           => 'INPUT DATA TRANSAKSI',
                    'detail_log'    => 'BERHASIL',
                ];
                $this->session->set_userdata($data);
                $this->cart->destroy();
                $this->track();
                redirect('transaksi');
            } else {
                $data = [
                    'log'           => 'INPUT DATA TRANSAKSI',
                    'detail_log'    => 'GAGAL',
                ];
                $this->session->set_userdata($data);
                $this->track();
                $this->session->set_flashdata('message', 'Gagal disimpan');
                redirect('transaksi');
            }
        } catch (Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function tambah_detail_transaksi()
    {
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $m_detailtransaksi = new M_detailtransaksi();
            $m_detailtransaksi->id_transaksi = $this->input->post('kode_invoice');
            $m_detailtransaksi->id_pelayanan = $items['id'];
            $m_detailtransaksi->nama_pelayanan = $items['name'];
            $m_detailtransaksi->harga = $items['price'];
            $m_detailtransaksi->qty = $items['qty'];
            $m_detailtransaksi->subtotal = $items['subtotal'];
            $m_detailtransaksi->save();
        }
    }

    public function detail_data()
    {
        $kode = $this->input->post('kode_invoice');
        $detail = M_detailtransaksi::where('id_transaksi', $kode)->get();
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
        $total = M_transaksi::where('id_transaksi', $kode)->get();
        foreach ($total as $isi) {
            echo "
                                <tr style='background:#eee;border-bottom:1px solid #ddd;font-weight:bold;'>
                                        <td colspan='3'>Total</td>
                                        <td align='right'>Rp. " . number_format($isi['total']) . "</td>
                                </tr>
                                <tr>
                                    <td height='80px' colspan='4' align='center'><b>Terimakasih !!</b></td>
                                </tr>
                                <tr>
                                    <td colspan='4' align='center'><b>Politeknik Manufaktur</b></td>
                                </tr>
                                <tr>
                                    <td colspan='4' align='center'><b>Negeri Bandung</b></td>
                                </tr>

                        ";
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
