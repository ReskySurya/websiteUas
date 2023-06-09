<?php
session_start();
include '../koneksiDb.php';

if (isset($_POST['tambah'])) {
    $fotoBuku = $_FILES['fotoBuku']['name'];
    $judulBuku = $_POST['judul'];
    $deskripsiBuku = $_POST['deskripsi'];

    // Memindahkan file gambar ke direktori tujuan
    $targetDir = "../img/buku"; // Ganti dengan path direktori tujuan
    $targetFile = $targetDir . basename($fotoBuku);

    // Memindahkan file gambar ke direktori tujuan
    if (move_uploaded_file($_FILES["fotoBuku"]["tmp_name"], $targetFile)) {
        // Jika pemindahan file berhasil, lakukan operasi database
        $insertQuery = "INSERT INTO t_buku (foto, judul, deskripsi) VALUES ('$fotoBuku', '$judulBuku', '$deskripsiBuku')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            $_SESSION['registration_success'] = true;
            header("Location: ../src/buku.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menyimpan buku: " . mysqli_error($conn);
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file gambar.";
    }
}
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/style.css" rel="stylesheet">
</head>
<body>

    <section class="bg-color-primary min-h-screen flex items-center justify-center">
        <!-- container form -->
        <div class="bg-color-second flex rounded-2xl shadow-lg max-w-4xl p-4">
            <!-- form -->
            <div class="sm:w-1/2 px-16 pt-10">
                <h2 class="font-bold text-2xl text-yellow-600">Tambahkan Buku Favorit Kalian</h2>
                <p class="text-sm mt-4">Agar kami tau rekomendasi yang tepat untuk anda!</p>

                <form action="simpanBuku.php" method="post" class="flex flex-col gap-2" enctype="multipart/form-data">
                    <input class="p-2 mt-3 rounded-xl border w-full" type="text" name="judul" placeholder="Judul Buku" required>
                    <input class="p-2 mt-3 rounded-xl border w-full" type="text" name="deskripsi" placeholder="Deskripsi Buku" required>
                    <label for="fotoBuku">Foto Buku:</label>
                    <input class="p-2 mt-1 rounded-xl border w-full" type="file" name="fotoBuku" required>
                    <p id="error-message" class="text-red-500"></p>
                    <button class=" mt-3 py-2 px-5 bg-yellow-500 rounded-xl" type="submit" name="tambah">Tambah</button>
                </form>
            </div>

            <!-- lottie -->
            <div class=" sm:block hidden w-1/2 px-6">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player class="rounded-2xl" src="https://assets3.lottiefiles.com/packages/lf20_Q895iE.json"  background="transparant"  speed="1"  style="width: 200px; height: 550px;"  loop  autoplay></lottie-player>
            </div>
        </div>
    </section>

</body>
</html>