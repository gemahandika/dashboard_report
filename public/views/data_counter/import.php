<?php
require '../../../vendor/autoload.php';
include '../header.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    $file = $_FILES['file']['tmp_name'];
    if ($file) {
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; $row++) {
            $cabang_counter = trim($worksheet->getCell('A' . $row)->getValue());
            $nama_counter = trim($worksheet->getCell('B' . $row)->getValue());
            $cust_id = trim($worksheet->getCell('C' . $row)->getValue());
            $origin = trim($worksheet->getCell('D' . $row)->getValue());
            $pic = trim($worksheet->getCell('E' . $row)->getValue());
            $sistem = trim($worksheet->getCell('F' . $row)->getValue());
            $printer = trim($worksheet->getCell('G' . $row)->getValue());
            $datekey = trim($worksheet->getCell('H' . $row)->getValue());
            $status = trim($worksheet->getCell('I' . $row)->getValue());

            // Simpan data ke database
            $stmt = $koneksi->prepare("INSERT INTO tb_counter (cabang_counter, nama_counter, cust_id, origin, pic, sistem, printer, datekey, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $cabang_counter, $nama_counter, $cust_id, $origin, $pic, $sistem, $printer, $datekey, $status);
            $stmt->execute();
        }
        // Notifikasi sukses
        echo "<script>
        swal({
            title: 'Berhasil!',
            text: 'Data berhasil diimpor!',
            icon: 'success'
        });
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1000); // 1 detik
      </script>";
    } else {
        // Notifikasi gagal
        echo "<script>
                swal({
                    title: 'Gagal!',
                    text: 'Gagal mengunggah file!',
                    icon: 'error'
                });
              </script>";
    }
}
?>
<!-- Form untuk mengimpor file -->
<div class="container">
    <h2>Import Data dari Excel</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">File Excel:</label>
            <input type="file" class="form-control" name="file" required>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>
</div>

<?php
include '../footer.php';
?>