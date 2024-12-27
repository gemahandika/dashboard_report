<?php

$sql = "SELECT COUNT(*) AS total_maintenance FROM maintenance";
$result = $koneksi->query($sql);

// Simpan jumlah data ke dalam variabel
$total_maintenance = 0; // Default jika tidak ada data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_maintenance = $row['total_maintenance'];
}
