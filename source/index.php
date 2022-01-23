<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>

    <div class="login d-flex justify-content-center align-items-center">
        <div class="card col-3 p-4">
            <h5 class="mb-5 text-green fw-bold">Selamat Datang</h5>

            <form action="verifLogin.php" method="POST">

                <!-- USERNAME -->
                <!-- <div class="input-group mb-3">
                    <span class="input-group-text" id="username">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div> -->

                <div class="group mb-5">
                    <input type="text" id="username" name="username" class="w-100" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label for="username">Username</label>
                </div>

                <!-- PASSWORD -->
                <!-- <div class="input-group">
                    <span class="input-group-text" id="password">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div> -->

                <div class="group mb-4">
                    <input type="password" id="password" name="password" class="w-100" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label for="password">Password</label>
                </div>

                <div class="d-flex flex-row-reverse mb-3">
                    <button type="submit" class="btn-green p-1 px-2 mt-3 w-25">Masuk</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Toast Login, Untuk menampilkan notifikasi jika petugas salah username atau password -->
    <?php if (isset($_SESSION['loginFail']) == "fail") : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-danger text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-times-circle fa-lg"></i>
                        <strong class="fs-6">Gagal Login</strong>
                        <p class="mb-0 ms-4 mt-1">Username atau Password Salah!</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['loginFail']); ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="http://localhost/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            // Creates an array of toasts (it only initializes them)
            return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
        toastList.forEach(toast => toast.show()); // This show them
    </script>

</body>

</html>