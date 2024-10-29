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

<div id="content-wrapper" class="d-flex flex-column">

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Memo Internal - Form Input</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Warna dasar dan tema */
body {
background-color: #e8f5e9; /* Hijau lembut background */
font-family: Arial, sans-serif;
color: #1b5e20; /* Hijau gelap teks */
}

.navbar {
background-color: #2e7d32; /* Hijau gelap navbar */
border-bottom: 2px solid #1b5e20;
}

.navbar a, .navbar img {
color: white;
}

.btn-menu {
padding: 12px 20px;
margin: 0 10px;
font-size: 16px;
text-decoration: none;
color: #1b5e20;
background-color: #a5d6a7; /* Hijau sedang */
border: 1px solid #81c784;
border-radius: 8px 8px 0 0;
transition: background-color 0.3s, color 0.3s;
}

.btn-menu.active,
.btn-menu:hover {
background-color: #2e7d32; /* Hijau gelap untuk hover */
color: white;
}

.divider {
border-top: 2px solid #1b5e20; /* Garis divider hijau gelap */
margin: 20px 0;
}

.custom-file-container {
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
height: 300px;
border: 1px dashed #4caf50; /* Border hijau */
border-radius: 8px;
cursor: pointer;
transition: border-color 0.3s;
background-color: #e8f5e9;
}

.custom-file-container:hover {
border-color: #1b5e20;
}

.custom-file-label {
text-align: center;
width: 100%;
padding: 20px;
color: #1b5e20;
}

.alert {
background-color: #a5d6a7;
color: #1b5e20;
border-left: 5px solid #2e7d32;
margin-top: 10px;
}

.form-control {
margin-bottom: 10px;
border: 1px solid #81c784;
background-color: #f1f8e9;
color: #1b5e20;
}

.form-control:focus {
border-color: #2e7d32;
box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
}

.btn-primary {
background-color: #2e7d32;
border-color: #2e7d32;
color: white;
transition: background-color 0.3s;
}

.btn-primary:hover {
background-color: #1b5e20;
}

h1, label {
color: #1b5e20;
}

.menu-btn {
                display: inline-block;
                padding: 12px 20px;
                margin: 0 10px;
                font-size: 16px;
                text-decoration: none;
                color: #fff;
                background-color: #4b5320;
                border: none;
                border-radius: 8px 8px 0 0;
                transition: background-color 0.3s ease, transform 0.2s;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .menu-btn.active {
                background-color: #3e4520;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .menu-btn:hover {
                background-color: #3e4520;
                transform: translateY(-2px);
                color: #fff;
                text-decoration: none; /* Menghilangkan garis bawah saat hover */
            }

            .menu-btn:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(75, 83, 32, 0.5);
            }
</style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Memo Internal</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <img src="img/kanisius.png" alt="Logo">
        </li>
    </ul>
</nav>

<div class="container mt-4">
    <div class="menu mb-3"
    style="display: flex; justify-content: flex-start; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #ddd;">
            <a href="memo" class="menu-btn active">
                <i class="bi bi-file-earmark-spreadsheet"></i> Tabel
            </a>
            <a href="inputMemo" class="menu-btn">
                <i class="bi bi-file-earmark-plus"></i> Insert
            </a>
    </div>

    <div class="form-section">
        <h3 class="text-center mb-4">Input / Koreksi Memo Internal</h3>

        <!-- Alert Pesan -->
        <?php if (isset($_SESSION["pesan"])): ?>
            <div class="alert <?= $_SESSION['type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['pesan'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['pesan']); ?>
        <?php endif; ?>

        <!-- Form Input -->
        <form action="<?= site_url('insert') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Nomor</label>
                    <input type="text" class="form-control text-center" value="1" readonly>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Input</label>
                    <input type="date" class="form-control text-center">
                </div>
            </div>

            <div class="border-divider"></div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label>Nomor Memo</label>
                    <input type="text" class="form-control text-center" placeholder="Nomor Fisik Memo">
                </div>
                <div class="col-md-6">
                    <label>Tanggal Memo</label>
                    <input type="date" class="form-control text-center">
                </div>
            </div>

            <div class="form-group">
                <label>Hal</label>
                <input type="text" class="form-control text-center" placeholder="Perihal Memo">
            </div>

            <div class="form-group">
                <label>Lampiran</label>
                <input type="text" class="form-control text-center" placeholder="Lampiran">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control text-center" rows="4" placeholder="Ringkasan Isi Memo"></textarea>
            </div>

            <div class="form-group">
                <label>Upload File</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih File...</label>
                </div>
            </div>

            <div class="border-divider"></div>

            <h5>Disposisi</h5>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Disposisi <?= $i ?></label>
                        <select class="form-control" name="divisi<?= $i ?>" onchange="getPersons(<?= $i ?>)">
                            <option value="">Pilih Divisi</option>
                            <?php foreach ($divisi as $d): ?>
                                <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Person <?= $i ?></label>
                        <select class="form-control" name="person<?= $i ?>">
                            <option value="">Pilih Person</option>
                        </select>
                    </div>
                </div>
            <?php endfor; ?>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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