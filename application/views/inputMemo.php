<?php
defined('BASEPATH') or exit('No direct script access allowed');

// if (!isset($_SESSION["id_surat"])) { //jika tidak ada id
//    $this->session->set_flashdata('type', 'alert-danger');
//    $this->session->set_flashdata('pesan', '<strong>Error!</strong> Anda harus login terlebih dahulu');
//    redirect();
//    exit;
// }

?>
<!-- untuk daftar menu dst, cek header.php-->

<!-- Bootstrap Icons Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">


<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <ul class="navbar-nav ml-auto">
                <img src="img/kanisius.png">
            </ul>
        </nav>

        <div id="overlay"></div>

        <div id="spinner" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>

        <div class="container-fluid">

            <div class="menu"
                style="display: flex; justify-content: flex-start; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #ddd;">
                <a href="menu" class="menu-btn active">
                    <i class="bi bi-file-earmark-spreadsheet"></i>
                    <span>Tabel</span>
                </a>
                <a href="insert" class="menu-btn">
                    <i class="bi bi-file-earmark-plus"></i>
                    <span>Insert</span>
                </a>
            </div>

            <style>
                /* Tombol Menu */
                .menu-btn {
                    display: inline-block;
                    padding: 12px 20px;
                    margin: 0 10px;
                    font-size: 16px;
                    color: #fff;
                    background-color: #4b5320;
                    border-radius: 8px 8px 0 0;
                    transition: background-color 0.3s ease, transform 0.2s;
                    position: relative;
                    z-index: 1;
                    cursor: pointer;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                }

                .menu-btn.active {
                    background-color: #3e4520;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                }

                .menu-btn:hover {
                    background-color: #3a4a1c;
                    transform: translateY(-2px);
                    color: #fff;
                    text-decoration: none;
                }

                .menu-btn span {
                    margin-left: 4px;
                }

                /* Modal Tabel */

                /* Atur tabel agar mengikuti lebar modal */
                .table-fixed {
                    width: 100%;
                    table-layout: fixed;
                    border-collapse: collapse;
                }

                /* Header Tabel */
                .table-fixed thead th {
                    background-color: #4CAF50;
                    color: white;
                    font-weight: bold;
                    text-align: center;
                    padding: 12px;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    box-sizing: border-box;
                }

                /* Kolom Tabel dengan min-width */
                .table-fixed th,
                .table-fixed td {
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    padding: 10px;
                    font-size: 12px;
                    border: 1px solid #ddd;
                    box-sizing: border-box;
                    min-width: 50px;
                    /* Lebar minimum */
                }

                /* Tentukan lebar kolom untuk setiap kolom */
                .table-fixed th:nth-child(1),
                .table-fixed td:nth-child(1) {
                    width: 5%;
                    min-width: 40px;
                }

                .table-fixed th:nth-child(2),
                .table-fixed td:nth-child(2) {
                    width: 10%;
                    min-width: 80px;
                }

                .table-fixed th:nth-child(3),
                .table-fixed td:nth-child(3) {
                    width: 20%;
                    min-width: 120px;
                }

                .table-fixed th:nth-child(4),
                .table-fixed td:nth-child(4) {
                    width: 20%;
                    min-width: 120px;
                }

                .table-fixed th:nth-child(5),
                .table-fixed td:nth-child(5) {
                    width: 20%;
                    min-width: 120px;
                }

                .table-fixed th:nth-child(6),
                .table-fixed td:nth-child(6) {
                    width: 10%;
                    min-width: 80px;
                }

                .table-fixed th:nth-child(7),
                .table-fixed td:nth-child(7) {
                    width: 10%;
                    min-width: 80px;
                }

                .table-fixed th:nth-child(8),
                .table-fixed td:nth-child(8) {
                    width: 10%;
                    min-width: 80px;
                }

                /* Warna alternatif dan hover */
                .table-fixed tbody tr:nth-child(even) {
                    background-color: #f9f9f9;
                }

                .table-fixed tbody tr:hover {
                    background-color: #e9ecef;
                }

                /* Responsif */
                @media (max-width: 768px) {

                    .table-fixed th,
                    .table-fixed td {
                        font-size: 10px;
                        padding: 6px;
                    }
                }                
            </style>


            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Insert Surat Masuk</h1>
            </div>

            <!-- Alert untuk "set_flashdata", biarkan saja -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <?php if (isset($_SESSION["pesan"])) { ?>
                        <div class="alert <?= $_SESSION['type'] ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?= $_SESSION['pesan'] ?>

                        </div>
                    <?php unset($_SESSION['pesan']);
                    } ?>
                </div>
            </div>

            <!-- form input surat dari admin sekretaris (start) -->

            <form class="user" id="insertMasuk" action="<?= site_url("insert") ?>" method="post">
    <div class="form-group row">
        <div class="col-8">
            <!-- Header Section -->
            <div class="header p-3">
                <div class="form-group d-flex align-items-center">
                    <label for="nomor" class="mr-2" style="width: 150px;">Nomor</label>
                    <input type="text" style="width: 200px;" class="form-control text-left" name="nomor" id="nomor" readonly>
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="tanggal" class="mr-2" style="width: 150px;">Tanggal Input</label>
                    <input type="date" style="width: 200px;" class="form-control text-left" name="tanggal" id="tanggal">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="jenis" class="mr-2" style="width: 150px;">Jenis Surat</label>
                    <select class="form-control" style="width: 200px;" id="jenis" name="jenis">
                        <option>Surat</option>
                        <option>Email</option>
                        <option>Penawaran</option>
                    </select>
                </div>
            </div>

            <div class="border-top my-3"></div>

            <!-- Second Row -->
            <div class="header p-3">
                <div class="form-group d-flex align-items-center">
                    <label for="nomorSurat" class="mr-2" style="width: 150px;">Nomor Surat</label>
                    <input type="text" class="form-control text-left" name="nomorSurat" id="nomorSurat" placeholder="Nomor Surat" readonly>
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="nomorSuratFisik" class="mr-2" style="width: 150px;">Nomor Fisik Surat</label>
                    <input type="text" class="form-control text-left" name="nomorSuratFisik" id="nomorSuratFisik" placeholder="Nomor Fisik Surat">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="tanggalSurat" class="mr-2" style="width: 150px;">Tanggal Fisik Surat</label>
                    <input type="date" class="form-control text-left" name="tanggalSurat" id="tanggalSurat">
                </div>
            </div>

            <div class="form-group d-flex align-items-center">
                <label for="hal" class="mr-2" style="width: 170px;">Hal</label>
                <input type="text" class="form-control text-left" name="hal" id="hal" placeholder="Perihal Surat">
            </div>
        </div>

        <!-- File Upload Section -->
        <div class="col-4">
            <div class="custom-file d-flex justify-content-center align-items-center h-100">
                <input type="file" class="custom-file-input" name="file" id="customFile">
                <label class="custom-file-label d-flex justify-content-center align-items-center w-75" for="customFile">+</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group d-flex align-items-center">
                <label for="lampiran" class="mr-2" style="width: 155px;">Lampiran</label>
                <input type="text" class="form-control text-left" name="lampiran" id="lampiran" placeholder="Lampiran">
            </div>
            <div class="form-group">
                <label for="keterangan">Deskripsi</label>
                <textarea class="form-control text-left" id="keterangan" name="keterangan" rows="4" placeholder="Ringkasan Isi Surat"></textarea>
            </div>

            <div class="border-top my-3"></div>

            <!-- Relation Information Section -->
            <div class="form-group d-flex align-items-center">
                <label for="namaPerson" class="mr-2" style="width: 150px;">Cari Nama/Kode Relasi</label>
                <div class="input-group">
                    <input type="text" class="form-control text-left" name="namaPerson" id="namaPerson" placeholder="Nama/Kode Relasi">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" id="searchPerson" type="button" data-toggle="modal" data-target="#exampleModal">Cari</button>
                    </div>
                </div>
            </div>



                            <!-- Modal baru judul eror-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table id="tabel" class="display nowrap table table-striped table-bordered table-fixed text-nowrap" style="width:100%">
                                                    <thead style="color: black;">
                                                        <tr>
                                                            <th class="text-center align-middle">Milist ID</th>
                                                            <th class="text-center align-middle">Nama</th>
                                                            <th class="text-center align-middle">Lembaga</th>
                                                            <th class="text-center align-middle">Alamat</th>
                                                            <th class="text-center align-middle">Nama Kota</th>
                                                            <th class="text-center align-middle">Kode Pos</th>
                                                            <th class="text-center align-middle">Provinsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody" name="tbody" style="color: black; font-size: 12px;">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->



                            <div class="row form-group m-3">
                                <div class="col-2">
                                    <label for="kodeRelasi">Kode Relasi</label>
                                    <input type="text" class="form-control w-100 text-center" name="kodeRelasi" id="kodeRelasi" placeholder="kode Rlasi" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="nsmsLembaga">Nama Lembaga</label>
                                    <input type="text" class="form-control w-100 text-center" name="namaLembaga" id="namaLembaga" placeholder="Nama Lembaga" readonly>
                                </div>
                                <div class="col-8">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control w-100 text-center" name="alamat" id="alamat" placeholder="Alamat" readonly>
                                </div>
                            </div>

                            <div class="row m-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" class="form-control w-100 text-center" name="kota" id="kota" placeholder="Kota" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="propinsi">Propinsi</label>
                                        <input type="text" class="form-control w-100 text-center" name="propinsi" id="propinsi" placeholder="Propinsi" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kodepos">Kodepos</label>
                                        <input type="text" class="form-control w-100 text-center" name="kodepos" id="kodepos" placeholder="Kodepos" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                            <div class="row">
                                <div class="col">

                                    <!-- Disposisi 1 dan Person 1 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi1" class="col-sm-2 col-form-label">Disposisi 1</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi1" name="divisi1" onchange="getPersons(1)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg1" class="col-sm-2 col-form-label">Person 1</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="person1" id="dispoNoreg1">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Disposisi 2 dan Person 2 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi2" name="divisi2" onchange="getPersons(2)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="person2" id="dispoNoreg2">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi3" name="divisi3" onchange="getPersons(3)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 3</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="person3" id="dispoNoreg3">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi4" name="divisi4" onchange="getPersons(4)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 4</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="person4" id="dispoNoreg4">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi5" name="divisi5" onchange="getPersons(5)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="person5" id="dispoNoreg5">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Submit</button>
            </form>

            <!-- form insert (end) -->

        </div>

    </div>
    
</body>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>© <?php echo date("Y"); ?> PT Kanisius.</span>
            </div>
        </div>
    </footer>

</div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="vendor/datatables/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="vendor/datatables/dataTables.select.min.js"></script>

<!-- CKEditor -->
<script src="vendor/ckeditor/ckeditor.js"></script>
<script src="vendor/ckeditor/translations/id.js"></script>

<!-- xlsx -->
<script type="text/javascript" src="vendor/xlsx/xlsx.fix.js"></script>

<script>
    // gunakan Javascript dan jQuery

    $(document).ready(function() { // jika jalaman web selesai diload, maka jalankan script ini
        $('#menuMenu').trigger('click');

        //getContoh1();

        $('#tabel').DataTable({
            "scrollX": true,
            "select": true,
            "bSort": false
        });
    });


    $(document).ready(function() {
        // Saat tombol Cari diklik (untuk nama person)
        $('#searchPerson').on('click', function() {
            var namaPerson = $('#namaPerson').val();
            var namaLembaga = $('#namaLembaga').val();

            if (namaPerson.length > 0 || namaLembaga.length > 0) {
                $.ajax({
                    url: "<?php echo site_url('Controller/searchKodeRelasi'); ?>",
                    method: "POST",
                    data: {
                        person: namaPerson,
                        lembaga: namaLembaga
                    },
                    dataType: "json", // Mengharapkan respons JSON
                    success: function(data) {
                        $('#kodeRelasiList').empty(); // Bersihkan list sebelumnya

                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                $('#kodeRelasiList').append(
                                    '<a href="#" class="list-group-item list-group-item-action" data-id="' + item.milistId + '" data-nama="' + item.namaPerson + '" data-lembaga="' + item.lembaga + '" data-alamat="' + item.alamat + '" data-kota="' + item.kota + '" data-propinsi="' + item.propinsi + '" data-kodepos="' + item.kodepos + '">' +
                                    item.milistId + ' - ' + item.namaPerson +
                                    '</a>'
                                );
                            });
                        } else {
                            $('#kodeRelasiList').append('<li class="list-group-item">No Results Found</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Response Text:', xhr.responseText);
                    }
                });
            } else {
                $('#kodeRelasiList').html(''); // Kosongkan jika input kosong
            }
        });

        // Saat tombol Cari diklik (untuk nama lembaga)
        $('#searchLembaga').on('click', function() {
            var namaPerson = $('#namaPerson').val();
            var namaLembaga = $('#namaLembaga').val();

            if (namaPerson.length > 0 || namaLembaga.length > 0) {
                $.ajax({
                    url: "<?php echo site_url('Controller/searchKodeRelasi'); ?>",
                    method: "POST",
                    data: {
                        person: namaPerson,
                        lembaga: namaLembaga
                    },
                    dataType: "json", // Mengharapkan respons JSON
                    success: function(data) {
                        $('#kodeRelasiList').empty(); // Bersihkan list sebelumnya

                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                $('#kodeRelasiList').append(
                                    '<a href="#" class="list-group-item list-group-item-action" data-id="' + item.milistId + '" data-nama="' + item.namaPerson + '" data-lembaga="' + item.lembaga + '" data-alamat="' + item.alamat + '" data-kota="' + item.kota + '" data-propinsi="' + item.propinsi + '" data-kodepos="' + item.kodepos + '">' +
                                    item.milistId + ' - ' + item.namaPerson +
                                    '</a>'
                                );
                            });
                        } else {
                            $('#kodeRelasiList').append('<li class="list-group-item">No Results Found</li>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Response Text:', xhr.responseText);
                    }
                });
            } else {
                $('#kodeRelasiList').html(''); // Kosongkan jika input kosong
            }
        });

        // Saat user klik salah satu hasil dari list
        $(document).on('click', '.list-group-item', function(e) {
            e.preventDefault(); // Mencegah tindakan default link <a>

            console.log($(this).data());
            // Ambil data dari atribut 'data-'
            var milistId = $(this).data('id');
            var namaPerson = $(this).data('nama');
            var lembaga = $(this).data('namaLembaga');
            var alamat = $(this).data('alamat');
            var kota = $(this).data('kotanama');
            var propinsi = $(this).data('propNama');
            var kodepos = $(this).data('kodepos');

            // Isi form input dengan data yang dipilih
            $('#kodeRelasi').val(milistId);
            $('#namaPerson').val(namaPerson);
            $('#namaLembaga').val(lembaga);
            $('#alamat').val(alamat);
            $('#kota').val(kota);
            $('#propinsi').val(propinsi);
            $('#kodepos').val(kodepos);

            // Kosongkan list setelah memilih
            $('#kodeRelasiList').html('');
        });
    });


    // menggunakan AJAX untuk membuat tabel dari data tabel
    // AJAX (View) -> Controller -> Model -> dapat hasil

    // var html = '';
    // var no = 1;

    // $.ajax({
    //     url: "<?php echo base_url('Select/getAllData'); ?>",
    //     method: "GET",
    //     dataType: "JSON",
    //     async: false,
    //     success: function(data) {
    //         for (var i = 0; i < data.length; i++) {

    //             html += '<tr>';
    //             html += '<td class="text-center align-middle">' + no + '</td>';
    //             html += '<td class="text-center align-middle"><img src="' + data[i].pict_surat + '" alt="Gambar Surat" style="width: 100px; height: auto;"></td>';
    //             html += '<td class="text-center align-middle">' + data[i].title + '</td>';
    //             html += '<td class="text-center align-middle">' + data[i].description + '</td>';
    //             html += '<td class="text-center align-middle">' +
    //                 (data[i].status == 0 ?
    //                     'Tertunda <td class="text-center align-middle"><button type="button" class="btn btn-primary btn-kirim" data-id="' + data[i].id + '">Kirim</button></td>' :
    //                     'Terkirim <td class="text-center align-middle"> - </td>'
    //                 ) + '</td>';
    //             // html += '<td><button type="button" class="btn btn-danger">Hapus</button></td>';
    //             html += '</tr>';

    //             no++;
    //         }
    //         $("#tbody").html(html);
    //     }
    // });

    // $(document).on('click', '.btn-kirim', function() {
    //     var id = $(this).data('id'); 
    //     var button = $(this);

    //     $.ajax({
    //         url: '<?php echo base_url('Controller/sendEmail'); ?>', 
    //         type: 'POST',
    //         data: {
    //             id: id
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             alert('Email berhasil dikirim!');
    //             button.closest('td').html('Terkirim <td class="text-center align-middle"> - </td>');
    //         },
    //         error: function(xhr, status, error) {
    //             alert('Gagal mengirim email: ' + xhr.responseText);
    //         }
    //     });
    // });


    // kalau butuh input dari user
    function getContoh2() {
        var test = 'test';
        // var test = $('#nama_input_id).val();

        var url = "<?php echo base_url('Insert/contoh2?'); ?>";
        var urlBaru = url + "inputAjax=" + test;

        var html = '';
        var no = 1;

        $.ajax({
            url: urlBaru,
            method: "POST",
            dataType: "JSON",
            async: false,
            success: function(data) {
                for (var i = 0; i < data.length; i++) {

                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td></td>';
                    html += '<td></td>';
                    html += '<td></td>';
                    html += '</tr>';

                    no++;
                }
                $("#tbody").html(html);
            }
        });
    }
</script>

</body>

</html>