<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $user_id = trim(mysqli_real_escape_string($koneksi, $_POST['user_id']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $fullname = trim(mysqli_real_escape_string($koneksi, $_POST['fullname']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $nama_agen = trim(mysqli_real_escape_string($koneksi, $_POST['nama_agen']));
    $hybrid = trim(mysqli_real_escape_string($koneksi, $_POST['hybrid']));

        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "UPDATE user_hybrid SET user_id='$user_id', password='$password', username='$fullname', nik='$nik', user_origin='$origin',
        cust_id='$cust_id', nama_agen='$nama_agen', hybrid='$hybrid' WHERE id_hybrid='$id'");
        showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/data_users/');
    }

