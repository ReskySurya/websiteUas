<?php 
session_start();
include 'koneksiDb.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    $query = "SELECT * FROM t_pengguna WHERE email='$email' AND passwd='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['userName'] = $row['userName'];
        #echo "Login berhasil";
        header("Location: ../src/dashboard.html");
        exit();
    } else {
        $_SESSION['error_message'] = "Login gagal. Silakan cek kembali email dan password Anda.";
        header("Location: ../src/index.html"); // Redirect kembali ke halaman login
        exit();
    }
}

$conn->close();
?>
