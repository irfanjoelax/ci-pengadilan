<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= APP_TITLE ?></title>
    <link rel="shortcut icon" href="<?= base_url(LOGO_URL) ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/_all-skins.min.css">
    <?php if (isset($datatable)) : ?>
        <link rel="stylesheet" href="<?= base_url() ?>asset/css/dataTables.bootstrap.min.css">
    <?php endif; ?>
    <?php if (isset($summernote)) : ?>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <?php endif; ?>
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini"><strong><?= substr(APP_TITLE_SHORT, 0, 2) ?></strong></span>
                <span class="logo-lg"><strong><?= APP_TITLE_SHORT ?></strong></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url(LOGO_URL) ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?= $this->session->userdata('fullname_user'); ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url(LOGO_URL) ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->session->userdata('fullname_user'); ?>
                                        <small> <?= ucwords($this->session->userdata('level_user')); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= site_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a onclick="return confirm(`Apakah Anda Yakin Ingin Keluar Dari Aplikasi?`)" href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url(LOGO_URL) ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> <?= $this->session->userdata('name_user'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?= ($active == 'dashboard') ? 'active' : '' ?>">
                        <a href="<?= site_url('dashboard') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('level_user') == 'admin') : ?>
                        <li class="<?= ($active == 'user') ? 'active' : '' ?>">
                            <a href="<?= site_url('user') ?>">
                                <i class="fa fa-users"></i> <span>User</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="header">FITUR UTAMA</li>
                    <?php
                    $level_user = $this->session->userdata('level_user');

                    $level_kejaksaan = [
                        'kejaksaan_minahasa', 'kejaksaan_minahasa_selatan', 'kejaksaan_tomohon'
                    ];

                    $level_lapas = [
                        'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
                    ];

                    $level_kepolisian = [
                        'kepolisian_minahasa', 'kepolisian_minahasa_tenggara', 'kepolisian_tomohon'
                    ];

                    if ($level_user == 'admin') {
                        $this->load->view('layouts/nav-admin');
                    }

                    if ($level_user == 'panitera_pengganti') {
                        $this->load->view('layouts/nav-panitera-pengganti');
                    }

                    if ($level_user == 'ketua_pn') {
                        $this->load->view('layouts/nav-ketua-pn');
                    }

                    if ($level_user == 'majelis_hakim') {
                        $this->load->view('layouts/nav-majelis-hakim');
                    }

                    if (in_array($level_user, $level_kejaksaan)) {
                        $this->load->view('layouts/nav-kejaksaan');
                    }

                    if (in_array($level_user, $level_lapas)) {
                        $this->load->view('layouts/nav-lapas');
                    }

                    if (in_array($level_user, $level_kepolisian)) {
                        $this->load->view('layouts/nav-kepolisian');
                    }

                    ?>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 class="font-weight-bold">
                    <strong><?= $header ?></strong>
                </h1>
                <small class="text-muted"><?= $subheader ?></small>
            </section>

            <!-- Main content -->
            <section class="content">