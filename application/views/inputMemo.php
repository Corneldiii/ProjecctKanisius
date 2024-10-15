<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Memo</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Memo</h2>
        <form id="memoForm">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kolom Input</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr>
                        <td>Nomor</td>
                        <td><input type="text" id="nomor" class="form-control" value="Otomatis" disabled></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><input type="date" id="tanggal" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>No. Memo</td>
                        <td><input type="text" id="noSurat" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Tgl. Memo</td>
                        <td><input type="date" id="tglSurat" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td><input type="text" id="hal" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td><input type="text" id="lampiran" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Ringkasan Isi</td>
                        <td><textarea id="keterangan" class="form-control" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Disposisi 1</td>
                        <td>
                            <select class="form-control" id="dispoDivisi1" onchange="getPersons(1)">
                                <option value="">Pilih Divisi</option>
                                <!-- Daftar divisi diisi di sini -->
                                <?php foreach ($divisi as $d): ?>
                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control mt-2" id="dispoNoreg1">
                                <option value="">Pilih Person</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Disposisi 2</td>
                        <td>
                            <select class="form-control" id="dispoDivisi2" onchange="getPersons(2)">
                                <option value="">Pilih Divisi</option>
                                <?php foreach ($divisi as $d): ?>
                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control mt-2" id="dispoNoreg2">
                                <option value="">Pilih Person</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Disposisi 3</td>
                        <td>
                            <select class="form-control" id="dispoDivisi3" onchange="getPersons(3)">
                                <option value="">Pilih Divisi</option>
                                <?php foreach ($divisi as $d): ?>
                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control mt-2" id="dispoNoreg3">
                                <option value="">Pilih Person</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Disposisi 4</td>
                        <td>
                            <select class="form-control" id="dispoDivisi4" onchange="getPersons(4)">
                                <option value="">Pilih Divisi</option>
                                <?php foreach ($divisi as $d): ?>
                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control mt-2" id="dispoNoreg4">
                                <option value="">Pilih Person</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Disposisi 5</td>
                        <td>
                            <select class="form-control" id="dispoDivisi5" onchange="getPersons(5)">
                                <option value="">Pilih Divisi</option>
                                <?php foreach ($divisi as $d): ?>
                                    <option value="<?= $d['divID'] ?>"><?= $d['DivNama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control mt-2" id="dispoNoreg5">
                                <option value="">Pilih Person</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Upload File</td>
                        <td><input type="file" id="fileUpload" class="form-control" accept=".jpg,.pdf"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="submitMemo()">Submit</button>
        </form>
    </div>

    <script>
        function getPersons(dispoNumber) {
            var divisiID = document.getElementById('dispoDivisi' + dispoNumber).value;

            if (divisiID) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '<?= base_url("get-persons/") ?>' + encodeURIComponent(divisiID), true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        try {
                            var persons = JSON.parse(this.responseText);
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

        function submitMemo() {
            // Mengambil semua data dari form
            var formData = new FormData(document.getElementById('memoForm'));

            // Mengirim data dengan AJAX
            $.ajax({
                url: "<?php echo base_url('Insert/saveMemo'); ?>",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Tanggapan dari server setelah penyimpanan
                    alert('Memo berhasil disimpan!');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error saving memo:', error);
                    alert('Terjadi kesalahan saat menyimpan memo.');
                }
            });
        }
    </script>
</body>
</html>
