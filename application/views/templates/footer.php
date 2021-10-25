<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- DataTable -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/jdcb/js/dataTables.checkboxes.min.js') ?>"></script>
<!-- Moment JS -->
<script src="<?= base_url('assets/js/') ?>moment-with-locales.min.js"></script>
<!-- Popper JS -->
<script src="<?= base_url('assets/js/') ?>popper.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets') ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Typehead -->
<script src="<?= base_url('assets/js/typeahead.bundle.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/bootstrap4/js/') ?>bootstrap.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets'); ?>/summer-notes/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets'); ?>/OverlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/js/adminlte.js"></script>
<!-- skrip khusus jquery -->
<script>
  var url = "<?= base_url() ?>";
  var base_url = "<?= base_url('pegawai/crud_barang') ?>";
  var add_url = "<?= base_url('pegawai/get_kodebarang') ?>";
  var show_url = "<?= base_url('pegawai/show_barang') ?>";
  var ls_url = "<?= base_url('pegawai/livejenis') ?>";
</script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script>
$(document).ready( function(){
  $("#example").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "sScrollY": "400",
      "bScrollColapse": true,
      "columnDefs": [
    { "width": "10%", "targets": 0   }, { "width": "10px", "targets": 1 }, { "width": "50%", "targets": 2 }
  ]
  });

  $("#tbl_merk").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "pageLength": 5,
      "autoWidth": false,
      "responsive": true,
      "sScrollY": "250",
      "bScrollColapse": true,
      "columnDefs": [
    { "width": "10%", "targets": 0   }, { "width": "10px", "targets": 1 }, { "width": "50%", "targets": 2 }
  ]
  });
});
</script>
</body>
</html>
