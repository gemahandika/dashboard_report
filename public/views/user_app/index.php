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
                    <h2>Data User Aplikasi</h2>
                </div>
            </div>
        </div>

        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="d-flex heading1 margin_0">
                            <div class="button_block mr-2"><a href="#" class="btn cur-p btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">CREATE</a></div>
                            <div class="button_block"><a href="aktivasi.php" class="btn cur-p btn-info btn-sm">AKTIVASI USER</a></div>
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
                            <table id="example" class="table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">NIK</th>
                                        <th class="small">NAMA USER</th>
                                        <th class="small">USERNAME</th>
                                        <th class="small">CABANG</th>
                                        <th class="small">STATUS</th>
                                        <th class="small">CUST ID</th>
                                        <th class="small">NAMA AGEN</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status != 'super_admin' ORDER BY login_id DESC") or die(mysqli_error($koneksi));
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
                                            <td class="small"><?= $data['cabang'] ?></td>
                                            <td class="small"><?= $data['status'] ?></td>
                                            <td class="small"><?= $data['cust_id'] ?></td>
                                            <td class="small"><?= $data['nama_agen'] ?></td>
                                            <td class="d-flex">
                                                <div class="button_block "><a href="form_edit.php?id=<?= $data['login_id'] ?>" class="btn cur-p btn-warning btn-sm mr-2">Edit</a></div>
                                                <div class="button_block "><a href="nonaktif.php?id=<?= $data['login_id'] ?>" class="btn cur-p btn-danger btn-sm">Non Aktif</a></div>
                                            </td>
                                        </tr>

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