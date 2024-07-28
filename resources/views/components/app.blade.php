<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMUA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/') }}/template-admin/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('/') }}/template-admin/dist/img/logo.png" alt="AdminLTELogo" height="100" width="200">
        </div>

        <!-- Navbar -->
        <x-template.header />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-template.sidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <x-template.utils.notif />
                        </div>
                    </div>
                    {{ $slot }}
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <x-template.footer />

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/template-admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('/') }}/template-admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('/') }}/template-admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/') }}/template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('/') }}/template-admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ url('/') }}/template-admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ url('/') }}/template-admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('/') }}/template-admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ url('/') }}/template-admin/plugins/moment/moment.min.js"></script>
    <script src="{{ url('/') }}/template-admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('/') }}/template-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ url('/') }}/template-admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('/') }}/template-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/template-admin/dist/js/adminlte.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('/') }}/template-admin/plugins/chart.js/Chart.min.js"></script>
    @stack('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produkSelect = document.getElementById('id_produk');
            const stokTerjualInput = document.querySelector('input[name="stok_terjual"]');
            const totalHargaInput = document.querySelector('input[name="total_harga"]');

            produkSelect.addEventListener('change', calculateTotalHarga);
            stokTerjualInput.addEventListener('input', calculateTotalHarga);

            function calculateTotalHarga() {
                const selectedProduk = produkSelect.options[produkSelect.selectedIndex];
                const hargaProduk = selectedProduk.getAttribute('data-harga');
                const stokTerjual = stokTerjualInput.value;

                if (hargaProduk && stokTerjual) {
                    totalHargaInput.value = hargaProduk * stokTerjual;
                } else {
                    totalHargaInput.value = '';
                }
            }
        });
    </script>
</body>

</html>