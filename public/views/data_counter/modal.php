<?php
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Edit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Counter.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-info">
                    <h6 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">Create Data E-Mail</h6>
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
                            <label for="nama"><strong>NAMA KP / AGEN :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="nama" name="nama" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="cust_id"><strong>CUST ID :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="cust_id" name="cust_id" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="origin"><strong>ORIGIN :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="origin" name="origin" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="pic"><strong>PIC :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="pic" name="pic" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="sistem"><strong>Sistem</strong></label>
                            <select class="form-control form-control-sm" type="text" name="sistem" required>
                                <option value="HYBRID">HYBRID</option>
                                <option value="MEC">MEC</option>
                                <option value="OFFLINE">OFFLINE</option>
                            </select>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="printer"><strong>PRINTER :</strong></label><br>
                            <input class="form-control form-control-sm" type="number" id="printer" name="printer" value=0>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="datekey"><strong>DATEKEY :</strong></label><br>
                            <input class="form-control form-control-sm" type="date" id="datekey" name="datekey">
                        </div>
                        <div class="label-1 mt-4">
                            <label for="status"><strong>Status :</strong></label><br>
                            <select class="form-control form-control-sm" type="text" name="status" required>
                                <option value="AGEN">AGEN</option>
                                <option value="KP">KP</option>
                                <option value="GERAI">GERAI</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="create_agen" class="btn btn-info" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal NON AKtif 111 -->