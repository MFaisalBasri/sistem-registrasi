<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header('location:index.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'db_prokerteknik23');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi | Seminar</title>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .registrasi button {
            background: blue;
            color: white;
            border: white 3px solid;
            border-radius: 25px;
            padding: 12px 20px;
            margin-top: 5px;
        }

        .registrasi button:hover {
            background: green;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="font-family: 'Times New Roman', Times, serif; font-size:16px;">
        <div class="row" style=" height: 90vh;">
            <div class="col-md-8 border border-4 border-primary text-center">
                <div class="p-4">
                    <img src="img/FT.png" alt="" style="width: 85px;">
                    <img src="img/FISIP.png" alt="" style="width: 60px;">
                    <img src=" img/FEB.png" alt="" style="width: 60px;">
                    <h2 class="mt-4"><b>SEMINAR</b></h2>
                    <h3><b>OPTIMIZING DIGITAL MARKETING THROUGH DATA SCIENCE INSIGHTS</b></h3>
                    <P>FT - FISIP - FEB</P>
                </div>
                <div id="body-result" style="margin-top: 50px; line-height: 10px;">
                    <?php
                    if (isset($_POST['registrasi'])) {
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];

                        $query = mysqli_query($conn, "INSERT INTO `peserta` (`id`, `nama`) VALUES ('$id', '$nama');");

                        if ($query > 0) {
                            echo $nama . '<h1 style="color: green;">BERHASIL REGISTRASI!</h1>';
                        } else {
                            echo $nama . '<h1 style="color: red;">REGISTRASI GAGAL!</h1><p style="color: red;">Peserta Sudah Terdaftar!</p>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class=" col-md-4 border border-4 border-warning">
                <div class="scanner" style="height: 100vh; overflow-x:auto">
                    <div id="qr-reader" style="width: 450px;;"></div>
                </div>
            </div>
        </div>
        <div class="row" style=" height: 80vh;">
            <div class="col-md-10">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 border border-4 border-primary">
                <div class="dataPeserta">
                    <h1 class="text-center">Daftar Hadir Peserta</h1>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($conn, "SELECT * FROM peserta");
                            while ($row = mysqli_fetch_assoc($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/html5-qrcode.min.js"></script>
    <script src="js/absen.js"></script>
    <script>
        new DataTable('#example', {
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            layout: {
                topStart: 'buttons'
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>