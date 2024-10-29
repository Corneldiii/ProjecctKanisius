<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Bootstrap Icons Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" 
            style="background-color: #2e7d32; border-bottom: 2px solid #1b5e20;">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars" style="color: white;"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <img src="img/kanisius.png" alt="Logo Kanisius" />
            </ul>
        </nav>

        <div class="container-fluid">
            <!-- Menu Section -->
            <div class="menu"
                style="display: flex; justify-content: flex-start; margin-top: 20px; margin-bottom: 20px; border-bottom: 2px solid #ddd;">
                <a href="memo" class="menu-btn active">
                    <i class="bi bi-file-earmark-spreadsheet"></i> Tabel
                </a>
                <a href="inputMemo" class="menu-btn">
                    <i class="bi bi-file-earmark-plus"></i> Insert
                </a>
            </div>

            <style>
                /* Green-themed buttons and layout */
                .menu-btn {
                    display: inline-block;
                    padding: 12px 20px;
                    margin: 0 10px;
                    font-size: 16px;
                    text-decoration: none;
                    color: white;
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
                    text-decoration: none;
                }

                .menu-btn:focus {
                    outline: none;
                    box-shadow: 0 0 0 3px rgba(75, 83, 32, 0.5);
                }

                .alert {
                    background-color: #a5d6a7;
                    color: #1b5e20;
                    border-left: 5px solid #2e7d32;
                }

                table thead {
                    background-color: #81c784;
                }

                table tbody {
                    background-color: #e8f5e9;
                }

                table th, td {
                    border: 1px solid #1b5e20;
                }

                .h3 {
                    color: #1b5e20;
                }

                footer {
                    background-color: #2e7d32;
                    color: white;
                }
            </style>

            <!-- Header Section -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Daftar Memo Internal</h1>
            </div>

            <!-- Alert Section -->
            <div class="form-group row">
                <div class="col-sm-12">
                    <?php if (isset($_SESSION["pesan"])) { ?>
                        <div class="alert <?= $_SESSION['type'] ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?= $_SESSION['pesan'] ?>
                        </div>
                    <?php unset($_SESSION['pesan']); } ?>
                </div>
            </div>

            <!-- Memo Table -->
            <div class="row">
                <div class="col">
                    <table id="tabelMemo" class="display nowrap" style="width:100%; color: #1b5e20;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" style="width: 10px;">No</th>
                                <th class="text-center align-middle">Tanggal</th>
                                <th class="text-center align-middle">No. Memo</th>
                                <th class="text-center align-middle">Tgl. Memo</th>
                                <th class="text-center align-middle">Tujuan</th>
                                <th class="text-center align-middle">Hal</th>
                                <th class="text-center align-middle">Lampiran</th>
                                <th class="text-center align-middle">Isi Memo</th>
                                <th class="text-center align-middle">Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyMemo" name="tbodyMemo"></tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>© <?php echo date("Y"); ?> PT Kanisius.</span>
            </div>
        </div>
    </footer>
</div>

<!-- JS Dependencies (Bootstrap & jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

<script>
    $(document).ready(function() {
        $('#tabelMemo').DataTable({
            "scrollX": true,
            "bSort": false
        });

        loadMemoData();

        $('#search').on('keyup', function() {
            $('#tabelMemo').DataTable().search(this.value).draw();
        });
    });

    function loadMemoData() {
        var html = '';
        $.ajax({
            url: "<?php echo base_url('Memo/getAllMemo'); ?>", // Ganti dengan URL controller yang sesuai
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td class="text-center align-middle">' + (i + 1) + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].Tanggal + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].nomor + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].tglSurat + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].Nama + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].hal + '</td>';
                    html += '<td class="text-center align-middle">' + 
                        (data[i].lampiran ? '<a href="' + data[i].lampiran + '" target="_blank">Download</a>' : 'Tidak Ada') + '</td>';
                    html += '<td class="text-center align-middle">' + data[i].keterangan + '</td>';
                    html += '<td class="text-center align-middle"><button type="button" class="btn btn-info btn-detail" data-id="' + data[i].nomor + '">Detail</button></td>';
                    html += '</tr>';
                }
                $("#tbodyMemo").html(html);
            }
        });
    }

    $(document).on('click', '.btn-detail', function() {
        var id = $(this).data('id');
        // Lakukan request untuk mendapatkan detail memo
        $.ajax({
            url: '<?php echo base_url('Memo/getDetailMemo'); ?>', // Ganti dengan URL controller yang sesuai
            type: 'POST',
            data: { id: id },
            success: function(response) {
                // Tampilkan detail memo sesuai kebutuhan
                alert(response); // Misalnya ditampilkan dalam modal atau alert
            },
            error: function(xhr) {
                alert('Gagal mendapatkan detail memo: ' + xhr.status + ' ' + xhr.statusText);
            }
        });
    });
</script>
</body>
</html>