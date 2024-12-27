<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['tutup'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id_counter']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $tutup = trim(mysqli_real_escape_string($koneksi, $_POST['date_tutup']));

    mysqli_query($koneksi, "UPDATE tb_counter SET status='$status' , tutup='$tutup' WHERE id_counter='$id'");
    showSweetAlert('danger', 'Sukses', 'Agen Berhasil Di Tutup', '#3085d6', '../../public/views/agen_tutup/');
}
