<?php include 'Kuliah.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Tambah Data Mahasiswa</h2>

    <form method="POST">
        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kodemk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="namamk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah SKS</label>
            <input type="text" name="jumlah_sks" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>

        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if(isset($_POST['simpan'])){
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $kodemk = $_POST['kodemk'];
        $namamk = $_POST['namamk'];
        $jumlah_sks = $_POST['jumlah_sks'];

        mysqli_query($conn, "INSERT INTO Mahasiswa (npm, nama, jurusan, alamat) VALUES('$npm', '$nama', '$jurusan', '$alamat')");
        mysqli_query($conn, "INSERT INTO MataKuliah (kodemk, namamk, jumlah_sks) VALUES('$kodemk', '$namamk', '$jumlah_sks')");
        mysqli_query($conn, "INSERT INTO KRS (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
        echo "Data berhasil ditambahkan";
    }
    ?>

 

</body>

</html>