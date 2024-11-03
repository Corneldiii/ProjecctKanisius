<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Surat</title>
    <link rel="icon" href="img/icon.png">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modal-login.css">
    <link rel="stylesheet" href="css/spiner.css">

    <!-- CSS jika diperlukan -->
    <style>
        textarea {
            resize: none;
        }

        .form-control {
            color: black !important;
        }

        .form-group {
            color: black !important;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-mail-bulk"></i> <!-- cari ikon di: https://fontawesome.com/v5/search?q=laptop-medical&o=r -->
                </div>
                <div class="sidebar-brand-text mx-3">SURAT</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser" id="menuUser">
                    <i class="fas fa-fw fa-user"></i>
                    <span> <?php echo $this->session->userdata('id_surat'); ?> </span> <!-- USER = nomor pegawai -->
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="<?= base_url('Controller/logout') ?>">Logout</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo" id="menuMenu">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>

                        <!-- Menu Surat Masuk dengan submenu -->
                        <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseSuratMasuk"
                            aria-expanded="false" aria-controls="collapseSuratMasuk">
                            Surat Masuk
                            <i class="fas fa-angle-down float-right"></i>
                        </a>
                        <div id="collapseSuratMasuk" class="collapse" aria-labelledby="headingSuratMasuk" data-parent="#collapseTwo">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="menu" style="white-space: normal;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-arrow-down" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-1.646a.5.5 0 0 1-.722-.016l-1.149-1.25a.5.5 0 1 1 .737-.676l.28.305V11a.5.5 0 0 1 1 0v1.793l.396-.397a.5.5 0 0 1 .708.708z" />
                                    </svg> Daftar Surat
                                </a>
                                <a class="collapse-item" href="insert" style="white-space: normal;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z" />
                                    </svg> Insert Surat
                                </a>
                            </div>
                        </div>

                        <!-- Menu Surat Keluar dengan submenu -->
                        <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseSuratKeluar"
                            aria-expanded="false" aria-controls="collapseSuratKeluar">
                            Surat Keluar
                            <i class="fas fa-angle-down float-right"></i>
                        </a>
                        <div id="collapseSuratKeluar" class="collapse" aria-labelledby="headingSuratKeluar" data-parent="#collapseTwo">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="menuKeluar" style="white-space: normal;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-arrow-up" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354 1.25 1.25a.5.5 0 0 1-.708.708L13 12.207V14a.5.5 0 0 1-1 0v-1.717l-.28.305a.5.5 0 0 1-.737-.676l1.149-1.25a.5.5 0 0 1 .722-.016" />
                                    </svg> Daftar Surat
                                </a>
                                <a class="collapse-item" href="insertKeluar" style="white-space: normal;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z" />
                                    </svg> Kirim Surat
                                </a>
                            </div>
                        </div>

                        <!-- Menu Memo Internal dengan submenu -->
                        <a class="collapse-item" href="#" data-toggle="collapse" data-target="#collapseMemoInternal"
                            aria-expanded="false" aria-controls="collapseMemoInternal">
                            Memo Internal
                            <i class="fas fa-angle-down float-right"></i>
                        </a>
                        <div id="collapseMemoInternal" class="collapse" aria-labelledby="headingMemoInternal" data-parent="#collapseTwo">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="memo" style="white-space: normal;">
                                    <i class="bi bi-journal"></i> Daftar Memo
                                </a>
                                <a class="collapse-item" href="inputMemo" style="white-space: normal;">
                                    <i class="bi bi-journal-plus"></i> Insert
                                </a>
                            </div>
                        </div>

                        <a class="collapse-item" href="insert" style="white-space: normal;">User</a>
                        <a class="collapse-item" href="insert" style="white-space: normal;">Laporan - laporan</a>
                    </div>
                </div>

            </li>
        </ul>