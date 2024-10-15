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
        <div class="menu"
                style="display: flex; justify-content: flex-start; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #ddd;">
                <a href="menu" class="btn btn-primary active"
                    style="display: inline-block; padding: 12px 20px; margin: 0 10px; font-size: 16px; text-decoration: none; color: #555; border: 1px solid #ddd; border-bottom: none; background-color: #f9f9f9; border-radius: 8px 8px 0 0; transition: background-color 0.3s ease, color 0.3s ease;">Tabel</a>
                <a href="insert" class="btn btn-primary"
                    style="display: inline-block; padding: 12px 20px; margin: 0 10px; font-size: 16px; text-decoration: none; color: #555; border: 1px solid #ddd; border-bottom: none; background-color: #f9f9f9; border-radius: 8px 8px 0 0; transition: background-color 0.3s ease, color 0.3s ease;">Insert</a>
        </div>

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
                                <input type="date" class="form-control w-80 text-center " id="tanggal" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group ms-3">
                                <label for="exampleInputEmail1">Jenis Surat</label>
                                <select class="form-control" id="jenis" style="width:200px;">
                                    <option>Surat</option>
                                    <option>Email</option>
                                    <option>Penawaran</option>
                                </select>
                            </div>
                        </div>
                        <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>
                        <div class="header d-flex p-3" style="gap: 30px;">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Nomor Surat</label>
                                <input type="text" class="form-control w-70 text-center " id="nomorSurat" placeholder="Nomor Fisik Surat" aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Fisik Surat</label>
                                <input type="text" class="form-control w-70 text-center " id="nomorSuratFisik" placeholder="Nomor Fisik Surat" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Fisik Surat</label>
                                <input type="date" class="form-control w-70 text-center " id="tanggalSurat" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="input-lanjutan">
                            <div class="form-group ">
                                <label for="exampleInputEmail1" >Hal</label>
                                <input type="text" class="form-control w-80 text-center " id="hal" placeholder="Perihal Surat" aria-describedby="emailHelp">
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
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Lampiran</label>
                                <input type="text" class="form-control w-75 text-center " id="lampiran" placeholder="Lampiran" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group d-flex flex-column ">
                                <label for="description">Deskripsi:</label>
                                <textarea class="form-control w-75 text-center" id="keterangan" name="description" rows="4" placeholder="Ringksan Isi Surat" aria-describedby="emailHelp"></textarea>
                            </div>

                            <div class="border-top mb-3 bg-dark" style="border-top: 2px solid black; height: 0;"></div>

                            <div class="form-group w-25 m-4 ">
                                <label for="kodeRelasi">Kode Relasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" id="kodeRelasi" placeholder="Kode Relasi" readonly>
                                    <div id="kodeRelasiList" class="list-group overflow-hidden"></div>
                                </div>
                            </div>

                            <div class="form-group row m-3">
                                <div class="col">
                                    <label for="namaPerson">Nama</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control w-75 text-center" id="namaPerson" placeholder="Nama person">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" id="searchPerson" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="namaLembaga">Lembaga</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control w-75 text-center" id="namaLembaga" placeholder="Nama Lembaga">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" id="searchLembaga" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-4">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control w-75 text-center" id="alamat" placeholder="Alamat" readonly>
                            </div>

                            <div class="row m-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" class="form-control w-75 text-center" id="kota" placeholder="Kota" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="propinsi">Propinsi</label>
                                        <input type="text" class="form-control w-75 text-center" id="propinsi" placeholder="Propinsi" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kodepos">Kodepos</label>
                                        <input type="text" class="form-control w-75 text-center" id="kodepos" placeholder="Kodepos" readonly>
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
                                            <select class="form-control" id="dispoDivisi1" onchange="getPersons(1)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg1" class="col-sm-2 col-form-label">Person 1</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoNoreg1">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Disposisi 2 dan Person 2 -->
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi2" onchange="getPersons(2)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoNoreg2">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi3" onchange="getPersons(3)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 3</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoNoreg3">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi4" onchange="getPersons(4)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 4</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoNoreg4">
                                                <option value="">Pilih Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dispoDivisi2" class="col-sm-2 col-form-label">Disposisi 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoDivisi5" onchange="getPersons(5)">
                                                <option value="">Pilih Divisi</option>
                                                <?php foreach ($divisi as $d): ?>
                                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="dispoNoreg2" class="col-sm-2 col-form-label">Person 2</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="dispoNoreg5">
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
                    dataType: "json", 
                    success: function(data) {
                        $('#kodeRelasiList').empty(); 

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
                $('#kodeRelasiList').html('');
            }
        });

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
                    dataType: "json", 
                    success: function(data) {
                        $('#kodeRelasiList').empty();

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
                $('#kodeRelasiList').html(''); 
            }
        });


        $(document).on('click', '.list-group-item', function(e) {
            e.preventDefault();

            console.log($(this).data());
            var milistId = $(this).data('id');
            var namaPerson = $(this).data('nama');
            var lembaga = $(this).data('namaLembaga');
            var alamat = $(this).data('alamat');
            var kota = $(this).data('kotanama');
            var propinsi = $(this).data('propNama');
            var kodepos = $(this).data('kodepos');

            $('#kodeRelasi').val(milistId);
            $('#namaPerson').val(namaPerson);
            $('#namaLembaga').val(lembaga);
            $('#alamat').val(alamat);
            $('#kota').val(kota);
            $('#propinsi').val(propinsi);
            $('#kodepos').val(kodepos);

            $('#kodeRelasiList').html('');


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
        var kode = '1';
        var divisi = '<?php echo $kodeDiv; ?>';
        var noFinal = '<?php echo str_pad($noFinal + 1, 4, "0", STR_PAD_LEFT); ?>';
        console.log(noFinal);
        var Tahun = new Date().getFullYear().toString().substring(2);
        var urut = noFinal !== '' ? noFinal : '0001';

        var kodeSurat = kode + divisi + Tahun + urut;
        console.log(kodeSurat);
        $('#nomorSurat').val(kodeSurat);

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