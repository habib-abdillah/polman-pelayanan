<main>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-3 mt-4 ">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Data Pelayanan</li>
        </ol>
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h4>Data Pelayanan</h4>
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
                                <th>Kode</th>
                                <th>Nama Pelayanan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pelayanan as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->kode_pelayanan; ?></td>
                                    <td><?= $value->nama_pelayanan; ?></td>
                                    <td>Rp. <?= number_format($value->harga); ?></td>
                                    <td>
                                        <?php
                                        if ($value->status_aktif == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php
                                        $tanggal = $value->created_at;
                                        echo date("d F Y", strtotime($tanggal));
                                        ?>
                                    </td>
                                    <td><?= $value->keterangan; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $value->id; ?>">Edit</button>
                                        <a href="<?= base_url('pelayanan/hapus_pelayanan/' . $value->id) ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input data pelayanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/tambah_pelayanan') ?>" method="post" class="row needs-validation" name="inputPelayanan" id="inputForm" novalidate>
                <div class="modal-body">
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupKodePelayanan" class="form-label">Kode Pelayanan</label>
                        <input type="text" class="form-control" id="formGroupKodePelayanan" placeholder="Masukan Kode Pelayanan" name="kode_pelayanan" required>
                        <div class="invalid-feedback">
                            Tolong masukan kode pelayanan.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupNamaPelayanan" class="form-label">Nama Pelayanan</label>
                        <input type="text" class="form-control" id="formGroupNamaPelayanan" placeholder="Masukan Nama Pelayanan" name="nama_pelayanan" required>
                        <div class="invalid-feedback">
                            Tolong masukan nama pelayanan.
                        </div>
                    </div>
                    <div cl ass="mb-2 ms-2 me-2">
                        <div class="mb-2 ms-2 me-2">
                            <label for="formGroupNamaharga" class="form-label">Harga</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                <input type="text" class="uang form-control" id="formGroupNamaharga" aria-describedby="inputGroupPrepend" name="harga" placeholder="Masukan Harga" required>
                                <div class="invalid-feedback">
                                    Tolong masukan harga.
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 ms-2 me-2">
                            <label for="TextAreaKeterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="TextAreaKeterangan" rows="2" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                        </div>
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
<?php
$no = 0;
foreach ($pelayanan as $value) : $no++; ?>
    <div class="modal fade" id="editModal<?= $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data pelayanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('pelayanan/edit_pelayanan') ?>" method="post" class="row needs-validation" name="inputPelayanan" id="inputForm" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $value->id; ?>">
                        <div class="mb-2 ms-2 me-2">
                            <label for="formGroupKodePelayanan" class="form-label">Kode Pelayanan</label>
                            <input type="text" class="form-control" id="formGroupKodePelayanan" placeholder="Masukan Kode Pelayanan" name="kode_pelayanan" value="<?= $value->kode_pelayanan; ?>" required>
                            <div class="invalid-feedback">
                                Tolong masukan kode pelayanan.
                            </div>
                        </div>
                        <div class="mb-2 ms-2 me-2">
                            <label for="formGroupNamaPelayanan" class="form-label">Nama Pelayanan</label>
                            <input type="text" class="form-control" id="formGroupNamaPelayanan" placeholder="Masukan Nama Pelayanan" name="nama_pelayanan" value="<?= $value->nama_pelayanan; ?>" required>
                            <div class="invalid-feedback">
                                Tolong masukan nama pelayanan.
                            </div>
                        </div>
                        <div class="mb-2 ms-2 me-2">
                            <label for="formGroupNamaharga" class="form-label">Harga</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                <input type="text" class="uang form-control" id="formGroupNamaharga" aria-describedby="inputGroupPrepend" name="harga" placeholder="Masukan Harga" value="<?= $value->harga; ?>" required>
                                <div class="invalid-feedback">
                                    Tolong masukan harga.
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 ms-2 me-2">
                            <label for="formGroupStatusAktif" class="form-label">Status Aktif</label>
                            <select class="form-select" id="formGroupStatusAktif" aria-label="Default select example" name="status_aktif" required>
                                <?php if ($value->status_aktif == 1) : ?>
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                <?php else : ?>
                                    <option selected value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong masukan status keaktifan.
                            </div>
                        </div>
                        <div class="mb-2 ms-2 me-2">
                            <label for="TextAreaKeterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="TextAreaKeterangan" rows="2" name="keterangan" placeholder="Masukan Keterangan"><?= $value->keterangan; ?></textarea>
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
<?php endforeach; ?>
<!-- Akhir Modal Edit Data -->