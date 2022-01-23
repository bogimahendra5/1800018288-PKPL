<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once 'layout.php'; ?>

    <!-- CONTENT DASHBOARD -->
    <section class="dashboard">

        <div class="py-4 mx-4 mb-0 fw-bold border-bottom">
            <span class="badge bg-green fs-14 text-white py-2 fst-italic">~ Selamat Datang ~</span>
            <p class="text-green mb-0"><?= $petugas['nama']; ?></p>
        </div>
        <!-- <h4 class="p-2 border-bottom mx-4 mb-0 fw-bold fst-italic"><?= $petugas['nama']; ?></h4> -->
        <p class="text-secondary my-4 ms-4 fs-14">
            Dashboard
        </p>

        <div class="d-flex flex-wrap ms-4 gap-5">

            <!-- KELOLA DATA ANGGOTA -->
            <div class="col-3">
                <div class="card p-4 bg-primary">
                    <div class="d-flex flex-row justify-content-between align-items-center text-white">
                        <div class="d-flex flex-column">
                            <a href="http://localhost/anggota.php" class="text-decoration-none text-white">
                                <p class="fs-4 fw-bold m-0 text-center">Kelola Data</p>
                                <span class="fs-12">Anggota</span>
                            </a>
                        </div>
                        <i class="fas fa-user-friends fa-3x"></i>
                    </div>
                </div>
            </div>

            <!-- KELOLA DATA BUKU -->
            <div class="col-3">
                <div class="card p-4 bg-success">
                    <div class="d-flex flex-row justify-content-between align-items-center text-white">
                        <div class="d-flex flex-column">
                            <a href="http://localhost/buku.php" class="text-decoration-none text-white">
                                <p class="fs-4 fw-bold m-0 text-center">Kelola Data</p>
                                <span class="fs-12 text-white">Buku</span>
                            </a>
                        </div>
                        <i class="fas fa-book fa-3x"></i>
                    </div>
                </div>
            </div>

            <!-- KELOLA DATA PEMINJAMAN -->
            <div class="col-3">
                <div class="card p-4 bg-info">
                    <div class="d-flex flex-row justify-content-between align-items-center pb-1 text-white">
                        <div class="d-flex flex-column">
                            <a href="http://localhost/peminjaman.php" class="text-decoration-none text-white">
                                <p class="fs-5 fw-bold m-0 text-center">Peminjaman Buku</p>
                                <span class="fs-12">Sirkulasi</span>
                            </a>
                        </div>
                        <i class="fas fa-book-open fa-3x"></i>
                    </div>
                </div>
            </div>

            <!-- KELOLA DATA PENGEMBALIAN -->
            <div class="col-3">
                <div class="card p-4 bg-warning">
                    <div class="d-flex flex-row justify-content-between align-items-center pb-1 text-white">
                        <div class="d-flex flex-column">
                            <a href="http://localhost/pengembalian.php" class="text-decoration-none text-white">
                                <p class="fs-5 fw-bold m-0 text-center">Pengembalian Buku</p>
                                <span class="fs-12">Sirkulasi</span>
                            </a>
                        </div>
                        <i class="fas fa-reply fa-3x"></i>
                    </div>
                </div>
            </div>

            <?php if ($petugas['level'] == "Administrator") : ?>
                <!-- KELOLA DATA PETUGAS, HANYA ADMIN YANG BISA MENGELOLA PETUGAS -->
                <div class="col-3">
                    <div class="card p-4 bg-danger">
                        <div class="d-flex flex-row justify-content-between align-items-center pb-1 text-white">
                            <div class="d-flex flex-column">
                                <a href="http://localhost/petugas.php" class="text-decoration-none text-white">
                                    <p class="fs-5 fw-bold m-0 text-center">Kelola Data</p>
                                    <span class="fs-12">Petugas</span>
                                </a>
                            </div>
                            <i class="fas fa-user-circle fa-3x"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- JAVASCRIPT -->

</body>

</html>