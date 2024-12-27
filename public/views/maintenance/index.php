<?php
include '../header.php';
include 'modal.php';
include 'modal_unit.php';
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Data Maintenance IT</h2>
                </div>
            </div>
        </div>
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="d-flex heading1 margin_0">
                            <div class="button_block mr-2"><a href="#" class="btn cur-p btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"> <i class="fa fa-plus"></i> TAMBAH DATA</a></div>
                            <div class="button_block"><a href="export.php" class="btn cur-p btn-secondary btn-sm" target="_blank"> <i class="fa fa-download"></i> DOWNLOAD</a></div>
                            <div class="button_block ml-2"><a href="#" class="btn cur-p btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addUnit"> <i class="fa fa-plus"></i> UNIT</a></div>
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
                            <table id="example" class="display" style="width:100%">
                                <thead class="btn-info">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">CABANG</th>
                                        <th class="small">TYPE MAINTENANCE</th>
                                        <th class="small">JENIS MAINTENANCE</th>
                                        <th class="small">UNIT</th>
                                        <th class="small">PIC REQUEST</th>
                                        <th class="small">DATE REQUEST</th>
                                        <th class="small">PROBLEM</th>
                                        <th class="small">DATE SOLVED</th>
                                        <th class="small">PIC PROSES</th>
                                        <th class="small">KETERANGAN</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM maintenance ORDER BY id_maintenance DESC") or die(mysqli_error($koneksi));
                                    $total = 0;
                                    $result = array();
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $result[] = $data;
                                    }
                                    foreach ($result as $data) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="small text-center"><?= $no ?></td>
                                            <td class="small"><?= $data['cabang'] ?></td>
                                            <td class="small"><?= $data['type_maintenance'] ?></td>
                                            <td class="small"><?= $data['jenis_maintenance'] ?></td>
                                            <td class="small"><?= $data['unit'] ?></td>
                                            <td class="small"><?= $data['pic_request'] ?></td>
                                            <td class="small"><?= $data['tgl_request'] ?></td>
                                            <td class="small"><?= $data['problem'] ?></td>
                                            <td class="small"><?= $data['tgl_solved'] ?></td>
                                            <td class="small"><?= $data['pic_proses'] ?></td>
                                            <td class="small"><?= $data['keterangan'] ?></td>
                                            <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                                                <a href="#" class="btn cur-p btn-warning btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_maintenance'] ?>" style="color: white;">Edit</a>
                                                <a href="delete.php?id=<?= $data['id_maintenance'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn cur-p btn-danger btn-sm">Hapus</a>
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