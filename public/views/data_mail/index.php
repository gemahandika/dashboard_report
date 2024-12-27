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
                    <h2>Data Email JNE</h2>
                </div>
            </div>
        </div>
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="d-flex heading1 margin_0">
                            <div class="button_block mr-2"><a href="#" class="btn cur-p btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">CREATE</a></div>
                            <div class="button_block"><a href="export.php" class="btn cur-p btn-danger btn-sm" target="_blank">DOWNLOAD</a></div>
                        </div>
                    </div>
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
                            <table class="table">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">UNIT</th>
                                        <th class="small">FULLNAME</th>
                                        <th class="small">NIK</th>
                                        <th class="small">E-MAIL</th>
                                        <th class="small">PASSWORD</th>
                                        <th class="small">TANGGAL</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_mail ORDER BY id_mail DESC") or die(mysqli_error($koneksi));
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
                                            <td class="small"><?= $data['unit'] ?></td>
                                            <td class="small"><?= $data['nama'] ?></td>
                                            <td class="small"><?= $data['nik'] ?></td>
                                            <td class="small"><?= $data['mail'] ?></td>
                                            <td class="small"><?= $data['password'] ?></td>
                                            <td class="small"><?= $data['tanggal'] ?></td>
                                            <td class="d-flex">
                                                <div class="button_block "><a href="#" class="btn cur-p btn-warning btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_mail'] ?>" style="color: white;">Edit</a></div>
                                                <div class="button_block "><a href="delete.php?id=<?= $data['id_mail'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn cur-p btn-danger btn-sm">Hapus</a></div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $data['id_counter'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="../../../app/controller/Counter.php" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-warning">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: blue;">Edit Data Counter</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="report-it">
                                                                <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                                                <div class="label-1">
                                                                    <label for="cabang"><strong>CABANG :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="cabang" name="cabang" value="<?= $data['cabang_counter'] ?>" readonly>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nama"><strong>CUST NAME :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="nama" name="nama" value="<?= $data['nama_counter'] ?>">
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="cust_id"><strong>CUST ID :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="cust_id" name="cust_id" value="<?= $data['cust_id'] ?>">
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="origin"><strong>ORIGIN :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="origin" name="origin" value="<?= $data['origin'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="pic"><strong>PIC :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="pic" name="pic" value="<?= $data['pic'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="sistem"><strong>SISTEM :</strong></label><br>
                                                                    <select class="form-control form-control-sm" name="sistem" type="text" required>
                                                                        <option value="<?= $data['sistem'] ?>"><?= $data['sistem'] ?></option>
                                                                        <option value="HYBRID">HYBRID</option>
                                                                        <option value="MEC">MEC</option>
                                                                        <option value="OFFLINE">OFFLINE</option>
                                                                    </select>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="printer"><strong>PRINTER :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="number" id="printer" name="printer" value="<?= $data['printer'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="datekey"><strong>DATEKEY :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="date" id="datekey" name="datekey" value="<?= $data['datekey'] ?>">
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="status"><strong>STATUS :</strong></label><br>
                                                                    <select class="form-control form-control-sm" name="status" type="text" required>
                                                                        <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                                                        <option value="AGEN">AGEN</option>
                                                                        <option value="KP">KP</option>
                                                                        <option value="GERAI">GERAI</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <input type="submit" name="edit" class="btn btn-warning" style="color: blue;" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Modal Add user -->
                                        <div class="modal fade" id="userModal<?= $data['id_counter'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="../../../app/controller/Counter.php" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header btn-success">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">Create User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="report-it">
                                                                <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                                                <input type="hidden" name="origin" value="<?= $data['origin'] ?>">
                                                                <input type="hidden" name="cust_id" value="<?= $data['cust_id'] ?>">
                                                                <input type="hidden" name="status" value="<?= $data['status'] ?>">
                                                                <div class="label-1">
                                                                    <label for="cabang"><strong>CABANG :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="cabang" name="cabang" value="<?= $data['cabang_counter'] ?>" readonly>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nama_counter"><strong>CUST NAME :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="nama_counter" name="nama_counter" value="<?= $data['nama_counter'] ?>" readonly>
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="user_id"><strong>User ID :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="user_id" name="user_id" required>
                                                                </div>

                                                                <div class="label-1 mt-4">
                                                                    <label for="password"><strong>Password :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="password" name="password" required>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="fullname"><strong>Fullname :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="fullname" name="fullname" required>
                                                                </div>
                                                                <div class="label-1 mt-4">
                                                                    <label for="nik"><strong>NIK :</strong></label><br>
                                                                    <input class="form-control form-control-sm" type="text" id="nik" name="nik" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <input type="submit" name="add_user" class="btn btn-success" value="Create User">
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