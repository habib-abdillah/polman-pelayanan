<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard Operator</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-xl-3 mb-2">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center">
                                <i class="fa-solid fa-user img-fluid rounded-start m-2" width="60"></i>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center">
                                <div class="card-body">
                                    <h5 class="card-title ">Pengguna</h5>
                                    <p class="card-text"><?= $user; ?> User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xl-3 mb-2">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center">
                                <i class="fa-solid fa-paperclip img-fluid rounded-start m-2" width="60"></i>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center">
                                <div class="card-body">
                                    <h5 class="card-title">Jenis Pelayanan</h5>
                                    <p class="card-text"><?= $pelayanan; ?> Jenis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xl-3 mb-2">
                <div class="card text-bg-secondary">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center">
                                <i class="fa-solid fa-user img-fluid rounded-start m-2" width="60"></i>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center">
                                <div class="card-body">
                                    <h5 class="card-title">Pelanggan</h5>
                                    <p class="card-text"><?= $pelanggan; ?> Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xl-3 mb-2">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center">
                                <i class="fa-solid fa-cart-shopping img-fluid rounded-start m-2" width="60"></i>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center">
                                <div class="card-body">
                                    <h5 class="card-title">Transaksi</h5>
                                    <p class="card-text"><?= $transaksi; ?> Transaksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Grafik Transasi Perbulan dalan 1 Tahun</h5>
                        <canvas id="lineChart2" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Grafik Penjualan Perbulan dalan 1 Tahun</h5>
                        <canvas id="lineChart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>