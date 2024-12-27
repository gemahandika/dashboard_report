<?php
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Edit -->
<div class="modal fade" id="addUnit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/maintenance.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">CREATE DATA UNIT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1 mt-4">
                            <label for="nama_unit"><strong>NAMA UNIT :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" id="nama_unit" name="nama_unit" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="add_unit" class="btn btn-success" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal NON AKtif 111 -->