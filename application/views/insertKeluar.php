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

        <div class="container-fluid">
            



            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Input/Koreksi Surat Keluar</h1>
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

            <form class="user" action="<?= site_url("insert") ?>" method="post">
                <div class="form-group row">
                    <div class="col-8">
                        <div class="header p-3">
                            <div class="form-group row mb-2">
                                <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-left" id="nomor" value="1" readonly
                                        style="width: 50%;">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Input</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-left" id="tanggal" style="width: 50%;">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="jenis" class="col-sm-3 col-form-label">Jenis Surat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="jenis" style="width: 50%;">
                                        <option>Surat</option>
                                        <option>Email</option>
                                        <option>Penawaran</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>
                        <div class="header p-3">
                            <div class="form-group row mb-2">
                                <label for="nomorSurat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-left" id="nomorSurat"
                                        placeholder="Nomor Fisik Surat" style="width: 50%;">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggalSurat" class="col-sm-3 col-form-label">Tanggal Fisik Surat</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-left" id="tanggalSurat"
                                        style="width: 50%;">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="hal" class="col-sm-3 col-form-label">Hal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-left" id="hal"
                                        placeholder="Perihal Surat" style="width: 50%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-8">
                        <div class="input-lanjutan">
                            <div class="header p-3">
                                <div class="form-group row mb-2">
                                    <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-left" id="lampiran"
                                            placeholder="Lampiran">
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-column mb-2">
                                    <label for="keterangan" class="col-form-label">Deskripsi:</label>
                                    <textarea class="form-control text-left" id="keterangan" name="description" rows="4"
                                        placeholder="Ringksan Isi Surat"></textarea>
                                </div>
                                <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;">
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="kodeRelasi" class="col-sm-3 col-form-label">Kode Relasi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-left" id="kodeRelasi"
                                                placeholder="Kode Relasi" readonly>
                                            <div id="kodeRelasiList" class="list-group overflow-hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="namaPerson" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-left" id="namaPerson"
                                                placeholder="Nama person">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" id="searchPerson"
                                                    type="button">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="namaLembaga" class="col-sm-3 col-form-label">Lembaga</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-left" id="namaLembaga"
                                                placeholder="Nama Lembaga">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" id="searchLembaga"
                                                    type="button">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-left" id="alamat"
                                            placeholder="Alamat" readonly style="height: 80px;"readonly >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-group row mb-2">
                                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-left" id="kota"
                                                    placeholder="Kota" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mb-2">
                                            <label for="propinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-left" id="propinsi"
                                                    placeholder="Propinsi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mb-2">
                                            <label for="kodepos" class="col-sm-3 col-form-label">Kodepos</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-left" id="kodepos"
                                                    placeholder="Kodepos" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-start mt-3">
                    <input type="file" id="customFile" style="display: none;">
                    <label for="customFile" class="btn btn-sm px-4"
                        style="background-color: #4B5320; color: white; cursor: pointer;">
                        <i class="bi bi-file-earmark-plus"></i>
                        <span> Sisipkan File</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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

    $(document).ready(function () { // jika jalaman web selesai diload, maka jalankan script ini
        $('#menuMenu').trigger('click');

        //getContoh1();

        $('#tabel').DataTable({
            "scrollX": true,
            "select": true,
            "bSort": false
        });
    });


    $(document).ready(function () {
        // Saat tombol Cari diklik (untuk nama person)
        $('#searchPerson').on('click', function () {
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
                    success: function (data) {
                        $('#kodeRelasiList').empty(); // Bersihkan list sebelumnya

                        if (data.length > 0) {
                            $.each(data, function (index, item) {
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
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Response Text:', xhr.responseText);
                    }
                });
            } else {
                $('#kodeRelasiList').html(''); // Kosongkan jika input kosong
            }
        });

        // Saat tombol Cari diklik (untuk nama lembaga)
        $('#searchLembaga').on('click', function () {
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
                    success: function (data) {
                        $('#kodeRelasiList').empty(); // Bersihkan list sebelumnya

                        if (data.length > 0) {
                            $.each(data, function (index, item) {
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
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Response Text:', xhr.responseText);
                    }
                });
            } else {
                $('#kodeRelasiList').html(''); // Kosongkan jika input kosong
            }
        });

        // Saat user klik salah satu hasil dari list
        $(document).on('click', '.list-group-item', function (e) {
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
            success: function (data) {
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