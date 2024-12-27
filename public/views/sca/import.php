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
            $fullname = trim($worksheet->getCell('A' . $row)->getValue());
            $nik = trim($worksheet->getCell('B' . $row)->getValue());
            $phone = trim($worksheet->getCell('C' . $row)->getValue());
            $zona = trim($worksheet->getCell('D' . $row)->getValue());
            $id_kurir = trim($worksheet->getCell('E' . $row)->getValue());
            $pass_kurir = trim($worksheet->getCell('F' . $row)->getValue());
            $status_kurir = trim($worksheet->getCell('G' . $row)->getValue());
            $tgl_kurir = trim($worksheet->getCell('H' . $row)->getValue());

            // Simpan data ke database
            $stmt = $koneksi->prepare("INSERT INTO sca (fullname, nik, phone, zona, id_kurir, pass_kurir, status_kurir, tgl_kurir) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $fullname, $nik, $phone, $zona, $id_kurir, $pass_kurir, $status_kurir, $tgl_kurir);
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
            window.location.href = 'pickup.php';
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
<div class="midde_cont">
    <div class="container">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Import Data</h2>
                </div>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">File Excel:</label>
                <input type="file" class="form-control" name="file" required>
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>

<?php
include '../footer.php';
?>