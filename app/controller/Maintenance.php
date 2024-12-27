<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_maintenance'])) {
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $type = trim(mysqli_real_escape_string($koneksi, $_POST['type']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $pic_req = trim(mysqli_real_escape_string($koneksi, $_POST['pic_req']));
    $date_req = trim(mysqli_real_escape_string($koneksi, $_POST['date_req']));
    $problem = trim(mysqli_real_escape_string($koneksi, $_POST['problem']));
    $date_solved = trim(mysqli_real_escape_string($koneksi, $_POST['date_solved']));
    $pic_proses = trim(mysqli_real_escape_string($koneksi, $_POST['pic_proses']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    // Masukan data ke tabel mail
    mysqli_query($koneksi, "INSERT INTO maintenance ( cabang, type_maintenance , jenis_maintenance , unit, pic_request, tgl_request, problem, tgl_solved, pic_proses, keterangan) 
    VALUES( '$cabang','$type','$jenis', '$unit', '$pic_req', '$date_req', '$problem','$date_solved','$pic_proses','$keterangan')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/maintenance/');
} else if (isset($_POST['add_unit'])) {
    $nama_unit = trim(mysqli_real_escape_string($koneksi, $_POST['nama_unit']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_unit WHERE nama_unit = '$nama_unit'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/maintenance/');
    } else {
        // Masukan data ke tabel mail
        mysqli_query($koneksi, "INSERT INTO tb_unit (nama_unit) 
    VALUES( '$nama_unit')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/maintenance/');
    }
}
