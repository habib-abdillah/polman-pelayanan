<main>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-3 mt-4 ">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Data User</li>
        </ol>
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h4>Data Laporan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>
                                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>
                                    <input type="text" class="form-control" id="end_date" placeholder="End Date" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-1"><button id="filter" class="btn btn-secondary form-control">Filter</button></div>
                            <div class="col-1"><button id="reset" class="btn btn-warning form-control">Reset</button></div>
                        </div>
                    </div>
                    <table id="table_laporan" class="table table-striped display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Invoice</th>
                                <th>Nama Pelayanan</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody id="data_laporan">
                            <?php
                            $no = 1;
                            foreach ($laporan as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->id_transaksi; ?></td>
                                    <td><?= $value->nama_pelayanan; ?></td>
                                    <td><?= $value->qty; ?></td>
                                    <td>Rp. <?= number_format($value->harga); ?></td>
                                    <td>Rp. <?= number_format($value->subtotal); ?></td>
                                    <td>
                                        <?php
                                        $tanggal = $value->created_at;
                                        echo date("d F Y", strtotime($tanggal));
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>