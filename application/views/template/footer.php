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
<script src="<?= base_url('assets/jQuery/jquery.mask.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('vendor/sbadmin/') ?>js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script>
    var table = $('#example').DataTable();
    new $.fn.dataTable.Responsive(table, {
        details: false
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
    $('#inputModal').on('hidden.bs.modal', function(e) {
        $(this).find('#inputForm')[0].reset();
        $('#inputForm')
            .removeClass('was-validated')
    });
</script>
<script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js')?>"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert.js')?>"></script>
</body>
</html>