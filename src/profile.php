<?php
session_start();
include '../koneksiDb.php';

$username = $_SESSION['userName'];
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
        <nav class="container flex justify-between items-center ">
            <div class="py-5 px-10 text-yellow-500 font-bold text-3xl">
                <a href="#home">
                    <span class="text-yellow-50">B</span>C. 
                </a>
            </div>
            <div>
            <ul class="hidden lg:flex items-center space-x-7">
                    <li><a href="../src/dashboard.html" class="hover:text-yellow-500 font-bold ease-in duration-200">Home</a></li>
                    <li><a href="../src/tutorial.html" class="hover:text-yellow-500 font-bold ease-in duration-200">Mapel</a></li>
                    <li><a href="../src/buku.php" class="hover:text-yellow-500 font-bold ease-in duration-200">Buku</a></li>
                    <li><a href="../src/profile.php" class="hover:text-yellow-500 font-bold ease-in duration-200">Profile</a></li>

                    <li><button class="bg-color-second px-9 py-3 rounded-md capitalize font-bold hover:opacity-80 ease-in duration-200 text-teal-950"><a href="./index.html">Logout</a></button></li>
                </ul>
            </div>

            <!-- Mobile Screen -->
            <div id="hamburger" class="lg:hidden cursor-pointer z-50">
                <i class="fas fa-bars"></i>
            </div>

            <div id="menu" class=" hidden bg-color-primary bg-opacity-95 h-[100vh] absolute inset-0">
                <ul class="h-full grid place-items-center py-20">
                    <li><a id="hlink" href="#home" class="hover:text-yellow-500 ease-in duration-200">Home</a></li>
                    <li><a id="hlink" href="../src/tutorial.html" class="hover:text-yellow-500 ease-in duration-200">Mapel</a></li>
                    <li><a id="hlink" href="#home" class="hover:text-yellow-500 ease-in duration-200">Buku</a></li>
                    <li><a id="hlink" href="#home" class="hover:text-yellow-500 ease-in duration-200">Forum</a></li>
                    <li><a id="hlink" href="#home" class="hover:text-yellow-500 ease-in duration-200">Princing</a></li>

                    <li></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
    <section class="bg-color-primary min-h-screen place-items-center justify-center">
        <!-- container profile -->
        <div class=" flex items-center justify-center ">
            <!-- profile -->
            <div class="sm:w-full px-16 pt-10 mt-20">
                <h2 class="font-bold text-2xl text-yellow-600">Profil</h2>
                <p class="text-sm text-black mt-4">Informasi Pengguna:</p>

                <?php
                // Ambil data pengguna dari database berdasarkan username yang sedang login
                // Ganti dengan sesuai variabel yang menyimpan username pengguna yang sedang login

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row['namaLengkap'];
                    $email = $row['email'];
                    $nohp = $row['noHP'];

                    echo "<p>Nama Lengkap: $name</p>";
                    echo "<p>Email: $email</p>";
                    echo "<p>No HP: $nohp</p>";
                }
                ?>
                <button class="bg-color-second px-9 py-3 mt-5 rounded-md capitalize font-bold hover:opacity-80 ease-in duration-200 text-teal-950"><a href="./edit.php">Edit</a></button>
            </div>
        </div>
    </section>
    </main>

    <script>
        const hamburger = document.querySelector('#hamburger');
        const menu = document.querySelector('#menu');
        const hlink = document.querySelector('#hlink');
        const faSolid = document.querySelector('.fas');

        hamburger.addEventListener("click", () => {
            menu.classList.toggle('hidden');
            faSolid.classList.toggle('fa-xmark');
        })

        hlink.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                faSolid.classList.toggle('fa-xmark');
            })
        });
    </script>

    <script src="../dist/js/script.js"></script>
</body>
</html>