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
                    <h2>Form Edit Data Agen</h2>
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
                                    <option value="<?= $data['cabang_counter'] ?>"><?= $data['cabang_counter'] ?></option>
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
                                <label for="inputPassword4" class="form-label"><strong>Nama Agen / KP</strong></label>
                                <input type="text" class="form-control" id="inputPassword4" name="nama_counter" value="<?= $data['nama_counter'] ?>">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="inputAddress" class="form-label"><strong>Cust ID</strong></label>
                                <input type="text" class="form-control" id="inputAddress" name="cust_id" value="<?= $data['cust_id'] ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="origin" class="form-label"><strong>Origin</strong></label>
                                <input type="text" class="form-control" id="origin" name="origin" value="<?= $data['origin'] ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="pic" class="form-label"><strong>PIC</strong></label>
                                <input type="text" class="form-control" id="pic" name="pic" value="<?= $data['pic'] ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="sistem" class="form-label"><strong>Sistem</strong></label>
                                <select class="form-control form-control-sm" name="sistem" type="text" required>
                                    <option value="<?= $data['sistem'] ?>"><?= $data['sistem'] ?></option>
                                    <option value="HYBRID">HYBRID</option>
                                    <option value="MEC">MEC</option>
                                    <option value="OFFLINE">OFFLINE</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="printer" class="form-label"><strong>Printer</strong></label>
                                <input type="text" class="form-control" id="printer" name="printer" value="<?= $data['printer'] ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="datekey" class="form-label"><strong>Datekey</strong></label>
                                <input type="date" class="form-control" id="datekey" name="datekey" value="<?= $data['datekey']  ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="status"><strong>Status :</strong></label><br>
                                <select class="form-control" name="status" type="text" required>
                                    <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                    <option value="AGEN">AGEN</option>
                                    <option value="KP">KP</option>
                                    <option value="GERAI">GERAI</option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="edit"><strong>Update</strong></button>
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