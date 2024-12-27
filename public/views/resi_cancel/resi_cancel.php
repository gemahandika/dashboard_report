<?php
include '../header.php';
include 'modal.php';
$datetime = date("Y-m-d H:i");
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Resi Cancel</h2>
                </div>
            </div>
        </div>
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="d-flex heading1 margin_0">
                            <form class="row g-3" action="../../../app/controller/Resi_cancel.php" method="post">

                                <div class="col-md-4 mt-2">
                                    <label for="no_resi" class="form-label"><strong>Nomor Resi :</strong></label>
                                    <input type="text" class="form-control" id="no_resi" name="no_resi" required>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="alasan" class="form-label"><strong>Alasan Cancel :</strong></label>
                                    <input type="text" class="form-control" id="alasan" name="alasan" required>
                                </div>

                                <input type="hidden" class="form-control" id="cabang" name="cabang" value="<?= $cabang_user ?>" required readonly>

                                <div class="col-md-2 mt-2">
                                    <label for="cust_id" class="form-label"><strong>CUST ID :</strong></label>
                                    <input type="text" class="form-control" id="cust_id" name="cust_id">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="nama_agen" class="form-label"><strong>Nama Agen / KP :</strong></label>
                                    <input type="text" class="form-control" id="nama_agen" name="nama_agen">
                                </div>

                                <input type="hidden" class="form-control" id="date_req" name="date_req" value="<?= $datetime ?>" readonly>
                                <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="REQUEST">

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary" name="add_resi_cancel"><strong>Kirim</strong></button>
                                </div>
                            </form>
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
                                <thead class="btn-primary">
                                    <tr>
                                        <th class="small">NO</th>
                                        <th class="small">NOMOR RESI</th>
                                        <th class="small">ALASAN CANCEL</th>
                                        <th class="small">CABANG</th>
                                        <th class="small">CUST_ID</th>
                                        <th class="small">NAMA AGEN</th>
                                        <th class="small">TANGGAL REQUEST</th>
                                        <th class="small">TANGGAL PROSES</th>
                                        <th class="small">KETERANGAN</th>
                                        <th class="small">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM resi_cancel ORDER BY id_resi DESC") or die(mysqli_error($koneksi));
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
                                            <td class="small"><?= $data['no_resi'] ?></td>
                                            <td class="small"><?= $data['alasan'] ?></td>
                                            <td class="small"><?= $data['cabang'] ?></td>
                                            <td class="small"><?= $data['cust_id'] ?></td>
                                            <td class="small"><?= $data['nama_agen'] ?></td>
                                            <td class="small"><?= $data['date_req'] ?></td>
                                            <td class="small"><?= $data['date_email'] ?></td>
                                            <td class="small text-center"><?= $data['keterangan'] ?></td>
                                            <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                                                <a href="#" class="btn cur-p btn-secondary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_resi'] ?>" style="color: white;">Edit</a>
                                                <a href="delete.php?id=<?= $data['id_resi'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn cur-p btn-secondary btn-sm">Hapus</a>
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