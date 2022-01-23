<?php

require '../../anggota/read-anggota.php';

$data = readData();
$jumlahAnggota = countGender();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="http://localhost/assets/css/util.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Laporan Anggota</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php require '../../layout.php'; ?>

    <!-- CONTENT KELOLA ANGGOTA -->
    <section class="kelola-anggota px-4 mb-5">

        <p class="text-secondary my-4 fs-14">
            Laporan <i class="fas fa-angle-right"></i> Anggota
        </p>

        <h4 class="fw-bold my-4">
            Laporan Anggota
            <i class="fas fa-folder-open"></i>
        </h4>

        <div class="alert alert-info col-8" role="alert">
            <i class="fas fa-exclamation-circle me-1"></i>
            <span class="fw-600">Keterangan Laporan</span>

            <!-- JUMLAH LAKI-LAKI -->
            <div class="mb-2 ms-4 mt-4">
                <span class="col-2 d-inline-block">
                    <i class="fas fa-male fa-lg ms-2 me-2"></i>
                    Laki-Laki
                </span>
                <span class="col-1 d-inline-block">:</span>
                <span class="col-4 d-inline-block"><?= $jumlahAnggota['L']; ?></span>
            </div>

            <!-- JUMLAH PEREMPUAN -->
            <div class="mb-2 ms-4">
                <span class="col-2 d-inline-block">
                    <i class="fas fa-female fa-lg ms-2 me-1"></i>
                    Perempuan
                </span>
                <span class="col-1 d-inline-block">:</span>
                <span class="col-4 d-inline-block"><?= $jumlahAnggota['P']; ?></span>
            </div>

            <!-- JUMLAH SELURUH ANGGOTA -->
            <div class="mb-2 ms-4">
                <span class="col-5 d-inline-block">
                    <i class="fas fa-user-friends me-1"></i>
                    Seluruh anggota berjumlah <span class="text-decoration-underline ms-2 fw-bold"><?= $jumlahAnggota['all']; ?></span>
                </span>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Id Anggota</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $anggota) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <img src="../../assets/img/anggota/<?= $anggota['image']; ?>" alt="" width="40%" class="d-block mx-auto">
                            </td>
                            <td><?= $anggota['id']; ?></td>
                            <td><?= $anggota['nama']; ?></td>
                            <td><?= $anggota['jk']; ?></td>
                            <td><?= $anggota['alamat']; ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="http://localhost/anggota.php" class="btn btn-light">Kelola Data</a>

    </section>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                "columnDefs": [{
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "10%",
                        "targets": 1
                    },
                    {
                        "width": "10%",
                        "targets": 2
                    },
                    {
                        "width": "15%",
                        "targets": 3
                    },
                    {
                        "width": "10%",
                        "targets": 4
                    },
                    {
                        "width": "20%",
                        "targets": 5
                    },
                ],
                autoWidth: false
            });

        });
    </script>
</body>

</html>