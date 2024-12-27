<?php
include '../header.php';
$date = date("Y-m-d");
$time = date("H:i");
$id_counter = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_counter WHERE id_counter = '$id_counter'") or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($sql);
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Form Agen Aktif</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <form class="row g-3" action="../../../app/controller/Agen_aktif.php" method="post">
                            <input type="hidden" name="id_counter" value="<?= $data['id_counter'] ?>" readonly>
                            <input type="hidden" name="status" value="AGEN" readonly>
                            <div class="col-md-4">
                                <label for="cabang" class="form-label"><strong>Cabang</strong></label>
                                <input type="text" class="form-control" id="cabang" name="cabang" value="<?= $data['cabang_counter'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label"><strong>Nama Agen / KP</strong></label>
                                <input type="text" class="form-control" id="inputPassword4" name="nama_counter" value="<?= $data['nama_counter'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label"><strong>Cust ID</strong></label>
                                <input type="text" class="form-control" id="inputAddress" name="cust_id" value="<?= $data['cust_id'] ?>" readonly>
                            </div>

                            <input type="hidden" class="form-control" id="tanggal_tutup" name="date_tutup" value="0000-00-00">

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-danger" name="aktif"><strong>Aktifkan</strong></button>
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