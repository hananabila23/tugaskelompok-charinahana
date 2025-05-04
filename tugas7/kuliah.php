<?php
$conn = mysqli_connect("localhost", "root", "", "Kuliah");

if (!$conn){
    die("koneksi gagal: " . mysqli_connect_error());
}
?>