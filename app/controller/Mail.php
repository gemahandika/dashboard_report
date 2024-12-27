<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add'])) {
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $mail = trim(mysqli_real_escape_string($koneksi, $_POST['mail']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['pass']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_mail WHERE mail = '$mail'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/data_mail/');
    } else {
        // Masukan data ke tabel mail
        mysqli_query($koneksi, "INSERT INTO tb_mail ( unit, nama , nik, mail, password, tanggal) 
    VALUES( '$unit', '$nama', '$nik', '$mail', '$password','$tanggal')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/data_mail/');
    }
}
