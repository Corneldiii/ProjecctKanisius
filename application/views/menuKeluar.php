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
            <div class="menu">
                <a href="menuKeluar" class="btn btn-primary">Tabel</a>
                <a href="insertKeluar" class="btn btn-primary">Insert</a>
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

            <div class="row">
                <div class="col">
                    <table id="tabel" class="display nowrap" style="width:100%">
                        <thead style="color: black;">
                            <tr>
                                <th style="width:10px" class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Agenda</th>
                                <th class="text-center align-middle">Tanggal</th>
                                <th class="text-center align-middle">No. Surat</th>
                                <th class="text-center align-middle">Kode</th>
                                <th class="text-center align-middle">Nama Person</th>
                                <th class="text-center align-middle">Nama Lembaga</th>
                                <th class="text-center align-middle">Hal</th>
                                <th class="text-center align-middle">Lampiran</th>
                                <th class="text-center align-middle">Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" name="tbody" style="color: black;">

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
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

    // menggunakan AJAX untuk membuat tabel dari data tabel
    // AJAX (View) -> Controller -> Model -> dapat hasil

    var html = '';
    var no = 1;

    $.ajax({
        url: "<?php echo base_url('Select/getAllData'); ?>",
        method: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            for (var i = 0; i < data.length; i++) {

                html += '<tr>';
                html += '<td class="text-center align-middle">' + no + '</td>';
                html += '<td class="text-center align-middle"><img src="' + data[i].pict_surat + '" alt="Gambar Surat" style="width: 100px; height: auto;"></td>';
                html += '<td class="text-center align-middle">' + data[i].title + '</td>';
                html += '<td class="text-center align-middle">' + data[i].description + '</td>';
                html += '<td class="text-center align-middle">' + data[i].description + '</td>';
                html += '<td class="text-center align-middle">' + data[i].description + '</td>';
                html += '<td class="text-center align-middle">' + data[i].description + '</td>';
                html += '<td class="text-center align-middle">' + data[i].description + '</td>';
                html += '<td class="text-center align-middle">' +
                    (data[i].status == 0 ?
                        'Tertunda <td class="text-center align-middle"><button type="button" class="btn btn-primary btn-kirim rounded-circle w-50 h-50" data-id="' + data[i].id + '">i  </button></td>' :
                        'Terkirim <td class="text-center align-middle"> - </td>'
                    ) + '</td>';

                // html += '<td><button type="button" class="btn btn-danger">Hapus</button></td>';
                html += '</tr>';

                no++;
            }
            $("#tbody").html(html);
        }
    });

    $(document).on('click', '.btn-kirim', function() {
        var id = $(this).data('id');
        var button = $(this);

        $.ajax({
            url: '<?php echo base_url('Controller/sendEmail'); ?>',
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response);
                alert('Email berhasil dikirim!');
                button.closest('td').html('Terkirim <td class="text-center align-middle"> - </td>');
            },
            error: function(xhr, status, error) {
                alert('Gagal mengirim email: ' + xhr.responseText);
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
</script>

</body>

</html>