<?php
include '../header.php';
include 'modal.php';
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Aktivasi User</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table id="example" class="table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">NIK</th>
                                        <th class="small">NAMA USER</th>
                                        <th class="small">USERNAME</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status = 'NONAKTIF' ORDER BY login_id DESC") or die(mysqli_error($koneksi));
                                    $total = 0;
                                    $result = array();
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $result[] = $data;
                                    }
                                    foreach ($result as $data) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="small text-left"><?= $no ?></td>
                                            <td class="small"><?= $data['nip'] ?></td>
                                            <td class="small"><?= $data['nama_user'] ?></td>
                                            <td class="small"><?= $data['username'] ?></td>
                                            <td class="d-flex">
                                                <div class="button_block "><a href="#" class="btn cur-p btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#aktifModal<?= $data['login_id'] ?>">AKTIFKAN USER</a></div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="aktifModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="../../../app/controller/User_aplikasi.php" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-success">
                                                            <h6 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">AKTIFKAN USER</h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="report-it">
                                                                <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                                                <div class="label-1">
                                                                    <label for="nik"><strong>NIK :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" name="nik" value="<?= $data['nip'] ?>" required readonly>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nama_user"><strong>FULLNAME :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" name="nama_user" value="<?= $data['nama_user'] ?>" required readonly>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="username"><strong>USER ID :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" name="username" value="<?= $data['username'] ?>" required readonly>
                                                                </div>
                                                                <input type="hidden" name="password" value="123" required readonly>

                                                                <div class="label-1 mt-4">
                                                                    <label for="cabang"><strong>CABANG :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" name="cabang" value="<?= $data['cabang'] ?>" required readonly>
                                                                </div>
                                                                <!-- <input type="hidden" name="status" value="NONAKTIF" required readonly> -->
                                                                <div class="label-1 mt-4">
                                                                    <label for="role"><strong>ROLE</strong></label>
                                                                    <select class="form-control form-control-sm" type="text" name="role" required>
                                                                        <option value="user">USER</option>
                                                                        <option value="admin">ADMIN</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <input type="submit" name="aktif_user" class="btn btn-success" style="color: white;" value="Aktifkan">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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