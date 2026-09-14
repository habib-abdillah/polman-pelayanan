<footer class="py-4 mt-auto" style="background: #E0E0E0;">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Polman Bandung <?= date('Y'); ?></div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/jQuery/jquery-3.7.1.min.js') ?>"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js "> </script>
<script src="<?= base_url('assets/jQuery/jquery.mask.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('vendor/sbadmin/') ?>js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<!-- Button Datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<!-- Number Format datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.7/dataRender/intl.js"></script>
<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<!-- Custom Javascrip -->
<script type="text/javascript" src="<?= base_url('assets/js/pelayanan.js') ?>"></script>
<!-- SweetAlert -->
<script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert.js') ?>"></script>
<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";
</script>
<script>
    var dataBulan   = [];
    var dataJumlah  = [];
    var dataBulan2  = [];
    var dataInvoice = [];

    var monthNames = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                      "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    <?php if (!empty($chartBulan)) : ?>
        <?php foreach ($chartBulan as $value) : ?>
            dataBulan.push(monthNames[<?= (int)$value->bulan ?>]);
            dataJumlah.push(<?= (int)$value->jumlah ?>);
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($chartTransaksi)) : ?>
        <?php foreach ($chartTransaksi as $value) : ?>
            dataBulan2.push(monthNames[<?= (int)$value->bulan ?>]);
            dataInvoice.push(<?= (int)$value->jumlah ?>);
        <?php endforeach; ?>
    <?php endif; ?>

    if (document.getElementById('lineChart')) {
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: dataBulan,
                datasets: [{
                    label: "Data Penjualan Per-Bulan (Qty)",
                    data: dataJumlah,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: true } },
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    if (document.getElementById('lineChart2')) {
        new Chart(document.getElementById('lineChart2'), {
            type: 'line',
            data: {
                labels: dataBulan2,
                datasets: [{
                    label: "Data Transaksi Per-Bulan",
                    data: dataInvoice,
                    fill: false,
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: true } },
                scales: { y: { beginAtZero: true } }
            }
        });
    }
</script>
</body>

</html>