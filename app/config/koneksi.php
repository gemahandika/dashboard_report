<?php
// Koneksi ke database lokal
$koneksi = mysqli_connect('localhost', 'jnee6778_mesit', 'Jnemes2017', 'jnee6778_itbase');

// Periksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Anda bisa menambahkan kode ini untuk debug (opsional)
// echo "Koneksi berhasil!";
