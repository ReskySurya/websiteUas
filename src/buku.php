<?php
session_start();
include '../koneksiDb.php';

$query = "SELECT * FROM t_buku";
$result = mysqli_query($conn, $query);

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

                    <li><button class="bg-color-second px-9 py-3 rounded-md capitalize font-bold hover:opacity-80 ease-in duration-200 text-teal-950">Gasin</button></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
    <section id="home" class="pt-8 pb-5 bg-color-primary mt-20">
        <div class="container px-5 max-w-screen-sm lg:max-w-screen-lg">
            <div class="flex flex-wrap">
                <div>
                    <h4 class="font-bold text-color-second uppercase mb-3">List Buku</h4>
                    <h2 class="font-extrabold text-black text-3xl mb-1">Explore Buku</h2>
                    <p class="text-base text-gray-400 mb-5">Belajar lebih terstruktur dengan buku.</p>
                    <button class="bg-color-second px-9 py-3 rounded-md capitalize font-bold hover:opacity-80 ease-in duration-200 text-teal-950 mb-3"><a href="./simpanBuku.php">Tambah Buku</a></button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-color-second p-6 pt-[25px] rounded-md capitalize font-bold hover:opacity-60 ease-in duration-200 text-gray-500 grid-cols-2 inline-grid gap-3 shadow-xl">
                    <div class="col-span-1 flex items-start">
                        <img class="rounded-md w-20 bg-gray-200 border-x-4 border-y-4" src="../img/buku/Math.jpg" alt="">
                    </div>
                    <div class="col-span-2">
                        <h5 class="font-bold text-start text-black text-xl pt-2 mb-2 ml-2">Matematika</h5>
                        <p class="font-light ml-2">Ilmu yang mempelajari bagaimana alam ini bekerja.</p>
                    </div>
                </div>
                <div class="bg-color-second p-6 pt-[25px] rounded-md capitalize font-bold hover:opacity-60 ease-in duration-200 text-gray-500 grid-cols-2 inline-grid gap-3 shadow-xl">
                    <div class="col-span-1 flex items-start">
                        <img class="rounded-md w-20 bg-gray-200 border-x-4 border-y-4" src="../img/buku/Biology.jpg" alt="">
                    </div>
                    <div class="col-span-2">
                        <h5 class="font-bold text-start text-black text-xl pt-2 mb-2 ml-2">Ekonomi</h5>
                        <p class="font-light ml-2">Ilmu yang mempelajari tentang sosial dan kemasyarakatan.</p>
                    </div>
                </div>
                <div class="bg-color-second p-6 pt-[25px] rounded-md capitalize font-bold hover:opacity-60 ease-in duration-200 text-gray-500 grid-cols-2 inline-grid gap-3 shadow-xl">
                    <div class="col-span-1 flex items-start">
                        <img class="rounded-md w-20 bg-gray-200 border-x-4 border-y-4" src="../img/buku/Fisika.jpg" alt="">
                    </div>
                    <div class="col-span-2">
                        <h5 class="font-bold text-start text-black text-xl pt-2 mb-2 ml-2">Biologi</h5>
                        <p class="font-light ml-2">Ilmu yang mempelajari bagaimana alam ini bekerja.</p>
                    </div>
                </div>
                <div class="bg-color-second p-6 pt-[25px] rounded-md capitalize font-bold hover:opacity-60 ease-in duration-200 text-gray-500 grid-cols-2 inline-grid gap-3 shadow-xl">
                    <div class="col-span-1 flex items-start">
                        <img class="rounded-md w-20 bg-gray-200 border-x-4 border-y-4" src="../img/buku/Kimia.jpg" alt="">
                    </div>
                    <div class="col-span-2">
                        <h5 class="font-bold text-start text-black text-xl pt-2 mb-2 ml-2">Ekonomi</h5>
                        <p class="font-light ml-2">Ilmu yang mempelajari tentang sosial dan kemasyarakatan.</p>
                    </div>
                </div>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $fotoBuku = $row['foto'];
                        $judulBuku = $row['judul'];
                        $deskripsiBuku = $row['deskripsi'];
                    ?>
                    <div class="bg-color-second p-6 pt-[35px] rounded-md capitalize font-bold hover:opacity-60 ease-in duration-200 text-gray-500 grid-cols-2 inline-grid gap-3 shadow-xl">
                        <div class="col-span-1 flex items-start">
                            <img class="rounded-md w-20 bg-gray-200 border-x-4 border-y-4" src="../img/buku/<?php echo $fotoBuku; ?>" alt="">
                        </div>
                        <div class="col-span-2">
                            <h5 class="font-bold text-start text-black text-xl p-0 mb-2 ml-2"><?php echo $judulBuku; ?></h5>
                            <p class="font-light ml-2"><?php echo $deskripsiBuku; ?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
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