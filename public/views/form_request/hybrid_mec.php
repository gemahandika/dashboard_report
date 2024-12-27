<?php
include '../header.php';
$date = date("Y-m-d");
$time = date("H:i");

?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Form Request User Hybrid & MEC</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <form class="row g-3" action="../../../app/controller/Counter.php" method="post">
                            <input type="hidden" name="id_counter" value="<?= $data['id_counter'] ?>" readonly>
                            <div class="col-md-4 mt-4">
                                <label for="cabang" class="form-label"><strong>Cabang</strong></label>
                                <select class="form-control" id="cabang" name="cabang" aria-label="Default select example" required>

                                    <?php
                                    $no = 1;
                                    $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                                    $result = array();
                                    while ($data1 = mysqli_fetch_array($sql1)) {
                                        $result[] = $data1;
                                    }
                                    foreach ($result as $data1) {
                                    ?>
                                        <option value="<?= $data1['nama_cabang'] ?>"><?= $no++; ?>. <?= $data1['nama_cabang'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="nama_lengkap" class="form-label"><strong>Nama Lengkap :</strong></label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="nik" class="form-label"><strong>Nik KTP / Karyawan :</strong></label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="cust_id" class="form-label"><strong>Cust ID</strong></label>
                                <input type="text" class="form-control" id="cust_id" name="cust_id">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="nama_agen" class="form-label"><strong>Nama Agen / KP</strong></label>
                                <input type="text" class="form-control" id="nama_agen" name="nama_agen">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="sistem" class="form-label"><strong>Hybrid / MEC</strong></label>
                                <select class="form-control form-control-sm" name="sistem" type="text" required>
                                    <option value="HYBRID">HYBRID</option>
                                    <option value="MEC">MEC</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="tgl_req" class="form-label"><strong>Tanggal Req</strong></label>
                                <input type="text" class="form-control" id="tgl_req" name="tgl_req" value="<?= $date ?>" readonly>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="file_ktp" class="form-label"><strong>Poto KTP</strong></label>
                                <input type="file" class="form-control" id="file_ktp" name="file_ktp">
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="edit"><strong>Kirim</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end dashboard inner -->

<?php
include '../footer.php';
?>