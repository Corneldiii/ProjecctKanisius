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
                <h1 class="h3 mb-0 text-gray-800">Daftar Menu atau Tabel</h1>
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
                        <div class="header d-flex justify-content-between p-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor</label>
                                <input type="text" class="form-control w-25 text-center " id="nomor" value="1" aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Input</label>
                                <input type="date" class="form-control w-100 text-center " id="tanggal" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Surat</label>
                                <select class="form-control" id="jenis" style="width:300px;">
                                    <option>Surat</option>
                                    <option>Email</option>
                                    <option>Penawaran</option>
                                </select>
                            </div>
                        </div>
                        <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>
                        <div class="header d-flex p-3" style="gap: 30px;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Surat</label>
                                <input type="text" class="form-control w-100 text-center " id="nomorSurat" placeholder="Nomor Fisik Surat" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Fisik Surat</label>
                                <input type="date" class="form-control w-100 text-center " id="tanggalSurat" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="input-lanjutan">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hal</label>
                                <input type="text" class="form-control w-75 text-center " id="hal" placeholder="Perihal Surat" aria-describedby="emailHelp">
                            </div>
                        </div>

                    </div>
                    <div class="col-4 w-100" style="height:300px ;">
                        <!-- <label for="custom-file">Sisipkan File</label> -->
                        <div class="custom-file d-flex justify-content-between align-items-center w-100">
                            <input type="file" class="custom-file-input w-100" style="cursor: pointer;" id="customFile">
                            <label class="custom-file-label w-75 ml-5 d-flex  justify-content-center align-items-center" id="file" style="height:300px ; cursor:pointer;" for="customFile">+</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-lanjutan">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lampiran</label>
                                <input type="text" class="form-control w-75 text-center " id="lampiran" placeholder="Lampiran" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="description">Deskripsi:</label>
                                <textarea class="form-control w-75 text-center" id="keterangan" name="description" rows="4" placeholder="Ringksan Isi Surat" aria-describedby="emailHelp"></textarea>
                            </div>

                            <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                            <div class="form-group w-25">
                                <label for="kodeRelasi">Kode Relasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" id="kodeRelasi" placeholder="Kode Relasi" readonly>
                                    <div id="kodeRelasiList" class="list-group overflow-hidden"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namaPerson">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control w-75 text-center" id="namaPerson" placeholder="Nama">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" id="search" type="button">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaLembaga">Lembaga</label>
                                <input type="text" class="form-control w-75 text-center" id="namaLembaga" placeholder="Nama Lembaga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control w-75 text-center" id="alamat" placeholder="Alamat" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control w-75 text-center" id="kota" placeholder="Kota" readonly>
                            </div>
                            <div class="form-group">
                                <label for="propinsi">Propinsi</label>
                                <input type="text" class="form-control w-75 text-center" id="propinsi" placeholder="Propinsi" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kodepos">Kodepos</label>
                                <input type="text" class="form-control w-75 text-center" id="kodepos" placeholder="Kodepos" readonly>
                            </div>

                            <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                            <div class="row">
                                <div class="col">

                                    <!-- Disposisi 1 dan Person 1 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi1" class="col-sm-2 col-form-label">Disposisi 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoDivisi1" placeholder="Disposisi 1 (Divisi)">
                                        </div>
                                        <label for="dispoNoreg1" class="col-sm-2 col-form-label">Person 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoNoreg1" placeholder="Person 1 (Noreg)">
                                        </div>
                                    </div>

                                    <!-- Disposisi 2 dan Person 2 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoDivisi2" placeholder="Disposisi 2 (Divisi)">
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoNoreg2" placeholder="Person 2 (Noreg)">
                                        </div>
                                    </div>

                                    <!-- Disposisi 3 dan Person 3 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi3" class="col-sm-2 col-form-label">Disposisi 3</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoDivisi3" placeholder="Disposisi 3 (Divisi)">
                                        </div>
                                        <label for="dispoNoreg3" class="col-sm-2 col-form-label">Person 3</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoNoreg3" placeholder="Person 3 (Noreg)">
                                        </div>
                                    </div>

                                    <!-- Disposisi 4 dan Person 4 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi4" class="col-sm-2 col-form-label">Disposisi 4</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoDivisi4" placeholder="Disposisi 4 (Divisi)">
                                        </div>
                                        <label for="dispoNoreg4" class="col-sm-2 col-form-label">Person 4</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoNoreg4" placeholder="Person 4 (Noreg)">
                                        </div>
                                    </div>

                                    <!-- Disposisi 5 dan Person 5 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi5" class="col-sm-2 col-form-label">Disposisi 5</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoDivisi5" placeholder="Disposisi 5 (Divisi)">
                                        </div>
                                        <label for="dispoNoreg5" class="col-sm-2 col-form-label">Person 5</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dispoNoreg5" placeholder="Person 5 (Noreg)">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
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
        // Saat tombol Cari diklik
        $('#search').on('click', function() {
            // alert('test');
            var query = $('#namaPerson').val();

            // console.log(query);

            if (query.length > 0) {
                // alert('test');
                $.ajax({
                    url: "<?php echo site_url('Controller/searchKodeRelasi'); ?>",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#kodeRelasiList').html(data);
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


        // Saat user klik salah satu hasil
        $(document).on('click', '.list-group-item', function() {
            $('#kodeRelasi').val($(this).text());
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