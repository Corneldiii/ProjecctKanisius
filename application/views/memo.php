<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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

            <style>
                .btn-circle {
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #ffc107;
                    color: white;
                    font-size: 16px;
                    transition: background-color 0.3s ease;
                }

                .btn-circle:hover {
                    background-color: #90ee90;
                    /* Hijau muda */
                    color: white;
                }

                .modal-body {
                    padding: 20px;
                    background-color: #f9f9f9;
                }

                .detail-section {
                    margin-bottom: 15px;
                    padding: 10px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .detail-section h6 {
                    font-weight: bold;
                    border-bottom: 2px solid #007bff;
                    margin-bottom: 10px;
                    padding-bottom: 5px;
                }

                .detail-label {
                    font-weight: bold;
                    color: #333;
                    margin-right: 5px;
                }

                .detail-value {
                    color: #555;
                }
            </style>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Surat Masuk</h1>
            </div>

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
                                <th style="width:10px" class="text-center align-middle">No. Memo</th>
                                <th class="text-center align-middle">Tgl Input</th>
                                <th class="text-center align-middle">No. Memo</th>
                                <th class="text-center align-middle">Tgl Memo</th>
                                <th class="text-center align-middle">Tujuan</th>
                                <th class="text-center align-middle">Hal</th>
                                <th class="text-center align-middle">Lampiran</th>
                                <th class="text-center align-middle">Isi Memo</th>
                                <th class="text-center align-middle ">Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" name="tbody" style="color: black;"></tbody>
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

<!-- Modal untuk detail data -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalDetailLabel">Detail Surat</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalDetailContent">
                    <!-- Konten Detail akan diisi oleh JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.js"></script>

<link rel="stylesheet" type="text/css" href="vendor/datatables/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="vendor/datatables/dataTables.select.min.js"></script>

<script>
    $(document).ready(function() {
        $('#menuMenu').trigger('click');
        $('#tabel').DataTable({
            "scrollX": true,
            "select": true,
            "bSort": false
        });
    });

    var html = '';
    var no = 1;
    $.ajax({
        url: "<?php echo base_url('Select/getAllDataMemo'); ?>",
        method: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                console.log(data);
                html += '<tr>';
                html += '<td class="text-center align-middle">' + (data[i].nomor ? data[i].nomor : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].Tanggal ? data[i].Tanggal : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].noSurat ? data[i].noSurat : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].tglSurat ? data[i].tglSurat : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].Nama ? data[i].Nama : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].hal ? data[i].hal : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].lampiran ? data[i].lampiran : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].keterangan ? data[i].keterangan : '-') + '</td>';
                html += '<td class="text-center align-middle d-flex justify-content-center align-items-center">';
                html += '<button type="button" class="btn btn-circle btn-detail  " data-id="' + data[i].nomor + '" data-toggle="modal" data-target="#detailModal">';
                html += '<i class="fas fa-exclamation"></i>';
                html += '</button>';
                html += '</td>';
                html += '</tr>';
                no++;
            }
            $("#tbody").html(html);
        }
    });
    $(document).on('click', '.btn-detail', function() {
        var id = $(this).data('id');
        console.log("ID yang dikirim: ", id);

        window.location.href = "<?php echo base_url('detailMemo'); ?>?id=" + id;
    });
</script>