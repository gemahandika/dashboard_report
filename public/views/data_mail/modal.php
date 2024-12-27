<?php
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Edit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Mail.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">Create Data E-Mail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <!-- <div class="label-1">
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
                        </div> -->
                        <div class="label-1 mt-4">
                            <label for="unit"><strong>UNIT :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="unit" name="unit" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="nama"><strong>NAMA :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="nama" name="nama" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="nik"><strong>NIK :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="nik" name="nik" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="mail"><strong>E-MAIL :</strong></label><br>
                            <input class="form-control form-control-sm" type="email" id="mail" name="mail" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="pass"><strong>PASSWORD :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="pass" name="pass" required>
                        </div>

                        <input type="hidden" id="tanggal" name="tanggal" value="<?= $date ?>" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add" class="btn btn-success" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal NON AKtif 111 -->