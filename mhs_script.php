<!-- jQuery -->
<script src="../assets_adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets_adminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets_adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets_adminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets_adminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets_adminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets_adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets_adminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets_adminLTE/plugins/moment/moment.min.js"></script>
<script src="../assets_adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets_adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets_adminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets_adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets_adminLTE/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets_adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets_adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../assets_adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets_adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets_adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets_adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": []
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