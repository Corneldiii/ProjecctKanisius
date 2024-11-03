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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modal-login.css">
    <link rel="stylesheet" href="css/spiner.css">

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
                    <i class="fas fa-mail-bulk"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SURAT</div>
            </a>
            
            <hr class="sidebar-divider my-0">
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                   aria-expanded="true" aria-controls="collapseUser" id="menuUser">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Login sebagai USER</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="<?= base_url('Controller/logout')?>">Logout</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo" id="menuMenu">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Contoh Menu</span>
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
                                    <i class="bi bi-file-earmark-spreadsheet"></i> Tabel
                                </a>
                                <a class="collapse-item" href="insert" style="white-space: normal;">
                                    <i class="bi bi-file-earmark-plus"></i> Insert
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
                                    <i class="bi bi-file-earmark-spreadsheet"></i> Tabel
                                </a>
                                <a class="collapse-item" href="insertKeluar" style="white-space: normal;">
                                    <i class="bi bi-file-earmark-plus"></i> Insert
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
                                    <i class="bi bi-file-earmark-spreadsheet"></i> Tabel
                                </a>
                                <a class="collapse-item" href="inputMemo" style="white-space: normal;">
                                    <i class="bi bi-file-earmark-plus"></i> Insert
                                </a>
                            </div>
                        </div>

                        <a class="collapse-item" href="insert" style="white-space: normal;">User</a>
                        <a class="collapse-item" href="insert" style="white-space: normal;">Laporan - laporan</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>
