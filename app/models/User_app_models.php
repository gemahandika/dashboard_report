<?php
if (!isset($_SESSION['admin_username'])) {
    header("location:../login/index.php");
}
$user1 = $_SESSION['admin_username'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$nama = $data1['nama_user'];
$cabang_user = $data1['cabang'];
$role_user = $data1['status'];
