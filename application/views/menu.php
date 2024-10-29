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
            <div class="menu" style="display: flex; justify-content: flex-start; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #ddd;">
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
                }

                .menu-btn.active {
                    background-color: #3e4520;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }

                .menu-btn:hover {
                    background-color: #3e4520;
                    transform: translateY(-2px);
                    color: #fff;
                    text-decoration: none;
                }

                .menu-btn span {
                    margin-left: 4px;
                }

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
            </style>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Menu atau Tabel</h1>
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
                                <th style="width:10px" class="text-center align-middle">No. Agenda</th>
                                <th class="text-center align-middle">Tgl Input</th>
                                <th class="text-center align-middle">No. Surat</th>
                                <th class="text-center align-middle">Tgl Surat</th>
                                <th class="text-center align-middle">Kode</th>
                                <th class="text-center align-middle">Nama Person</th>
                                <th class="text-center align-middle">Nama Lembaga</th>
                                <th class="text-center align-middle">Hal</th>
                                <th class="text-center align-middle">Lampiran</th>
                                <th class="text-center align-middle">Detail</th>
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
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetailContent">
                <!-- Detail data akan ditampilkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        url: "<?php echo base_url('Select/getAllData'); ?>",
        method: "GET",
        dataType: "JSON",
        async: false,
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                console.log(data);
                html += '<tr>';
                html += '<td class="text-center align-middle">' + no + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].Tanggal ? data[i].Tanggal : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].noSurat ? data[i].noSurat : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].tglSurat ? data[i].tglSurat : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].relasiID ? data[i].relasiID : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].namaPerson ? data[i].namaPerson : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].namaLembaga ? data[i].namaLembaga : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].hal ? data[i].hal : '-') + '</td>';
                html += '<td class="text-center align-middle">' + (data[i].lampiran ? data[i].lampiran : '-') + '</td>';
                html += '<td class="text-center align-middle">';
                html += '<button type="button" class="btn btn-circle btn-detail" data-id="' + data[i].nomor + '" data-toggle="modal" data-target="#detailModal">';
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
        console.log("ID yang dikirim: ", id); // Debugging ID yang dikirim
        $.ajax({
            url: "<?php echo base_url('Select/getDetailData'); ?>",
            method: "GET",
            data: {
                id: id
            },
            dataType: "json", // Pastikan AJAX menguraikan JSON secara otomatis
            success: function(data) {
                console.log("Data yang diterima:", data); // Debugging data yang diterima
                var detailHtml = `
                <p><strong>Tanggal Input:</strong> ${data.Tanggal}</p>
                <p><strong>No. Surat:</strong> ${data.noSurat}</p>
                <p><strong>Tgl Surat:</strong> ${data.tglSurat}</p>
                <p><strong>Nama Person:</strong> ${data.namaPerson}</p>
                <p><strong>Nama Lembaga:</strong> ${data.namaLembaga}</p>
                <p><strong>Hal:</strong> ${data.hal}</p>
                <p><strong>Lampiran:</strong> ${data.lampiran}</p>
            `;
                $('#modalDetailContent').html(detailHtml); // Menambahkan konten ke modal
            },
            error: function(xhr, status, error) {
                console.error("Error AJAX:", error); // Debugging jika terjadi error
            }
        });
    });
</script>