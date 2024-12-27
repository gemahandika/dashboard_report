<?php
include '../header.php';
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Data All User & Password</h2>
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
                                <thead class="table-warning">
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