<?php
include '../header.php';
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Data Users</h2>
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
                                <thead class="table-primary">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">USER ID</th>
                                        <th class="small">PASSWORD</th>
                                        <th class="small">FULLNAME</th>
                                        <th class="small">NIK</th>
                                        <th class="small">ORIGIN</th>
                                        <th class="small">CUST ID</th>
                                        <th class="small">AGEN / KP</th>
                                        <th class="small">HYBRID</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user_hybrid ORDER BY id_hybrid DESC") or die(mysqli_error($koneksi));
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
                                            <td class="small"><?= $data['user_id'] ?></td>
                                            <td class="small"><?= $data['password'] ?></td>
                                            <td class="small"><?= $data['username'] ?></td>
                                            <td class="small"><?= $data['nik'] ?></td>
                                            <td class="small"><?= $data['user_origin'] ?></td>
                                            <td class="small"><?= $data['cust_id'] ?></td>
                                            <td class="small"><?= $data['nama_agen'] ?></td>
                                            <td class="small"><?= $data['hybrid'] ?></td>
                                            <td class="d-flex">
                                                <div class="button_block "><a href="form_edit.php?id=<?= $data['id_hybrid'] ?>" class="btn cur-p btn-warning btn-sm mr-2">Edit</a></div>
                                                <div class="button_block "><a href="delete.php?id=<?= $data['id_hybrid'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn cur-p btn-danger btn-sm">Hapus</a></div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <!-- <div class="modal fade" id="editModal<?= $data['id_hybrid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="../../../app/controller/User_hybrid.php" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-warning">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: blue;">Edit Data User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="report-it">
                                                                <input type="hidden" name="id" value="<?= $data['id_hybrid'] ?>">
                                                                <div class="label-1">
                                                                    <label for="user_id"><strong>USER ID :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="user_id" name="user_id" value="<?= $data['user_id'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="password"><strong>PASSWORD :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="password" name="password" value="<?= $data['password'] ?>">
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="fullname"><strong>FULLNAME :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="fullname" name="fullname" value="<?= $data['username'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nik"><strong>NIK :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="nik" name="nik" value="<?= $data['nik'] ?>">
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="origin"><strong>ORIGIN :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="origin" name="origin" value="<?= $data['user_origin'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="cust_id"><strong>CUST ID :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="cust_id" name="cust_id" value="<?= $data['cust_id'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nama_agen"><strong>NAMA AGEN / KP :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="nama_agen" name="nama_agen" value="<?= $data['nama_agen'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="hybrid"><strong>HYBRID :</strong></label><br>
                                                                    <select class="form-control form-control-sm" name="hybrid" type="text" required>
                                                                        <option value="<?= $data['hybrid'] ?>"><?= $data['hybrid'] ?></option>
                                                                        <option value="KP">KP</option>
                                                                        <option value="AGEN">AGEN</option>
                                                                        <option value="GERAI">GERAI</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <input type="submit" name="edit_user" class="btn btn-warning" style="color: blue;" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> -->
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