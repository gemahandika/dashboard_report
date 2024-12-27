<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['user_app'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama_user = trim(mysqli_real_escape_string($koneksi, $_POST['nama_user']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "INSERT INTO user ( nip, nama_user , username, password, cabang, status) 
    VALUES( '$nik', '$nama_user', '$username', '$password', '$cabang','$status')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/user_app/aktivasi.php');
} else if (isset($_POST['aktif_user'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $status = $_POST['role'];
    mysqli_query($koneksi, "UPDATE user SET password=MD5('$password'), status='$status' 
    WHERE login_id='$id'");
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $akses = trim(mysqli_real_escape_string($koneksi, $_POST['role']));
    mysqli_query($koneksi, "INSERT INTO admin_akses (login_id, akses_id) VALUES('$id', '$akses')");
    showSweetAlert('success', 'Success', 'User Berhasil Di Aktifkan', '#3085d6', '../../public/views/user_app/index.php');
}
