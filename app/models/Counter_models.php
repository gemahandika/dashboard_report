<?php


//  Fungsi untuk menghitung jumlah data
function hitungJumlahData($koneksi, $status, $sistem, $cabang = null)
{
    $query = "SELECT COUNT(*) as jumlah FROM tb_counter WHERE sistem = '$sistem' AND status != 'TUTUP' AND status ='$status'";

    if (!empty($cabang)) {
        $cabang = mysqli_real_escape_string($koneksi, $cabang);
        $query .= " AND cabang_counter='$cabang'";
    }

    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $row = mysqli_fetch_assoc($result);
    return $row['jumlah'];
}



$cabang_filter = null;

// Jika peran adalah admin atau super_admin, izinkan semua data ditampilkan dan pilih cabang dari form jika ada
if ($role_user === 'admin' || $role_user === 'super_admin') {
    $cabang_filter = $_GET['cabang'] ?? null; // Ambil cabang dari GET jika ada

} else {
    // Jika peran adalah user, filter berdasarkan cabang pengguna yang login
    $cabang_filter = $cabang_user;
}

// Mendapatkan jumlah data untuk AGEN
$data_hybrid = hitungJumlahData($koneksi, 'AGEN', 'HYBRID', $cabang_filter);
$data_mec = hitungJumlahData($koneksi, 'AGEN', 'MEC', $cabang_filter);
$data_offline = hitungJumlahData($koneksi, 'AGEN', 'OFFLINE', $cabang_filter);
$all_data = $data_hybrid + $data_mec + $data_offline;

// Mendapatkan jumlah data untuk GERAI
$gerai_hybrid = hitungJumlahData($koneksi, 'GERAI', 'HYBRID', $cabang_filter);
$gerai_mec = hitungJumlahData($koneksi, 'GERAI', 'MEC', $cabang_filter);
$gerai_offline = hitungJumlahData($koneksi, 'GERAI', 'OFFLINE', $cabang_filter);

// Hitung jumlah printer
$printer_query = "SELECT COUNT(*) as jumlah FROM tb_counter WHERE printer = '1' AND status != 'TUTUP'";
if (!empty($cabang_filter)) {
    $printer_query .= " AND cabang_counter='" . mysqli_real_escape_string($koneksi, $cabang_filter) . "'";
}
$printer_result = mysqli_query($koneksi, $printer_query) or die(mysqli_error($koneksi));
$printer_row = mysqli_fetch_assoc($printer_result);
$printer = $printer_row['jumlah'];

function hitungDataKP($koneksi, $cabang = null)
{
    $query = "SELECT COUNT(*) as jumlah FROM tb_counter WHERE status = 'KP'";

    if (!empty($cabang)) {
        $cabang = mysqli_real_escape_string($koneksi, $cabang);
        $query .= " AND cabang_counter='$cabang'";
    }

    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $row = mysqli_fetch_assoc($result);
    return $row['jumlah'];
}

// Mendapatkan jumlah data dengan status "KP"
$data_kp = hitungDataKP($koneksi, $cabang_filter);

// Ubah data ke dalam format JSON jika diperlukan
$data_json = json_encode([$data_hybrid, $data_mec, $data_offline]);
$gerai_json = json_encode([$gerai_hybrid, $gerai_mec, $gerai_offline]);
$printer_json = json_encode([$printer]);


// ==================================================================================
// Query untuk menghitung jumlah per cabang dan sistem
$sql = "SELECT cabang_counter, sistem, COUNT(*) AS jumlah FROM tb_counter WHERE cabang_counter != 'KCU MEDAN' AND status != 'KP'  GROUP BY cabang_counter, sistem";
$result = $koneksi->query($sql);

// Array untuk menyimpan data berdasarkan cabang
$cabang = [];
$hybrid = [];
$mec = [];
$offline = [];

if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    while ($row = $result->fetch_assoc()) {
        $cabang_counter = $row['cabang_counter'];
        $sistem = $row['sistem'];
        $jumlah = $row['jumlah'];

        // Menyimpan jumlah berdasarkan sistem untuk setiap cabang
        if (!isset($cabang[$cabang_counter])) {
            $cabang[$cabang_counter] = ['HYBRID' => 0, 'MEC' => 0, 'OFFLINE' => 0];
        }

        // Menambahkan jumlah ke array yang sesuai
        if ($sistem == 'HYBRID') {
            $cabang[$cabang_counter]['HYBRID'] = $jumlah;
        } elseif ($sistem == 'MEC') {
            $cabang[$cabang_counter]['MEC'] = $jumlah;
        } elseif ($sistem == 'OFFLINE') {
            $cabang[$cabang_counter]['OFFLINE'] = $jumlah;
        }
    }
} else {
    echo "0 results";
}

// ============================================================================================
// Query untuk origin = 'MES10000'
$query_mes = "SELECT 
                 SUM(CASE WHEN sistem = 'HYBRID' THEN 1 ELSE 0 END) AS hybrid,
                 SUM(CASE WHEN sistem = 'MEC' THEN 1 ELSE 0 END) AS mec,
                 SUM(CASE WHEN sistem = 'OFFLINE' THEN 1 ELSE 0 END) AS offline
              FROM tb_counter
              WHERE origin = 'MES10000'";
$result_mes = $koneksi->query($query_mes);
$data_mes = $result_mes ? $result_mes->fetch_assoc() : ['hybrid' => 0, 'mec' => 0, 'offline' => 0];

// Query untuk selain origin = 'MES10000'
$query_non_mes = "SELECT 
                     SUM(CASE WHEN sistem = 'HYBRID' THEN 1 ELSE 0 END) AS hybrid,
                     SUM(CASE WHEN sistem = 'MEC' THEN 1 ELSE 0 END) AS mec,
                     SUM(CASE WHEN sistem = 'OFFLINE' THEN 1 ELSE 0 END) AS offline
                  FROM tb_counter
                  WHERE origin != 'MES10000'";
$result_non_mes = $koneksi->query($query_non_mes);
$data_non_mes = $result_non_mes ? $result_non_mes->fetch_assoc() : ['hybrid' => 0, 'mec' => 0, 'offline' => 0];

// Data untuk chart
$data_chart = [
    'MES10000' => $data_mes,
    'Non_MES10000' => $data_non_mes
];

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Query untuk menghitung jumlah data
$sql = "SELECT COUNT(*) AS total_data FROM user_hybrid";
$result = $koneksi->query($sql);

// Simpan jumlah data ke dalam variabel
$total_data = 0; // Default jika tidak ada data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_data = $row['total_data'];
}
