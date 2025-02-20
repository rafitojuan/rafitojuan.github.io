<?php

include "../function/function.php";
if (isset($_POST['register'])) {
    if (tambahUser($_POST)) {
        $registered = '
            <script src="asset/dist/sweetalert2.all.min.js"></script>
            <script>
                function Regitered() {
                    Swal.fire({
                        title: "Behasil!",
                        text: "Akun berhasil didaftarkan!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(function() {
                        document.location.href="login";
                    });
                };
            </script>';

        echo $registered;
        echo '<p class="d-none text-center"></p>';
        echo '<script>Regitered();</script>';
    } else {
        // $notRegistered = '
        //     <script src="asset/dist/sweetalert2.all.min.js"></script>
        //     <script>
        //         function notRegistered() {
        //             Swal.fire({
        //                 title: "Ooops!",
        //                 text: "Akun gagal didaftarkan, Coba lagi!",
        //                 icon: "error",
        //                 confirmButtonText: "OK"
        //             }).then(function() {
        //                 document.location.href="register";
        //             });
        //         };
        //     </script>';

        // echo $notRegistered;
        // echo '<p class="d-none text-center"></p>';
        // echo '<script>notRegistered();</script>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Registrasi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="shortcut icon" href="asset/img/SEMUDAH-LOGO.png" type="image/x-icon">

</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                <div class="wrapper">
                    <center>
                        <img src="asset/img/SEMUDAH-LOGO.png" alt="" class="mb-2">
                    </center>
                    <h3 class="text-center">Daftar Sekarang!</h3>
                    <p class="text-muted text-center mb-5">Buruan daftar sekarang untuk pesan jasa kami</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="nama mb-4">
                            <input type="text" name="nama" id="" class="form-control border-input  m-auto" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="email mb-4">
                            <input type="email" name="email" id="" class="form-control border-input  m-auto" placeholder="Email" required>
                        </div>
                        <div class="noTelp mb-4">
                            <input type="number" name="telp" id="" class="form-control border-input  m-auto" placeholder="No Handphone" required>
                        </div>
                        <div class="Password mb-4">
                            <input type="password" name="password" id="" class="form-control border-input  m-auto" placeholder="Password" required>
                        </div>
                        <div class="Konfir Password mb-4">
                            <input type="password" name="konfir" id="" class="form-control border-input  m-auto" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="foto">
                            <label for="" class="form-label">Masukkan Foto anda</label>
                            <input type="file" name="foto" class="form-control border-input mb-4" id="" required>
                        </div>
                        <button type="submit" name="register" class="btn bg-semudah text-white w-100 mb-2">Daftar</button>
                        <center>
                            <span>Sudah punya akun? <a href="login" class="text-decoration-none text-semudah">Login disini</a></span>
                        </center>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 bg-login d-none d-md-block">
                <div class="bg-login"></div>
            </div>
        </div>
    </div>



    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>