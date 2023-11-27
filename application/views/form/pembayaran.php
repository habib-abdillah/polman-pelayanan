<main>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-3 mt-4 ">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
        </ol>
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h4>Data Pembayaran</h4>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inputModal">Tambah Data</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pembayaran</th>
                                <th>Status Aktif</th>
                                <th>Keterangan</th>
                                <th>Tanggal Buat</th>
                                <th>Tanggal Edit</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pembayaran as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->jenis_pembayaran; ?></td>
                                    <td>
                                        <?php
                                        if ($value->status_aktif == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        } ?>
                                    </td>
                                    <td><?= $value->keterangan; ?></td>
                                    <td>
                                        <?php
                                        $tanggal = $value->created_at;
                                        echo date("d F Y", strtotime($tanggal));
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $tanggal = $value->updated_at;
                                        echo date("d F Y", strtotime($tanggal));
                                        ?>
                                    </td>
                                    <td>
                                        <button id="editPembayaran" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $value->id; ?>" data-jenis="<?= $value->jenis_pembayaran; ?>" data-status="<?= $value->status_aktif; ?>" data-keterangan="<?= $value->keterangan; ?>">Edit</button>
                                        <a href="<?= base_url('pembayaran/hapus_pembayaran/' . $value->id) ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input data pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pembayaran/tambah_pembayaran') ?>" method="post" class="row needs-validation" name="input" id="inputForm" novalidate>
                <div class="modal-body">
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupJenisPembayaran" class="form-label">Jenis Pembayaran</label>
                        <input type="text" class="form-control" id="formGroupJenisPembayaran" placeholder="Masukan jenis pembayaran" name="jenis_pembayaran" required>
                        <div class="invalid-feedback">
                            Tolong masukan jenis pembayaran.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="TextAreaKeterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="TextAreaKeterangan" rows="2" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Tambah Data -->

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" class="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pembayaran/edit_pembayaran') ?>" method="post" class="row needs-validation" id="editForm" novalidate>
                <div class="modal-body">
                    <input type="hide" name="id" id="idPembayaranEdit" hidden>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editJenisPembayaran" class="form-label">Jenis Pembayaran</label>
                        <input type="text" class="form-control" id="editJenisPembayaran" value="" placeholder="Masukan Jenis Pembayaran" name="jenis_pembayaran" required>
                        <div class="invalid-feedback">
                            Tolong masukan jenis pembayaran.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editStatusAktif" class="form-label">Status Aktif</label>
                        <select class="form-select" id="editStatusAktif" aria-label="Default select example" name="status_aktif" required>
                            <option selected value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <div class="invalid-feedback">
                            Tolong masukan status keaktifan.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editKeterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="editKeterangan" rows="2" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Edit Data -->