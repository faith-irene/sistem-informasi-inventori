<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
<?php $level = $this->session->userdata('role'); ?>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap4/css/bootstrap.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/') ?>font-awesome.min.css">
  <!-- JQueryUI -->
  <link rel="stylesheet" href="<?= base_url('assets/jquery-ui/jquery-ui.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/ion-icon/css/') ?>ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/icheck-bootstrap/') ?>icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/OverlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/summer-notes/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/jdcb/css/dataTables.checkboxes.css') ?>">
  <!-- jQuery -->
<script src="<?= base_url('assets/js/') ?>jquery.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fa fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fa fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fa fa-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('images/app_pic/') ?>simi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I M I</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('images/user_pic/default_user_pic.jpg') ?>" class="img-circle elevation-5" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama_user'); ?></a>
        </div>
      </div>
<!-- Sidebar menu -->
<!-- START PHP -->
          <?php
              $queryMenu = "SELECT `user_menu`.`id_menu`,`title`,`icon`,`url` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu` WHERE `user_access_menu`.`id_user` = $level ORDER BY `user_access_menu`.`id_menu` ASC";
              $menu = $this->db->query($queryMenu)->result_array();
              
          ?>
<!-- END PHP -->

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- BUNGUL -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php
          foreach ($menu as $m) :
            $menuId = $m['id_menu'];
            $submenuQuery = "SELECT * from `user_submenu` where `id_menu` = $menuId";
            $submenu = $this->db->query($submenuQuery); 
          if ($submenu->num_rows() > 0) { ?>
          <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon <?= $m['icon']; ?>"></i>
                <p>
                  <?= $m['title']; ?>
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <?php foreach ($submenu->result_array() as $sm ) : ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= $sm['url']; ?>" class="nav-link">
                      <i class="nav-icon fa fa-circle-thin"></i>
                        <p>
                            <?= $sm['title']; ?>
                        </p>
                    </a>
                  </li>
                </ul>
                <?php endforeach; ?>
          </li> 
                <?php } else {  ?>
                  <li class="nav-item">
            <a href="<?= $m['url']; ?>" class="nav-link">
              <i class="nav-icon <?= $m['icon']; ?>"></i>
              <p>
                <?= $m['title']; ?>
              </p>
            </a>
          </li>
                  <?php } endforeach; ?> 
                  <!-- logout -->
                  <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fa fa-arrow-circle-right"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
    </nav>

          
          
         
        
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  