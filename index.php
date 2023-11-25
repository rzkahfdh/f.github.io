<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak Bisa terkoneksi ");
}

$nama = "";
$nim = "";
$kelas = "";
$tugasHarian = "";
$mataKuliah = "";
$uts = "";
$uas = "";
$tanggal = "";
$sukses = "";
$error = "";


if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $tugasHarian = $_POST['tHarian'];
    $uts = $_POST['uts'];
    $mataKuliah = $_POST['matkul'];
    $uas = $_POST['uas'];
    $tanggal = $_POST['tanggal'];

    if (
        $nama && $nim && $kelas && $tugasHarian && $mataKuliah && $uts && $uas && $tanggal
    ) {
        $sql1 = "insert into mahasiswa (nama,kelas,nim,matkul,tHarian,uts,uas,tanggal) values ('$nama', '$kelas',' $nim',' $mataKuliah',' $tugasHarian ',' $uts',' $uas', ' $tanggal')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Menambahkan Data Baru";
        } else {
            $error = "Gagal memasukan data";
        }
    } else {
        $error = "Silahkan Isi Semua Data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .popup {
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        #home {
            margin-top: 0;
            color: aliceblue;
            position: relative;
            width: 100%;
            justify-content: space-between;
            height: 100vh;
            background: url(rama.jpg);
            background-position: center;
            align-items: center;
            padding: 70px;
        }

        button {
            margin: 5px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transform: .4s;
        }

        button:hover {
            color: rgb(255, 255, 255);
            background: black;
        }

        .hidden {
            display: none;
        }

        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
    <title>Data Mahasiswa</title>
</head>

<body>
    <section id="home" class="popup">
        <div class="homecontent">
            <h3>Hallo Gaes</h3>
            <h1>MUHAMMAD RIFQI RAMADHAN</h1>
            <div class="media">
                <button onclick="showDataMahasiswa()">Data Mahasiswa</button>
            </div>
            <a href="http://instagram.com/m.rifqirmdhn"> <i class='bx bxl-instagram'></i></a>
        </div>
    </section>
    <div id="content" class="mx-auto hidden">
        <!-- Memasukan Data -->
        <div class="card">
            <div class="card-header">
                DATA MAHASISWA
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?php
                    if ($error) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                        <?php
                        header("refresh:1;url=index.php");
                    }
                    ?>
                    <?php
                    if ($sukses) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses; ?>
                        </div>
                        <?php
                        header("refresh:1;url=index.php");
                    }
                    ?>
                    <!-- Nama -->
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <!-- Kelas -->
                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas"
                                value="<?php echo $kelas ?>">
                        </div>
                    </div>
                    <!-- Nim -->
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <!-- Mata Kuliah -->
                    <div class="mb-3 row">
                        <label for="matkul" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="matkul" name="matkul"
                                value="<?php echo $mataKuliah ?>">
                        </div>
                    </div>
                    <!-- Tugas Harian -->
                    <div class="mb-3 row">
                        <label for="tHarian" class="col-sm-2 col-form-label">Tugas Harian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tHarian" name="tHarian"
                                value="<?php echo $tugasHarian ?>">
                        </div>
                    </div>
                    <!-- Uts -->
                    <div class="mb-3 row">
                        <label for="uts" class="col-sm-2 col-form-label">Uts</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="uts" name="uts" value="<?php echo $uts ?>">
                        </div>
                    </div>
                    <!-- Uas -->
                    <div class="mb-3 row">
                        <label for="uas" class="col-sm-2 col-form-label">uas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="uas" name="uas" value="<?php echo $uas ?>">
                        </div>
                    </div>
                    <!-- Tanggal -->
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?php echo $tanggal ?>">
                        </div>
                    </div>
                    <!-- Tombol Simpan -->
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!-- Mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Tugas Harian</th>
                            <th scope="col">Uts</th>
                            <th scope="col">Uas</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from mahasiswa order by no desc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            // $no = $r2["no"];
                            $nama = $r2['nama'];
                            $kelas = $r2['kelas'];
                            $nim = $r2['nim'];
                            $mataKuliah = $r2['matkul'];
                            $tugasHarian = $r2['tHarian'];
                            $uts = $r2['uts'];
                            $uas = $r2['uas'];
                            $tanggal = $r2['tanggal'];
                            ?>

                            <tr>
                                <td scope="row">
                                    <?php echo $urut++ ?>
                                </td>
                                <td scope="row">
                                    <?php echo $nama ?>
                                </td>
                                <td scope="row">
                                    <?php echo $kelas ?>
                                </td>
                                <td scope="row">
                                    <?php echo $nim ?>
                                </td>
                                <td<?php ?> scope="row">
                                    <?php echo $mataKuliah ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $tugasHarian ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $uts ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $uas ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $tanggal ?>
                                    </td>
                            </tr>
                            <?php
                        }


                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        function showDataMahasiswa() {
            document.getElementById('home').classList.add('hidden');
            document.getElementById('content').classList.add('hidden');
            document.getElementById('content').classList.remove('hidden');
        }
    </script>
</body>

</html>