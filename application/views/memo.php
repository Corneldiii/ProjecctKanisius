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

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Memo Internal</h1>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-12">
                    <?php if(isset($_SESSION["pesan"])) { ?>
                        <div class="alert <?=$_SESSION['type'] ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?= $_SESSION['pesan'] ?>
                        </div>
                    <?php unset($_SESSION['pesan']);
                    } ?>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <table id="tabelMemo" class="display nowrap" style="width:100%">
                        <thead style="color: black;">
                            <tr>
                                <th style="width:10px" class="text-center align-middle">No</th>
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
                        <tbody id="tbodyMemo" name="tbodyMemo" style="color: black;"></tbody>
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