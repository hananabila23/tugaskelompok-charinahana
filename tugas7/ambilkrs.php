<?php include 'Kuliah.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Cari Mata Kuliah</h2>

    <form method="POST">
        <div class="mb-3">
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kodemk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" required>
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
        $kodemk = $_POST['kodemk'];
        $nama = $_POST['nama'];
        $jumlah_sks = $_POST['jumlah_sks'];

        mysqli_query($conn, "INSERT INTO MataKuliah (kodemk, nama, jumlah_sks) VALUES('$kodemk', '$nama', '$jumlah_sks')");

        echo "Data berhasil ditambahkan";
    }
    ?>

 

</body>

</html>