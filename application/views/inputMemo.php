<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: fixed; top: 20px; right: 20px;">
            <div class="toast-header">
                <strong class="mr-auto text-success">Sukses</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Data berhasil disimpan!
            </div>
        </div>

        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: fixed; top: 20px; right: 20px;">
            <div class="toast-header">
                <strong class="mr-auto text-danger">Error</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body" id="errorToastBody">
            </div>
        </div>


        <div class="container-fluid">

            <style>
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
                <h1 class="h3 mb-0 text-gray-800">Insert Memo Internal</h1>
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
                                <label for="nomor" class="mr-4" style="width: 125px;">Nomor</label>
                                <input type="text" style="width: 200px;" class="form-control text-center" name="nomor" id="nomor" readonly>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="tanggal" class="mr-4" style="width: 125px;">Tanggal Input</label>
                                <input type="date" style="width: 200px;" class="form-control text-center" name="tanggal" id="tanggal">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="jenis" class="mr-4" style="width: 125px;">Jenis Surat</label>
                                <select class="form-control" style="width: 200px;" id="jenis" name="jenis">
                                    <option>Surat</option>
                                    <option>Email</option>
                                    <option>Penawaran</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="file" class="mr-4" style="width: 125px;">Upload File</label>
                                <div class="custom-file d-flex justify-content-center align-items-center ml-4">
                                    <input type="file" class="custom-file-input" name="file" id="customFile" style="cursor: pointer;">
                                    <label class="custom-file-label d-flex justify-content-left align-items-center w-75" for="customFile" style="cursor: pointer;">Masukan File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                <div class="header p-3">
                    <div class="form-group d-flex align-items-center">
                        <label for="nomorSurat" class="mr-0.5" style="width: 150px;">Nomor Surat</label>
                        <input type="text" class="form-control text-left w-25" name="nomorSurat" id="nomorSurat" placeholder="Nomor Surat" readonly>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nomorSuratFisik" class="mr-0.5" style="width: 150px;">Nomor Fisik Surat</label>
                        <input type="text" class="form-control text-left w-25" name="nomorSuratFisik" id="nomorSuratFisik" placeholder="Nomor Fisik Surat">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tanggalSurat" class="mr-0.5" style="width: 150px;">Tanggal Fisik Surat</label>
                        <input type="date" class="form-control text-left w-25" name="tanggalSurat" id="tanggalSurat">
                    </div>
                </div>

                <div class="row">
                    <div class="col p-4">
                        <div class="input-lanjutan">
                            <div class="form-group d-flex align-items-center">
                                <label for="hal" class="mr-2" style="width: 145px;">Hal</label>
                                <input type="text" class="form-control text-left w-50" name="hal" id="hal" placeholder="Perihal Surat">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="lampiran" class="mr-2" style="width: 145px;">Lampiran</label>
                                <input type="text" class="form-control text-left w-50" name="lampiran" id="lampiran" placeholder="Lampiran">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="keterangan" class="mr-2" style="width: 145px;">Deskripsi</label>
                                <textarea class="form-control text-left w-50" id="keterangan" name="keterangan" rows="4" placeholder="Ringkasan Isi Surat"></textarea>
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

    $(document).ready(function() {
        $('#menuMenu').trigger('click');


        $("#tbody").html(html);
        $("#tabel").DataTable({
            "select": true,
            "scrollX": true,
            "bSort": false,
            "scrollY": '427px',
            "scrollCollapse": true,
        });


        $('#tabel tbody').on('click', 'tr', function() {
            var milistId = $(this).find('td').eq(0).text();
            var namaPerson = $(this).find('td').eq(1).text();
            var alamat = $(this).find('td').eq(3).text();
            var kota = $(this).find('td').eq(4).text();
            var kodepos = $(this).find('td').eq(5).text();
            var propinsi = $(this).find('td').eq(6).text();
            var namaLembaga = $(this).find('td').eq(2).text();

            $('#namaPerson').val(namaPerson);
            $('#kodeRelasi').val(milistId);
            $('#alamat').val(alamat);
            $('#kota').val(kota);
            $('#kodepos').val(kodepos);
            $('#propinsi').val(propinsi);
            $('#namaLembaga').val(namaLembaga);

            $('#modalRelasi').modal('hide');
        });
    });

    var no = 1;
    var html = '';


    $(document).ready(function() {
        $('#searchPerson').on('click', function() {
            var namaPerson = $('#namaPerson').val();
            var namaLembaga = $('#namaLembaga').val();

            if (namaPerson.length > 0 || namaLembaga.length > 0) {
                $.ajax({
                    url: "<?php echo site_url('Controller/searchKodeRelasi'); ?>",
                    method: "POST",
                    data: {
                        person: namaPerson
                    },
                    beforeSend: function() {
                        console.log("msauk");
                        $("#spinner, #overlay").show();
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#kodeRelasiList').empty();


                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                html += '<tr>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.milistId ? item.milistId : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.namaPerson ? item.namaPerson : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.namaLembaga ? item.namaLembaga : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.alamat ? item.alamat : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.kotanama ? item.kotanama : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.kodepos ? item.kodepos : '-') + '</td>';
                                html += '<td class="text-center align-middle" style="cursor:pointer;">' + (item.pronama ? item.pronama : '-') + '</td>';

                                html += '</tr>';

                                no++;
                            });
                            $("#tbody").html(html);

                        } else {
                            $('#kodeRelasiList').append('<li class="list-group-item">No Results Found</li>');
                        }
                    },
                    complete: function() {
                        $("#spinner, #overlay").hide();
                        $('#tabel').DataTable().destroy();

                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Response Text:', xhr.responseText);
                    }
                });
            } else {
                $('#kodeRelasiList').html('');
            }
        });
    });

    function getPersons(dispoNumber) {
        var divisiID = document.getElementById('dispoDivisi' + dispoNumber).value;

        if (divisiID) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '<?= base_url("get-persons/") ?>' + encodeURIComponent(divisiID), true);
            xhr.onload = function() {
                if (this.status === 200) {
                    console.log(this.responseText);
                    try {
                        var persons = JSON.parse(this.responseText);
                        console.log(persons);

                        var select = document.getElementById('dispoNoreg' + dispoNumber);
                        select.innerHTML = '<option value="">Pilih Person</option>';

                        persons.forEach(function(person) {
                            var option = document.createElement('option');
                            option.value = person.userId;
                            option.text = person.userNama;
                            select.appendChild(option);
                        });
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                    }
                } else {
                    console.error('Error fetching persons:', this.statusText);
                }
            };

            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send();
        } else {
            document.getElementById('dispoNoreg' + dispoNumber).innerHTML = '<option value="">Pilih Person</option>';
        }
    }

    $(document).ready(function() {
        var kode = '3';
        var divisi = '<?php echo $kodeDiv; ?>';
        console.log(divisi);
        var noFinal = '<?php echo ($noFinal === '0000') ? $noFinal = '0001' : str_pad($noFinal + 1, 4, "0", STR_PAD_LEFT); ?>';
        var Tahun = new Date().getFullYear().toString().substring(2);
        var urut = noFinal !== '' ? noFinal : '0001';
        console.log(urut);

        var kodeForm = '<?php echo $kodeForm + 1 ?>';
        console.log(kodeForm + 'cek');
        $('#nomor').val(kodeForm);

        var tanggalInput = new Date().toISOString().split('T')[0];
        $('#tanggal').val(tanggalInput);

        var kodeSurat = kode + Tahun + divisi + urut;
        console.log(kodeSurat);
        $('#nomorSurat').val(kodeSurat);

    });



    $(document).ready(function() {
        $('#insertMasuk').on('submit', function(event) {
            event.preventDefault();
            var kode = $('#nomorSurat').val();
            var perihal = $('#hal').val();

            var formData = new FormData(this);
            var isEmpty = false;

            formData.forEach((value, key) => {
                if (typeof value === 'string' && !value.trim() && !['divisi2', 'divisi3', 'divisi4', 'divisi5', 'person2', 'person3', 'person4', 'person5'].includes(key) ) {
                    isEmpty = true;
                }
            });

            if (isEmpty) {
                $('#errorToastBody').text('Harap isi semua field sebelum mengirim data.');
                $('#errorToast').toast('show');
            } else {
                $.ajax({
                    url: '<?= site_url("Insert/insert_Memo") ?>',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#successToast').toast('show');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saat menyimpan data:', error);
                        $('#errorToastBody').text('Terjadi kesalahan saat menyimpan data: ' + (xhr.responseText || error));
                        $('#errorToast').toast('show');
                    }
                });
            }
        });
    });





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

    // Tanggal otomatis
    document.addEventListener('DOMContentLoaded', (event) => {
        let today = new Date().toISOString().substr(0, 10);
        document.querySelector("#tanggal").value = today;
    });
</script>
</body>

</html>