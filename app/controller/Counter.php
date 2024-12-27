<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_agen'])) {
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $sistem = trim(mysqli_real_escape_string($koneksi, $_POST['sistem']));
    $printer = trim(mysqli_real_escape_string($koneksi, $_POST['printer']));
    $datekey = trim(mysqli_real_escape_string($koneksi, $_POST['datekey']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "INSERT INTO tb_counter ( cabang_counter, nama_counter , cust_id, origin, pic, sistem, printer, datekey, status) 
    VALUES( '$cabang', '$nama', '$cust_id', '$origin', '$pic','$sistem',$printer,'$datekey','$status')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/data_counter/');
} else if (isset($_POST['add_user'])) {
    $nama_counter = trim(mysqli_real_escape_string($koneksi, $_POST['nama_counter']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $user_id = trim(mysqli_real_escape_string($koneksi, $_POST['user_id']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $fullname = trim(mysqli_real_escape_string($koneksi, $_POST['fullname']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM user_hybrid WHERE user_id = '$user_id'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/data_counter/');
    } else {
        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO user_hybrid ( user_id, password , username, nik, user_origin, cust_id, nama_agen, hybrid) 
    VALUES( '$user_id', '$password', '$fullname', '$nik', '$origin', '$cust_id','$nama_counter','$status')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/data_counter/');
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id_counter'];
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama_counter']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $sistem = trim(mysqli_real_escape_string($koneksi, $_POST['sistem']));
    $printer = trim(mysqli_real_escape_string($koneksi, $_POST['printer']));
    $datekey = trim(mysqli_real_escape_string($koneksi, $_POST['datekey']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_counter SET cabang_counter='$cabang', nama_counter='$nama', cust_id='$cust_id', origin='$origin',
    pic='$pic', sistem='$sistem', printer='$printer', datekey='$datekey', status='$status'  WHERE id_counter='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/data_counter/');
}
