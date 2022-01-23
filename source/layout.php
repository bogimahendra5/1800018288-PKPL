<?php

include_once 'petugas/read-petugas.php';
session_start();

if (isset($_SESSION['login']) == true) {
    $petugas = readIdPetugas($_SESSION['id']);
} else {
    header("Location : index.php");
}

?>

<!-- CSS -->
<link rel="stylesheet" href="http://localhost/assets/css/sidenav.css">
<link rel="stylesheet" href="http://localhost/assets/css/util.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/assets/bootstrap/css/bootstrap.css">

<!-- HEADER -->
<header class="d-flex align-items-center p-3 border-bottom" id="header">
    <span class="menu py-1 btn-green" onclick="openNav()">
        <i class="fas fa-bars fa-lg"></i>
        <span class="text-menu ps-1">Menu</span>
    </span>
    <!-- <h3 class="ms-auto">SD Negeri Balirejo</h3> -->
</header>

<!-- SIDENAV -->
<aside id="mySidenav" class="">
    <h5 class="text-center text-white py-4 m-0 bg-green">
        Sistem Perpustakaan
    </h5>
    <div class="sidenav">

        <!-- USER PROFIL -->
        <div class="d-flex justify-content-center align-items-center mt-3">
            <img src="http://localhost/assets/img/petugas/<?= $petugas['gambar']; ?>" alt="profil-petugas" class="w-25 rounded-circle" height="73px">
            <div class="ms-2">
                <p class="mb-1 mt-0"><?= $petugas['nama']; ?></p>
                <span class="badge bg-green"><?= $petugas['level']; ?></span>
            </div>
        </div>

        <!-- NAVIGASI -->
        <nav class="d-flex flex-column mt-4 text-green border-top mt-3">

            <p class="navigasi text-secondary m-3">Menu Navigasi</p>

            <!-- MENU DASHBOARD -->
            <a href="http://localhost/dashboard.php" class="text-decoration-none p-3 ps-4 hvr-green text-green">
                <i class="fas fa-tachometer-alt"></i>
                <span class="ms-1">Dashboard</span>
            </a>

            <!-- MENU DROPDOWN KELOLA DATA -->
            <div class="p-3 ps-4">
                <i class="fas fa-chevron-up"></i>
                <button class="accordion text-green">Kelola Data</button>

                <!-- DROPDOWN -->
                <div class="panel mt-2">

                    <!-- SUB MENU ANGGOTA -->
                    <a href="http://localhost/anggota.php" class="text-decoration-none">
                        <div class="p-3 ps-4 border-bottom hvr-green text-green">
                            <i class="fas fa-user-friends fa-sm"></i>
                            <span class="text-decoration-none ps-1">Anggota</span>
                        </div>
                    </a>

                    <!-- SUB MENU BUKU -->
                    <a href="http://localhost/buku.php" class="text-decoration-none">
                        <div class="p-3 ps-4 hvr-green text-green">
                            <i class="fas fa-book fa-sm"></i>
                            <span class="text-decoration-none ps-2">Buku</span>
                        </div>
                    </a>

                    <?php if ($petugas['level'] == "Administrator") : ?>
                        <!-- SUB MENU PETUGAS -->
                        <a href="http://localhost/petugas.php" class="text-decoration-none">
                            <div class="border-top p-3 ps-4 hvr-green text-green">
                                <i class="fas fa-user-circle"></i>
                                <span class="text-decoration-none ps-2">Petugas</sp>
                            </div>
                        </a>
                    <?php endif ?>

                </div>
            </div>

            <!-- MENU SIRKULASI -->
            <!-- <div class="p-3 ps-4">
                <i class="fas fa-sync"></i>
                <button class="accordion text-primary">Sirkulasi</button> -->

            <!-- DROPDOWN -->
            <!-- <div class="panel mt-2"> -->

            <!-- SUB MENU PEMINJAMAN -->
            <a href="http://localhost/peminjaman.php" class="text-decoration-none hvr-green text-green">
                <div class="p-3 ps-4">
                    <i class="fas fa-book-open fa-sm"></i>
                    <span class="text-decoration-none ps-1">Peminjaman</span>
                </div>
            </a>

            <!-- SUB MENU PENGEMBALIAN -->
            <a href="http://localhost/pengembalian.php" class="text-decoration-none hvr-green text-green">
                <div class="p-3 ps-4">
                    <i class="fas fa-reply fa-sm"></i>
                    <span class="text-decoration-none ps-2">Pengembalian</>
                </div>
            </a>

            <!-- </div>
            </div> -->

            <!-- MENU DROPDOWN LAPORAN -->
            <!-- <div class="p-3 ps-4">
                <i class="fas fa-folder-open"></i>
                <button class="accordion text-primary">Laporan</button> -->

            <!-- DROPDOWN -->
            <!-- <div class="panel mt-2"> -->

            <!-- SUB MENU ANGGOTA -->
            <!-- <a href="http://localhost/laporan/anggota/laporan-anggota.php" class="text-decoration-none">
                        <div class="p-3 ps-4 border-bottom">
                            <i class="fas fa-user-friends fa-sm"></i>
                            <span class="text-decoration-none ps-1">Anggota</span>
                        </div>
                    </a> -->

            <!-- SUB MENU BUKU -->
            <!-- <a href="" class="text-decoration-none">
                        <div class="p-3 ps-4 border-bottom">
                            <i class="fas fa-book fa-sm"></i>
                            <span class="text-decoration-none ps-2">Buku</>
                        </div>
                    </a> -->

            <!-- SUB MENU PEMINJAMAN BUKU -->
            <!-- <a href="" class="text-decoration-none">
                        <div class="p-3 ps-4 border-bottom">
                            <i class="fas fa-list-alt fa-sm"></i>
                            <span class="text-decoration-none ps-2">Peminjaman Buku</span>
                        </div>
                    </a> -->

            <!-- SUB MENU PENGEMBALIAN BUKU -->
            <!-- <a href="" class="text-decoration-none">
                        <div class="p-3 ps-4">
                            <i class="fas fa-clipboard-list fa-sm"></i>
                            <span class="text-decoration-none ps-2">Pengembalian Buku</span>
                        </div>
                    </a>

                </div>
            </div> -->

            <!-- PENGATURAN -->
            <div class="text-green border-top mt-3">
                <p class="pengaturan text-secondary m-3">Pengaturan</p>

                <!-- MENU PENGATURAN APLIKASI -->
                <!-- <div class="p-3 ps-4">
                    <i class="fas fa-cog"></i>
                    <a href="" class="text-decoration-none ms-1 text-green">Pengaturan Aplikasi</a>
                </div> -->

                <!-- MENU LOGOUT -->
                <div class="p-3 ps-4">
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="http://localhost/logout.php" class="text-decoration-none ms-1 text-green">Keluar</a>
                </div>
            </div>

        </nav>

    </div>
</aside>

<!-- JAVASCRIPT -->
<script src="http://localhost/assets/js/sidenav.js"></script>
<script src="http://localhost/assets/bootstrap/js/bootstrap.min.js"></script>