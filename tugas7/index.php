<?php include 'Kuliah.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Data Mahasiswa (dua doang)</h2>
    <a href="tambahmahasiswa.php" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
        $no = 1;
        $result = mysqli_query($conn, " SELECT KRS.id, Mahasiswa.nama, MataKuliah.namamk, MataKuliah.jumlah_sks 
        FROM KRS
        JOIN Mahasiswa ON KRS.mahasiswa_npm = Mahasiswa.npm
        JOIN MataKuliah ON KRS.matakuliah_kodemk = MataKuliah.kodemk");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['namamk']}</td>
                    <td>{$row['nama']} Mengambil Mata Kuliah {$row['namamk']} ({$row['jumlah_sks']} SKS)</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        
                        <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</body>

</html>