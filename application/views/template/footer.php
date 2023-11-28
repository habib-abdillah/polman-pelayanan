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
<script script script src="<?= base_url('assets/jQuery/jquery.mask.min.js') ?>"></script>
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
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true,
            // lengthChange: false,
            buttons: ['copy', 'excel', 'print', 'pdf', 'colvis'],
            dom: "<'row'<'col-md-3'l><'col-md-6 d-flex justify-content-center'B><'col-md-3'f>>" +
                "<'row'<'col-lg-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>"
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    $('#example1').DataTable({
        responsive: true,
        info: false,
        ordering: false,
        paging: false
    });
    $('#table-transaksi').DataTable({
        responsive: true,
        searching: false,
        info: false,
        ordering: false,
        paging: false
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('000.000.000', {
            reverse: true
        });
    })
</script>
<script>
    (() => {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
<script>
    $("#inputModal").on('hidden.bs.modal', function() {
        $(this).find('#inputForm')[0].reset();
        $(this).find('#inputForm').removeClass('was-validated')
    });

    $("#editModal").on('hidden.bs.modal', function() {
        $(this).find('#editForm')[0].reset();
        $(this).find('#editForm').removeClass('was-validated')
    });

    $("#resetpasswordModal").on('hidden.bs.modal', function() {
        $(this).find('#resetForm')[0].reset();
        $(this).find('#resetForm').removeClass('was-validated')
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#getdata', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var username = $(this).data('username');
            var role = $(this).data('role');
            var status = $(this).data('status');
            var keterangan = $(this).data('keterangan');
            $('#idedit').val(id);
            $('#editNamaUser').val(nama);
            $('#editUsername').val(username);
            $('#editRole').val(role);
            $('#editStatusAktif').val(status);
            $('#editKeterangan').val(keterangan);
            $('#idreset').val(id);
            // alert(role);
        })
        $(document).on('click', '#editPelanggan', function() {
            var idPelanggan = $(this).data('id');
            var nama = $(this).data('nama');
            var instansi = $(this).data('instansi');
            var status = $(this).data('status');
            var keterangan = $(this).data('keterangan');
            $('#idPelangganEdit').val(idPelanggan);
            $('#editNamaPelanggan').val(nama);
            $('#editNamaInstansi').val(instansi);
            $('#editStatusAktif').val(status);
            $('#editKeterangan').val(keterangan);
        })
        $(document).on('click', '#editPembayaran', function() {
            var idPembayaran = $(this).data('id');
            var jenis = $(this).data('jenis');
            var status = $(this).data('status');
            var keterangan = $(this).data('keterangan');
            $('#idPembayaranEdit').val(idPembayaran);
            $('#editJenisPembayaran').val(jenis);
            $('#editStatusAktif').val(status);
            $('#editKeterangan').val(keterangan);
        })
    })
</script>
<script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pelayanan').on('change', function() {
            var idpelayanan = $('#pelayanan option:selected').data('idpelayanan');
            var kodepelayanan = $('#pelayanan option:selected').data('kodepelayanan');
            var namapelayanan = $('#pelayanan option:selected').data('namapelayanan');
            var harga_pelayanan = $('#pelayanan option:selected').data('harga');
            var quantity = $('#quantity').val();
            // alert(harga_pelayanan);
        })
        $('.add_cart').click(function() {
            var idpelayanan = $('#pelayanan option:selected').data('idpelayanan');
            var kodepelayanan = $('#pelayanan option:selected').data('kodepelayanan');
            var namapelayanan = $('#pelayanan option:selected').data('namapelayanan');
            var harga_pelayanan = $('#pelayanan option:selected').data('harga');
            var quantity = $('#quantity').val();
            $.ajax({
                url: "<?php echo base_url(); ?>transaksi/add_to_cart",
                method: "POST",
                data: {
                    id_pelayanan: idpelayanan,
                    kode_pelayanan: kodepelayanan,
                    nama_pelayanan: namapelayanan,
                    harga_pelayanan: harga_pelayanan,
                    quantity: quantity
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
        });

        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url(); ?>transaksi/load_cart");

        //Hapus Item Cart
        $(document).on('click', '.hapus_cart', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?php echo base_url(); ?>transaksi/hapus_cart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                    $('#invoice_cart').html(data);
                }
            });
        });
    })
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.detail-data', function() {
            var invoice = $(this).data('invoice');
            var tanggal = $(this).data('created');
            var waktu = $(this).data('time');
            $('#kode_invoice').html(invoice);
            $('#tanggal_invoice').html(tanggal);
            $('#waktu_invoice').html(waktu);
            $.ajax({
                url: "<?php echo base_url(); ?>detailtransaksi/detail_data",
                method: "POST",
                data: {
                    invoice: invoice
                },
                success: function(data) {
                    $("#detail_data").html(data);
                    $('#detailModal').modal('show');
                }
            });
        })
        $('.save-data').click(function() {
            var kode_invoice = $('#kode_invoice').val();
            var pelanggan = $('#pelanggan').val();
            var pembayaran = $('#pembayaran').val();
            $.ajax({
                url: "<?= base_url('transaksi/tambah_transaksi') ?>",
                method: "post",
                data: {
                    kode_invoice: kode_invoice,
                    pelanggan: pelanggan,
                    pembayaran: pembayaran
                },
                success: function(data) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/detail_data",
                        method: "POST",
                        data: {
                            kode_invoice: kode_invoice
                        },
                        success: function(data) {
                            $("#invoice_data").html(data);
                            $('#invoiceModal').modal('show');
                        }
                    })
                }
            })
        });
        $("#invoiceModal").on('hidden.bs.modal', function() {
            location.reload();
        });
    })

    function printDiv() {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 10);
    }

    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });

    // Fecth Function
    function fetch(start_date, end_date) {
        $.ajax({
            url: "<?php echo base_url(); ?>laporan/filter_data",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                var i = "1";
                $('#table_laporan').DataTable({
                    responsive: true,
                    // lengthChange: false,
                    buttons: ['copy', 'excel', 'print', 'pdf', 'colvis'],
                    dom: "<'row'<'col-md-3'l><'col-md-6 d-flex justify-content-center'B><'col-md-3'f>>" +
                        "<'row'<'col-lg-12'tr>>" +
                        "<'row'<'col-md-5'i><'col-md-7'p>>",
                    data: data,
                    columns: [{
                            data: 'id_transaksi',
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                        {
                            data: 'id_transaksi'
                        },
                        {
                            data: 'nama_pelayanan'
                        },
                        {
                            data: 'qty'
                        },
                        {
                            data: 'harga',
                            "render": $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                        },
                        {
                            data: 'subtotal',
                            "render": $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                        },
                        {
                            data: 'created_at',
                            "render": function(data, type, row, meta) {
                                return moment(row.created_at).format('DD MMMM YYYY');
                            }
                        }
                    ]
                })
            }
        });
    }
    fetch();


    $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (start_date == "" || end_date == "") {
            Swal.fire({
                icon: "error",
                title: "Sorry",
                text: "Data tanggal diperlukan!"
            });
        } else {
            $('#table_laporan').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });
    $(document).on("click", "#reset", function(e) {
        e.preventDefault();
        $('#start_date').val('');
        $('#end_date').val('');

        $('#table_laporan').DataTable().destroy();
        fetch();
    });
</script>
</body>

</html>