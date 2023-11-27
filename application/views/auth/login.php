<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <title><?= $tittle ?> - Polman Pelayanan</title>
</head>

<body>
    <div class="container-sm min-vh-100 d-flex align-items-center">
        <div class="container ms-5">
            <div class="row mb-5">
                <div class="col-5 d-flex justify-content-between">
                    <img src="<?php echo base_url('assets/images/polman1.png') ?>" style="width: 90px;" class="me-3">
                    <img src="<?php echo base_url('assets/images/blu-kampus.png') ?>" style="width: 70px;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-5">
                    <p class="fs-3">Sistem <strong>Pelayanan</strong></p>
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
            <form action="<?= base_url('auth/index') ?>" method="post">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow" id="InputUsername" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                                <label for="InputUser">Username</label>
                                <?= form_error('username', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="password" class="form-control shadow" id="InputPassword" placeholder="Password" name="password">
                                <label for="InputPassword">Password</label>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-5 d-flex justify-content-end">
                        <a href="" class="text-secondary fs-6"><u>Lupa Password</u></a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-5">
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" type="submit">Masuk</button>
                        </div>
                        <div class="text-secondary mt-4">
                            <p>Polman Bandung</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>