<?php
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Edit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Sca.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-secondary">
                    <h6 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">Create Data E-Mail</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">

                        <div class="label-1 mt-4">
                            <label for="fullname"><strong>FULLNAME :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="fullname" name="fullname" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="nik"><strong>NIK :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="nik" name="nik" required>
                        </div>

                        <div class="label-1 mt-4">
                            <label for="phone"><strong>PHONE :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="phone" name="phone" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="zona"><strong>ZONE :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="zona" name="zona" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="id_kurir"><strong>ID COURIER :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="id_kurir" name="id_kurir" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="pass_kurir"><strong>PASSWORD :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="pass_kurir" name="pass_kurir" required>
                        </div>
                        <input type="hidden" id="status_kurir" name="status_kurir" value="PICKUP" required>
                        <input type="hidden" id="tgl_kurir" name="tgl_kurir" value="<?= $date ?>" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_sca_pickup" class="btn btn-success" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal NON AKtif 111 -->