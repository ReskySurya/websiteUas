<?php
//Membuat koneksi ke database secara OOP
$conn = new mysqli("localhost", "id20888114_reskysurya", "Godhonggedhang@123", "id20888114_uasweb");
if($conn->connect_error) {
    die("Koneksi ke database Gagal: " . $conn->connect_error);
}
?>