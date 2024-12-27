<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_resi_cancel'])) {
    $no_resi = trim(mysqli_real_escape_string($koneksi, $_POST['no_resi']));
    $alasan = trim(mysqli_real_escape_string($koneksi, $_POST['alasan']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $nama_agen = trim(mysqli_real_escape_string($koneksi, $_POST['nama_agen']));
    $date_req = trim(mysqli_real_escape_string($koneksi, $_POST['date_req']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM resi_cancel WHERE no_resi = '$no_resi'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/resi_cancel/resi_cancel.php');
    } else {

        // Masukan data ke tabel mail
        mysqli_query($koneksi, "INSERT INTO resi_cancel ( no_resi, alasan , cabang , cust_id, nama_agen, date_req,  keterangan) 
    VALUES( '$no_resi','$alasan','$cabang', '$cust_id', '$nama_agen', '$date_req', '$keterangan')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/resi_cancel/resi_cancel.php');
    }
}
