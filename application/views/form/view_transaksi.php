<main>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-3 mt-4 ">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Data Transaksi</li>
        </ol>
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="p-2">
                        <h4>Data Transaksi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Total Transaksi</th>
                                <th>Admin Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->id_transaksi; ?></td>
                                    <td>Rp. <?= number_format($value->total); ?></td>
                                    <td><?= $value->nama_user; ?></td>
                                    <td>
                                        <?php
                                        $tanggal = $value->created_at;
                                        echo date("d F Y", strtotime($tanggal));
                                        ?></td>
                                    <td>
                                        <button id="detail-data" type="button" class="btn btn-warning btn-sm detail-data" data-invoice="<?= $value->id_transaksi; ?>" data-admin="<?= $value->nama_user ?>" data-created="<?= date("d / M / y", strtotime($value->created_at)); ?>" data-time="<?= date('H:i:s', strtotime($value->timestamp)); ?>"><i class="fa-regular fa-eye"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Detail Data -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <td colspan="2"><b>Tanggal:</b> <span id="tanggal_invoice"></span> </td>
                                    <td colspan="2" align="right"><b>No Invoice:</b> <span id="kode_invoice"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Admin: </b>
                                        <?php foreach ($users as $value) {
                                            echo $value->nama_user;
                                        } ?>
                                    </td>
                                    <td colspan="2" align="right"><b>Waktu:</b> <span id="waktu_invoice"></span></td>
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
                            <tbody id="detail_data">
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="printDiv()">Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Detail Data -->