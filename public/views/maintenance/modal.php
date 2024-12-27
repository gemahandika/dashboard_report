<?php
include '../../../app/config/koneksi.php';
$user1 = $_SESSION['admin_username'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$nama = $data1['nama_user'];
$date = date("Y-m-d");
$time = date("H:i");

?>
<!-- Modal Edit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/maintenance.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">CREATE DATA MAINTENANCE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1">
                            <label for="cabang"><strong>CABANG :</strong></label><br>
                            <select class="form-control" id="cabang" name="cabang" aria-label="Default select example" required>
                                <option value="">- Pilih Cabang -</option>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                ?>
                                    <option value="<?= $data['nama_cabang'] ?>"><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="type"><strong>TYPE MAINTENANCE :</strong></label><br>
                            <select class="form-control" id="type" name="type" aria-label="Default select example" required>
                                <option value="SOFTWARE">SOFTWARE</option>
                                <option value="HARDWARE">HARDWARE</option>
                            </select>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="jenis"><strong>JENIS MAINTENANCE :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="jenis" name="jenis" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="unit"><strong>UNIT :</strong></label><br>
                            <select class="form-control" id="unit" name="unit" aria-label="Default select example" required>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_unit") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                ?>
                                    <option value="<?= $data['nama_unit'] ?>"> <?= $data['nama_unit'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="pic_req"><strong>PIC REQUEST :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="pic_req" name="pic_req" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="date_req"><strong>DATE REQUEST :</strong></label><br>
                            <input class="form-control form-control-sm" type="date" id="date_req" name="date_req" value="<?= $date ?>" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="problem"><strong>PROBLEM :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="problem" name="problem" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="date_solved"><strong>DATE SOLVED :</strong></label><br>
                            <input class="form-control form-control-sm" type="date" id="date_solved" name="date_solved" value="<?= $date ?>" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="pic_proses"><strong>PIC PROSES :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="pic_proses" name="pic_proses" value="<?= $nama ?>" required readonly>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="keterangan"><strong>KETERANGAN :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="keterangan" name="keterangan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_maintenance" class="btn btn-info" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal NON AKtif 111 -->