<?php
session_start();
include '../koneksiDb.php';

// Memeriksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['userName'])) {
    header("Location: login.php"); // Redirect ke halaman login jika pengguna belum login
    exit();
}

$username = $_SESSION['userName'];

// Memeriksa apakah form edit telah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang dikirimkan melalui form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];

    // Menjalankan query untuk mengupdate data pengguna
    $updateQuery = "UPDATE t_pengguna SET namaLengkap='$name', email='$email', noHP='$nohp' WHERE userName='$username'";
    $updateResult = $conn->query($updateQuery);

    if ($updateResult) {
        // Jika update berhasil, redirect ke halaman profil dengan data terbaru
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $conn->error; // Tampilkan pesan error jika terjadi kesalahan saat mengupdate data
    }
}

// Mengambil data pengguna dari database berdasarkan username yang sedang login
$query = "SELECT * FROM t_pengguna WHERE userName='$username'";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-color-primary text-color-second tracking-wider">
    <header class="bg-transparent absolute top-0 left-0 w-full">
        <!-- Kode lainnya -->

    </header>

    <main>
        <section class="bg-color-primary min-h-screen place-items-center justify-center">
            <div class="flex items-center justify-center">
                <div class="sm:w-full px-16 pt-10 mt-20">
                    <h2 class="font-bold text-2xl text-yellow-600">Profil</h2>
                    <p class="text-sm text-black mt-4">Informasi Pengguna:</p>

                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $name = $row['namaLengkap'];
                        $email = $row['email'];
                        $nohp = $row['noHP'];

                        // Menampilkan form edit
                        echo "<form method='POST'>";
                        echo "<label for='name'>Nama Lengkap:</label>";
                        echo "<input type='text' name='name' value='$name'>";
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' name='email' value='$email'>";
                        echo "<label for='nohp'>No HP:</label>";
                        echo "<input type='text' name='nohp' value='$nohp'>";
                        echo "<button type='submit' class='bg-color-second px-9 py-3 mt-5 rounded-md capitalize font-bold hover:opacity-80 ease-in duration-200 text-teal-950'>Update</button>";
                        echo "</form>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
