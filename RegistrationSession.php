<?php 
session_start();
include 'koneksiDb.php';

if (isset($_POST['submit'])) {
    $username = $_POST['userName'];
    $password = $_POST['passwd'];
    $name = $_POST['namaLengkap'];
    $email = $_POST['email'];
    $nohp = $_POST['noHP'];

    $checkQuery = "SELECT * FROM t_pengguna WHERE userName='$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Username sudah terdaftar. Silakan gunakan username lain.";
    } else {
        $insertQuery = "INSERT INTO t_pengguna (userName, passwd, namaLengkap, email, noHP) VALUES ('$username', '$password', '$name', '$email', '$nohp')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['registration_success'] = true; 
            header("Location: ../src/index.html");
            exit();
        } else {
            echo "Terjadi kesalahan saat registrasi: " . $conn->error;
        }
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
                <h2 class="font-bold text-2xl text-yellow-600">Daftar</h2>
                <p class="text-sm mt-4">Ayo, Segera bergabung di Online Course kami.</p>

                <form action="RegistrationSession.php" method="post" class="flex flex-col gap-2">
                    <input class="p-2 mt-3 rounded-xl border w-full" type="text" name="userName" placeholder="Username" required>
                    <input class="p-2 mt-3 rounded-xl border w-full" type="password" name="passwd" placeholder="Password" required>
                    <input class="p-2 mt-3 rounded-xl border w-full" type="text" name="namaLengkap" placeholder="Nama Lengkap" required>
                    <input class="p-2 mt-3 rounded-xl border w-full" type="email" name="email" placeholder="E-mail" required>
                    <input class="p-2 mt-3 rounded-xl border w-full" type="text" name="noHP" placeholder="081211223344" required>
                    <p id="error-message" class="text-red-500"></p>
                    <button class=" mt-3 py-2 px-5 bg-yellow-500 rounded-xl" type="submit" name="submit">Daftar</button>
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