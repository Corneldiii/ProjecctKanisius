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
                <h1 class="h3 mb-0 text-gray-800">Insert Surat Keluar</h1>
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
                                <label for="nomorSurat" class="mr-0.5" style="width: 150px;">Nomor Surat</label>
                                <input type="text" class="form-control text-left" style="width: 200px;" name="nomorSurat" id="nomorSurat" placeholder="Nomor Surat" readonly>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="tanggal" class="mr-4" style="width: 125px;">Tanggal Input</label>
                                <input type="date" style="width: 200px;" class="form-control text-left" name="tanggal" id="tanggal">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="jenis" class="mr-4" style="width: 125px;">Jenis Surat *</label>
                                <select class="form-control" style="width: 200px;" id="jenis" name="jenis">
                                    <option>Surat</option>
                                    <option>Email</option>
                                    <option>Penawaran</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="file" class="mr-4" style="width: 150px;">Upload File</label>
                                <div class="custom-file d-flex justify-content-center align-items-center ml-4">
                                    <input type="file" class="custom-file-input" name="file" id="customFile" style="cursor: pointer;">
                                    <label class="custom-file-label d-flex justify-content-left align-items-center " for="customFile" style="cursor: pointer;color:black;">Masukan File</label>
                                </div>
                                <text class="ml-3 text-secondary" > (pdf,jpg,png,docx)</text>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                <div class="header p-3">

                    <div class="form-group d-flex align-items-center">
                        <label for="nomorSuratFisik" class="mr-0.5" style="width: 150px;">Nomor Fisik Surat *</label>
                        <input type="text" class="form-control text-left w-25" name="nomorSuratFisik" id="nomorSuratFisik" placeholder="Nomor Fisik Surat">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tanggalSurat" class="mr-0.5" style="width: 150px;">Tanggal Fisik Surat *</label>
                        <input type="date" class="form-control text-left w-25" name="tanggalSurat" id="tanggalSurat">
                    </div>
                </div>

                <div class="row">
                    <div class="col p-4">
                        <div class="input-lanjutan">
                            <div class="form-group d-flex align-items-center">
                                <label for="hal" class="mr-2" style="width: 145px;">Hal *</label>
                                <input type="text" class="form-control text-left w-50" name="hal" id="hal" placeholder="Perihal Surat">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="lampiran" class="mr-2" style="width: 145px;">Lampiran *</label>
                                <input type="text" class="form-control text-left w-50" name="lampiran" id="lampiran" placeholder="Lampiran">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="keterangan" class="mr-2" style="width: 145px;">Deskripsi *</label>
                                <textarea class="form-control text-left w-50" id="keterangan" name="keterangan" rows="4" placeholder="Ringkasan Isi Surat"></textarea>
                            </div>

                            <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                            <div class="form-group d-flex align-items-center">
                                <label for="namaPerson" class="mr-3" style="width: 135px;">Cari Nama/Kode Relasi *</label>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control text-left" name="namaPerson" id="namaPerson" placeholder="Nama/Kode Relasi">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" id="searchPerson" type="button">Cari</button>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal baru judul eror-->
                            <div class="modal fade" id="modalRelasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
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
                            </div>

                            <div class="header">
                                <div class="form-group d-flex align-items-center">
                                    <label for="kodeRelasi" class="mr-2 ml-1" style="width: 140px;">Kode Relasi *</label>
                                    <input type="text" class="form-control w-25 text-left" name="kodeRelasi" id="kodeRelasi" placeholder="kode Rlasi" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label for="nsmsLembaga" class="mr-2 ml-1" style="width: 140px;">Nama Lembaga *</label>
                                    <input type="text" class="form-control w-25 text-left" name="namaLembaga" id="namaLembaga" placeholder="Nama Lembaga" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label for="alamat" class="mr-2 ml-1" style="width: 140px;">Alamat *</label>
                                    <input type="text" class="form-control w-25 text-left" name="alamat" id="alamat" placeholder="Alamat" readonly>
                                </div>
                            </div>

                            <div class="header">
                                <div class="form-group d-flex align-items-center">
                                    <label for="kota" class="mr-3 ml-1" style="width: 130px;">Kota *</label>
                                    <input type="text" class="form-control w-25" name="kota" id="kota" placeholder="Kota" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label for="propinsi" class="mr-3 ml-1" style="width: 130px;">Propinsi *</label>
                                    <input type="text" class="form-control w-25" name="propinsi" id="propinsi" placeholder="Propinsi" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label for="kodepos" class="mr-3 ml-1" style="width: 130px;">Kodepos *</label>
                                    <input type="text" class="form-control w-25" name="kodepos" id="kodepos" placeholder="Kodepos" readonly>
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

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.querySelector('#customFile');
        const label = document.querySelector('label[for="customFile"]');

        fileInput.addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Masukan File';
            label.innerHTML = fileName;
        });
    });

    $(document).ready(function() {
        $('#menuMenu').trigger('click');


        $("#tbody").html(html);
        $("#tabel").DataTable({
            "select": true,
            "search": true,
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
                        $('#modalRelasi').modal('show');
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
                        $("#tbody").html(html);


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


        // $(document).on('click', '.list-group-item', function(e) {
        //     e.preventDefault();

        //     console.log($(this).data());
        //     var milistId = $(this).data('id');
        //     var namaPerson = $(this).data('nama');
        //     var lembaga = $(this).data('namaLembaga');
        //     var alamat = $(this).data('alamat');
        //     var kota = $(this).data('kotanama');
        //     var propinsi = $(this).data('propNama');
        //     var kodepos = $(this).data('kodepos');

        //     $('#kodeRelasi').val(milistId);
        //     $('#namaPerson').val(namaPerson);
        //     $('#namaLembaga').val(lembaga);
        //     $('#alamat').val(alamat);
        //     $('#kota').val(kota);
        //     $('#propinsi').val(propinsi);
        //     $('#kodepos').val(kodepos);
        //     $('#kodeRelasiList').html('');


        // });
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
        var kode = '2';
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
                if (typeof value === 'string' && !value.trim()) {
                    isEmpty = true;
                }
            });

            if (isEmpty) {
                $('#errorToastBody').text('Harap isi semua field sebelum mengirim data.');
                $('#errorToast').toast('show');
            } else {
                $("#spinner, #overlay").show();
                $.ajax({
                    url: '<?= site_url("Insert/insert_data") ?>',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {


                        $.ajax({
                            url: '<?= site_url("FonnteController/kirimPesan") ?>',
                            method: 'POST',
                            data: {
                                message: "Anda memiliki surat keluar baru dengan kode (" + kode + ") perihal " + perihal,
                                url: 'http://surat.test/'
                            },
                            success: function(response) {
                                setTimeout(function() {
                                    $("#spinner, #overlay").show();
                                    sessionStorage.setItem('showToast', 'true');
                                    sessionStorage.setItem('Message', 'Data berhasil di Simpan!!');
                                    window.location.href = '/menuKeluar';
                                }, 1000);
                            },
                            error: function(xhr, status, error) {
                                $("#spinner, #overlay").hide();
                                console.error('Error saat mengirim pesan:', error);
                                $('#errorToastBody').text('Terjadi kesalahan saat mengirim pesan: ' + (xhr.responseText || error));
                                $('#errorToast').toast('show');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        $("#spinner, #overlay").hide();
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