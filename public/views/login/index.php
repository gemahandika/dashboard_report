<?php
session_start();

// Jika sudah login, redirect ke halaman index
if (isset($_SESSION['admin_username'])) {
    header("location:../index.php");
    exit();
}

include '../../../app/config/koneksi.php';

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        $err = "Silahkan Masukan Username dan Password";
    } else {
        // Query untuk mendapatkan user berdasarkan username
        $sql1 = "SELECT * FROM user WHERE username = ?";
        $stmt1 = mysqli_prepare($koneksi, $sql1);

        if ($stmt1) {
            mysqli_stmt_bind_param($stmt1, "s", $username);
            mysqli_stmt_execute($stmt1);

            $result1 = mysqli_stmt_get_result($stmt1);

            // Validasi akun ditemukan dan password sesuai
            if ($result1->num_rows === 0) {
                $err = "Akun Tidak ditemukan";
            } else {
                $row = $result1->fetch_assoc();

                // Periksa password menggunakan md5
                if ($row['password'] !== md5($password)) {
                    $err = "Password Salah";
                } else {
                    // Query untuk mendapatkan akses user
                    $login_id = $row['login_id'];
                    $sql2 = "SELECT akses_id FROM admin_akses WHERE login_id = ?";
                    $stmt2 = mysqli_prepare($koneksi, $sql2);

                    if ($stmt2) {
                        mysqli_stmt_bind_param($stmt2, "s", $login_id);
                        mysqli_stmt_execute($stmt2);

                        $result2 = mysqli_stmt_get_result($stmt2);

                        $akses = [];
                        while ($row2 = $result2->fetch_assoc()) {
                            $akses[] = $row2['akses_id'];
                        }

                        // Validasi akses tidak kosong
                        if (empty($akses)) {
                            $err = "Kamu Tidak Punya Akses";
                        } else {
                            // Set session dan redirect
                            $_SESSION['admin_username'] = $username;
                            $_SESSION['admin_akses'] = $akses;
                            header("location:../index.php");
                            exit();
                        }
                    } else {
                        $err = "Kesalahan pada prepared statement 2";
                    }
                }
            }
        } else {
            $err = "Kesalahan pada prepared statement 1";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Login</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="../../../app/assets/images/JNE.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../../app/assets/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="../../../app/assets/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="../../../app/assets/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="../../../app/assets/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="../../../app/assets/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="../../../app/assets/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../../app/assets/css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="../../../app/assets/js/semantic.min.css" />

</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="210" src="../../../app/assets/images/JNE.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form">
                        <form action="" method="post">
                            <fieldset>
                                <div class="field">
                                    <label for="username" class="label_field">Username</label>
                                    <input type="text" name="username" placeholder="Username" />
                                </div>
                                <div class="field">
                                    <label for="password" class="label_field">Password</label>
                                    <input type="password" name="password" placeholder="Password" />
                                </div>
                                <div class="field">
                                    <label class="label_field hidden">hidden label</label>
                                    <!-- <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label> -->

                                    <div class="forgot">
                                        <?php
                                        if ($err) {
                                            echo "<h5 style=\"color: red;\">$err</h5>";
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button type="submit" class="main_bt" name="login"> LOGIN </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../../../app/assets/js/jquery.min.js"></script>
    <script src="../../../app/assets/js/popper.min.js"></script>
    <script src="../../../app/assets/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="../../../app/assets/js/animate.js"></script>
    <!-- select country -->
    <script src="../../../app/assets/js/bootstrap-select.js"></script>
    <!-- nice scrollbar -->
    <script src="../../../app/assets/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="../../../app/assets/js/custom.js"></script>
</body>

</html>