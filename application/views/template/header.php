<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $tittle; ?> - Polman</title>
    <link href="<?= base_url('vendor/sbadmin/') ?>css/styles.css" rel="stylesheet" />
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Jquery Date Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">
            <img src="<?php echo base_url('assets/images/polman1.png') ?>" style="width: 120px;" class="ms-2 me-3 icon">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <?php
                        if ($this->session->userdata('id_role') == 1) {
                            $link = "user/admin";
                        } else {
                            $link = "user/operator";
                        } ?>
                        <a class="nav-link" href="<?= base_url($link); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-pen-to-square"></i></div>
                            Input Data Transaksi
                        </a>
                        <?php
                        if ($this->session->userdata('id_role') == 1) { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-database"></i></div>
                                Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('pelayanan'); ?>">Data Jenis Pelayanan</a>
                                    <a class="nav-link" href="<?= base_url('users'); ?>">Data User</a>
                                    <a class="nav-link" href="<?= base_url('pelanggan'); ?>">Data Pelanggan</a>
                                    <a class="nav-link" href="<?= base_url('pembayaran'); ?>">Data pembayaran</a>
                                    <a class="nav-link" href="<?= base_url('detailtransaksi'); ?>">Data Transaksi</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?= base_url('laporan'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-chart-line"></i></div>
                                Laporan
                            </a>
                        <?php } ?>
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-right-from-bracket"></i></div>
                            Logout
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer bg-light">
                    <hr class="sidebar-divider">
                    <div class="small">Logged in as:</div>
                    <?php foreach ($users as $value) {
                        echo $value->nama_user;
                    } ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" style="background: #E0E0E0;">