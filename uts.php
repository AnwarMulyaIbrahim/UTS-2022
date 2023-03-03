<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">

    <title>UTS MANTAP</title>

</head>

<body class="">
    <div class="container">
       

        <div class="card mt-5">
            <div class="card-header" align="center">
                Aplikasi Pendaftaran Pasien
            </div>
            <div class="card-header" align="center">
                RS. CEPAT SEMBUH
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="card col-md-6">
                            <div class="form-group">
                                <label>NIK Pasien :</label>
                                <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Pasien :</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Berobat :</label>
                                <input type="date" name="in" class="form-control" placeholder="Tanggal" required>
                            </div>
                            <div class="form-group">
                                <label>Poli Tujuan :</label>
                               <select class="form-control" name="poli" required>
                                    <option value="65000">Poli Umum</option>
                                    <option value="150000">Poli Jantung</option>
                                    <option value="75000">Poli THT</option>
                                    <option value="100000">Poli Mata</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Pasien</label>
                                <select class="form-control" name="status" required>
                                    <option value="50000">Pasien Baru</option>
                                    <option value="0">Pasien Lama</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Tipe Pembayaran :</label>
                                <select class="form-control" name="bayar" required>
                                    <option value="0">Mandiri</option>
                                    <option value="150000">BPJS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Uang Bayar :</label>
                                <input type="number" name="uang" class="form-control" placeholder="RP." required>
                            </div>
                            <button type="submit" name="pesan" class="btn btn-danger">Proses pendaftaran</button>
                        </div>
            
                        <div class="card col-md-6">
                         <?php 
                            if (isset($_POST['pesan'])) {
                                $nama = $_POST['nama'];
                                $nik = $_POST['nik'];
                                $in = $_POST['in'];
                                $poli = $_POST['poli'];
                                $status = $_POST['status'];
                                $bayar = $_POST['bayar'];
                                $uang = $_POST['uang'];


                                $raw_date_in = new DateTime($in);

                               if ($poli == 65000) {
                                   $obat = 125000;
                               }elseif ($poli == 150000) {
                                   $obat = 365000;
                               }elseif ($poli == 75000) {
                                   $obat = 185000;
                               }elseif ($poli == 100000) {
                                   $obat = 254000;
                               }

                               if ($poli == 65000) {
                                   $jpoli = "Poli Umum";
                               }elseif ($poli == 150000) {
                                   $jpoli = "Poli Jantung";
                               }elseif ($poli == 75000) {
                                   $jpoli = "Poli THT";
                               }elseif ($poli == 100000) {
                                   $jpoli = "Poli Mata";
                               }

                               $btot = $status + $poli + $obat - $bayar ;
                               $pajak = 0.11 * $btot ;
                               $tbyr = $btot + $pajak ;
                               $kembali = $uang - $tbyr ;
                            
                            
                            

                        ?>

                            <h4 class="text-center">Data Pendaftaran RS. Cepat Sembuh</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td scope="row">NIK Pasien</td>
                                        <td>:</td>
                                        <td><?= $nik ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nama Pasien</td>
                                        <td>:</td>
                                        <td><?= $nama ?></td>
                                    </tr><tr>
                                        <td scope="row">Tanggal Berobat</td>
                                        <td>:</td>
                                        <td><?= $in ?></td>
                                    </tr> <tr>
                                        <td scope="row">Poli Tujuan</td>
                                        <td>:</td>
                                        <td><?= $jpoli ?></td>
                                    </tr> <tr>
                                        <td scope="row">Status Pasien</td>
                                        <td>:</td>
                                        <td><?= $status == 50000 ? "Pasien Baru" : "Pasien Lama" ?></td>
                                    </tr><tr>
                                        <td scope="row">Type Pembayaran</td>
                                        <td>:</td>
                                        <td><?= $bayar == 150000 ? "BPJS" : "Mandiri" ?></td>
                                    </tr><tr>
                                        <td scope="row">Biaya Pendaftaran</td>
                                        <td>: RP.</td>
                                        <td><?= number_format($status) ?></td>
                                    </tr><tr>
                                        <td scope="row">Biaya Layanan</td>
                                        <td>: RP.</td>
                                        <td><?= number_format($poli) ?></td>
                                    </tr><tr>
                                        <td scope="row">Biaya Obat</td>
                                        <td>: RP.</td>
                                        <td><?= number_format($obat) ?></td>
                                    </tr><tr>
                                        <td scope="row">Potongan</td>
                                        <td>: RP.</td>
                                        <td><?= number_format($bayar) ?></td>
                                    </tr><tr>
                                        <td scope="row">Biaya Total</td>
                                        <td>: RP.</td>
                                        <td><?=  number_format($btot) ?></td>
                                    </tr><tr>
                                        <td scope="row">Pajak</td>
                                        <td>: RP.</td>
                                        <td><?=  number_format($pajak) ?></td>
                                    </tr><tr>
                                        <td scope="row"><strong>Total Bayar</strong></td>
                                        <td>: RP.</td>
                                        <td><?=  number_format($tbyr) ?></td>
                                    </tr><tr>
                                        <td scope="row"><strong>Uang Bayar</strong></td>
                                        <td>: RP.</td>
                                        <td><?= number_format($uang) ?></td>
                                    </tr><tr>
                                        <td scope="row"><strong>Uang Kembali</strong></td>
                                        <td>: RP.</td>
                                        <td><?=  number_format($kembali) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                        }else {
                                     echo "<h3 align='center'>Mohon Masukan Data Pasien!</h3>";
                                     }

                             ?>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>