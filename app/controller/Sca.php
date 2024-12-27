<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_sca_pickup'])) {
    $fullname = trim(mysqli_real_escape_string($koneksi, $_POST['fullname']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $zona = trim(mysqli_real_escape_string($koneksi, $_POST['zona']));
    $id_kurir = trim(mysqli_real_escape_string($koneksi, $_POST['id_kurir']));
    $pass_kurir = trim(mysqli_real_escape_string($koneksi, $_POST['pass_kurir']));
    $status_kurir = trim(mysqli_real_escape_string($koneksi, $_POST['status_kurir']));
    $tgl_kurir = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_kurir']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM sca WHERE id_kurir = '$id_kurir'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/sca/pickup.php');
    } else {
        // Masukan data ke tabel mail
        mysqli_query($koneksi, "INSERT INTO sca ( fullname, nik , phone, zona, id_kurir, pass_kurir, status_kurir, tgl_kurir) 
    VALUES( '$fullname', '$nik', '$phone', '$zona', '$id_kurir','$pass_kurir','$status_kurir','$tgl_kurir')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/sca/pickup.php');
    }
}
