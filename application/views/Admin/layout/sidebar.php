<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin || App Pemilihan Ketua dan Wakil Ketua Osis</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="<?= base_url()?>/assets/vendors/summernote/summernote-lite.min.css">

    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">

</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><!--<img src="<?= base_url();?>/assets/images/logo/logo.png" alt="Logo" srcset="">--></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item active ">
                            <a href="<?= base_url("Admin")?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?= base_url("Admin/k_admin")?>">Kelola Admin</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?= base_url("Admin/k_kandidat")?>">Kelola Kandidat</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-select.html">Kelola Pemilih</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Hasil Voting</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= base_url('Auth/logoutAdmin')?>" class="sidebar-link">
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>