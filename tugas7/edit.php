<?php include "Kuliah.php"; ?>

<?php 
    $id = $_GET['id'];
    $result = mysqli_query($conn, "
        SELECT * FROM KRS 
        JOIN Mahasiswa ON KRS.mahasiswa_npm = Mahasiswa.npm 
        JOIN MataKuliah ON KRS.matakuliah_kodemk = MataKuliah.kodemk 
        WHERE KRS.id = '$id'
    ");

    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Edit Data Mahasiswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" value="<?= $row['npm'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="<?= $row['jurusan'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kodemk" class="form-control" value="<?= $row['kodemk'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="namamk" class="form-control" value="<?= $row['namamk'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Jumlah SKS</label>
            <input type="text" name="jumlah_sks" class="form-control" value="<?= $row['jumlah_sks'] ?>" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $kodemk = $_POST['kodemk'];
        $namamk = $_POST['namamk'];
        $jumlah_sks = $_POST['jumlah_sks'];

        mysqli_query($conn, "UPDATE Mahasiswa SET 
            nama='$nama', jurusan='$jurusan', alamat='$alamat' 
            WHERE npm='$npm'");

        mysqli_query($conn, "UPDATE MataKuliah SET 
            namamk='$namamk', jumlah_sks='$jumlah_sks' 
            WHERE kodemk='$kodemk'");

        mysqli_query($conn, "UPDATE KRS SET 
            mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' 
            WHERE id='$id'");

        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    }
    ?>
</body>

</html>
