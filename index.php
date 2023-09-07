<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/x-icon" href="assets/image/logo.png">    
    <title>Agenda Kegiatan Kepala Dinas Kominfo Kabupaten Pekalongan</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        th {
            background-color: #343a40;
            color: #ffffff;
        }

        .btn {
            margin-right: 5px;
        }
        .table-bordered {
            border: 3px solid #000 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="display:flex; justify-content:center"><img style='width:100px; height:100px' src="assets/image/logo.png"></div>
        <h2>Agenda Kegiatan Kepala DINKOMINFO Kabupaten Pekalongan</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style='text-align:center'>No</th>
                    <th style='text-align:center'>Tanggal</th>
                    <th style='text-align:center'>Jam</th>
                    <th style='text-align:center'>Kegiatan</th>
                    <th style='text-align:center'>Leading Sector</th>
                    <th style='text-align:center'>Tempat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conf/koneksi.php';

                $currentDateTime = date("Y-m-d H:i:s");
                $schedul = mysqli_query($koneksi, "SELECT * FROM schedul");

                $no = 1;
                ?>
                <?php
                if (mysqli_num_rows($schedul) > 0) {
                    while ($d = mysqli_fetch_array($schedul)) {
                        $eventDateTime = $d['Tanggal'] . ' ' . $d['Jam'];

                        if ($eventDateTime >= $currentDateTime) {
                ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['Tanggal']; ?></td>
                                <td><?php echo $d['Jam']; ?></td>
                                <td><?php echo $d['Kegiatan']; ?></td>
                                <td><?php echo $d['leading_sector']; ?></td>
                                <td><?php echo $d['Tempat']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada kegiatan</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="assets/tambahdata.php" class="btn btn-primary">Tambah Data Kegiatan</a>
            <a href="login.php" class="btn btn-primary">Rekap Kegiatan</a>
        </div>
    </div>
</body>

</html>