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
                            <h4>Data Users</h4>
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
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status Aktif</th>
                                <th>Tanggal Buat</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_user; ?></td>
                                    <td><?= $value->username; ?></td>
                                    <td>
                                        <?php
                                        if ($value->id_role == 1) {
                                            echo "Admin";
                                        } elseif ($value->id_role == 2) {
                                            echo "Operator";
                                        } ?>
                                    </td>
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
                                        <a id="getdata" data-id="<?= $value->id; ?>" data-nama="<?= $value->nama_user; ?>" data-username="<?= $value->username; ?>" data-role="<?= $value->id_role; ?>" data-status="<?= $value->status_aktif; ?>" data-keterangan="<?= $value->keterangan; ?>" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                        <a href="<?= base_url('users/hapus_user/' . $value->id) ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                        <a id="getdata" data-id="<?= $value->id; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#resetpasswordModal">Reset Password</a>
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

<!-- Modal Tambah Data User -->
<div class="modal fade" id="inputModal" class="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/tambah_user') ?>" method="post" class="row needs-validation" id="inputForm" novalidate>
                <div class="modal-body">
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupNamaUser" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="formGroupNamaUser" placeholder="Masukan Nama User" name="nama_user" required>
                        <div class="invalid-feedback">
                            Tolong masukan nama user.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="formGroupUsername" placeholder="Masukan username" name="username" required>
                        <div class="invalid-feedback">
                            Tolong masukan username.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupRole" class="form-label">Role</label>
                        <select class="form-select" id="formGroupRole" aria-label="Default select example" name="role" required>
                            <option value="2">Operator</option>
                            <option value="1">Admin</option>
                        </select>
                        <div class="invalid-feedback">
                            Tolong pilih role
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="formGroupPassword" placeholder="Masukan username" name="password" required>
                        <div class="invalid-feedback">
                            Tolong masukan password.
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

<!-- Modal Edit Data User -->
<div class="modal fade" id="editModal" class="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/edit_user') ?>" method="post" class="row needs-validation" id="editForm" novalidate>
                <div class="modal-body">
                    <input type="text" name="id" id="idedit" hidden>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editNamaUser" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="editNamaUser" value="" placeholder="Masukan Nama User" name="nama_user" required>
                        <div class="invalid-feedback">
                            Tolong masukan nama user.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUsername" placeholder="Masukan username" name="username" required>
                        <div class="invalid-feedback">
                            Tolong masukan username.
                        </div>
                    </div>
                    <div class="mb-2 ms-2 me-2">
                        <label for="editRole" class="form-label">Role</label>
                        <select class="form-select" id="editRole" aria-label="Default select example" name="role" required>
                            <option selected value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                        <div class="invalid-feedback">
                            Tolong pilih role
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

<!-- Modal Edit Rest Password -->
<div class="modal fade" id="resetpasswordModal" class="resetpasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/reset_password') ?>" method="post" class="row needs-validation" id="resetForm" novalidate>
                <div class="modal-body">
                    <input type="hide" name="id" id="idreset" hidden>
                    <div class="mb-2 ms-2 me-2">
                        <label for="formGroupPasswordBaru" class="form-label">Password baru</label>
                        <input type="password" class="form-control" id="formGroupPasswordBaru" placeholder="Masukan Password Baru" name="password_baru" required>
                        <div class="invalid-feedback">
                            Tolong masukan password baru
                        </div>
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


<!-- Akhir Modal Rset Password -->