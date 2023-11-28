<main>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-3 mt-4 ">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xl-6 col-lg-6 col-sm-6 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2 mb-3">
                                <div class="col-4">
                                    Tanggal
                                </div>
                                <div class="col-8">
                                    <input disabled type="text" class="form-control form-control-sm" name="date" value="<?= date('d / M / y'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Admin
                                </div>
                                <div class="col-8">
                                    <input disabled type="text" class="form-control form-control-sm" name="date" value="<?php foreach ($users as $value) {
                                                                                                                            echo $value->nama_user;
                                                                                                                        } ?>"></td>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-4">
                                    Kode Invoice
                                </div>
                                <div class="col-8">
                                    <?php foreach ($transaksi as $value) : ?>
                                        <?php
                                        $no = $value->id_transaksi;
                                        $urutan = (int) substr($no, 1);
                                        $urutan++;
                                        $huruf = "M";
                                        $kode = $huruf . sprintf("%04s", $urutan);
                                        ?>
                                    <?php endforeach; ?>
                                    <input disabled type="text" class="form-control form-control-sm" name="kode_invoice" value="<?= $kode; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2 mb-3">
                                <div class="col-4">
                                    Kode Barang
                                </div>
                                <div class="col-8">
                                    <select class="form-select form-select-sm" name="pelayanan" aria-label="Small select example" id="pelayanan">
                                        <?php foreach ($pelayanan as $value) : ?>
                                            <option value="<?= $value->kode_pelayanan; ?>" data-idpelayanan="<?= $value->id; ?>" data-kodepelayanan="<?= $value->kode_pelayanan; ?>" data-namapelayanan="<?= $value->nama_pelayanan; ?>" data-harga="<?= $value->harga; ?>">
                                                <?= $value->kode_pelayanan; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Quantity
                                </div>
                                <div class="col-8">
                                    <input type="number" id="quantity" class="form-control form-control-sm" name="qty" placeholder="Masukan Quantity">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col d-flex justify-content-center">
                                    <button name="add_cart" class="add_cart btn btn-success btn-sm"><i class="fa-solid fa-cart-shopping me-2"></i>Tambah ke Kerangjang </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-lg-6 col-sm-6 p-2">
                                    <div class="row">
                                        <div class="col-4">
                                            Pelanggan
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select form-select-sm" aria-label="Small select example" name="pelanggan" id="pelanggan">
                                                <?php foreach ($pelanggan as $value) : ?>
                                                    <option value="<?= $value->id; ?>"><?= $value->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-6 p-2">
                                    <div class="row">
                                        <div class="col-4">
                                            Metode Pembayaran
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select mb-2 form-select-sm" aria-label="Small select example" name="pembayaran" id="pembayaran">
                                                <?php foreach ($pembayaran as $value) : ?>
                                                    <option value="<?= $value->jenis_pembayaran; ?>"><?= $value->jenis_pembayaran; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="table-transaksi" class="table table-striped display responsive nowrap " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Jenis pelayanan</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_cart">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="card">
                    <div class="d-flex card-body">
                        <input type="text" class="form-control form-control-sm" name="kode_invoice" id="kode_invoice" value="<?= $kode; ?>">
                        <button type="submit" id="save_button" class="btn btn-primary ms-auto save-data">Simpan</button>
                        <!-- <button type=" button" id="save_button" class="btn btn-primary ms-auto save-data">see</button> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal Invoice -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Invoice</h1>
            </div>
            <div class="modal-body">
                <div id='DivIdToPrint'>
                    <table cellpadding="0" cellspacing="0">
                        <table style="border:0;width:100%;">
                            <thead>
                                <tr>
                                    <td colspan="4" align="center"><b>Pelayanan Polman</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">Jl. Kanayakan No.21, Dago, 40135</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center"><b>Contact:</b> (022) 2500241</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Tanggal:</b> <?= date('d / M / y'); ?></span> </td>
                                    <td colspan="2" align="right"><b>No Invoice:</b> <?= $kode; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Admin: </b>
                                        <?php foreach ($users as $value) {
                                            echo $value->nama_user;
                                        } ?>
                                    </td>
                                    <td colspan="2" align="right"><b>Waktu:</b> <?= date('H:i:s'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center"><b>INVOICE</b></td>
                                </tr>
                                <tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
                                    <td>
                                        Pelayanan
                                    </td>
                                    <td align="right">
                                        Qty
                                    </td>
                                    <td align="right">
                                        Harga
                                    </td>
                                    <td align="right">
                                        Total
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="invoice_data">
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick='printDiv();'>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Invoice -->