<?php
include '../header.php';

$chk = $_POST['cabang'];
if (!isset($chk)) {
    echo "<script>alert('Silahkan Pilih Data Terlebih Dahulu'); window.location='cek_tagihan.php';</script>";
} else {
?>

    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Data Agen & KP</h2>
                    </div>
                </div>
            </div>
            <div class="row column2 graph margin_bottom_30">
                <div class="col-md-l2 col-lg-12">
                    <div class="white_shd full">
                        <div class="full graph_head">
                            <div class="d-flex heading1 margin_0">
                                <div class="button_block mr-2"><a href="index.php" class="btn cur-p btn-info btn-sm">BACK</a></div>
                                <!-- <div class="button_block"><a href="export.php" class="btn cur-p btn-danger btn-sm" target="_blank">DOWNLOAD</a></div> -->
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
                                    <thead class="table-info">
                                        <tr>
                                            <th class="small">NO</th>
                                            <th class="small">ADD USERS</th>
                                            <th class="small">CABANG</th>
                                            <th class="small">NAMA</th>
                                            <th class="small">CUST ID</th>
                                            <th class="small">ORIGIN</th>
                                            <th class="text-left small">PIC</th>
                                            <th class="small">SISTEM</th>
                                            <th class="small">PRINTER</th>
                                            <th class="small">DATEKEY</th>
                                            <th class="small">STATUS</th>
                                            <th class="small">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_counter WHERE cabang_counter = '$chk' AND  status != 'TUTUP' ORDER BY id_counter DESC") or die(mysqli_error($koneksi));
                                        $total = 0;
                                        $result = array();
                                        while ($data = mysqli_fetch_array($sql)) {
                                            $result[] = $data;
                                        }
                                        foreach ($result as $data) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td class=" small text-left"><?= $no ?></td>
                                                <td>
                                                    <div class="button_block "><a href="form_adduser.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-success btn-sm mr-2">Add</a></div>
                                                </td>
                                                <td class="small"><?= $data['cabang_counter'] ?></td>
                                                <td class="small"><?= $data['nama_counter'] ?></td>
                                                <td class="small"><?= $data['cust_id'] ?></td>
                                                <td class="small"><?= $data['origin'] ?></td>
                                                <td class="small"><?= $data['pic'] ?></td>
                                                <td class="small"><?= $data['sistem'] ?></td>
                                                <td class="small text-right"><?= $data['printer'] ?></td>
                                                <td class="small"><?= $data['datekey'] ?></td>
                                                <td class="small"><?= $data['status'] ?></td>
                                                <td class="d-flex">
                                                    <div class="button_block "><a href="form_edit.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-warning btn-sm mr-2">Edit</a></div>
                                                    <div class="button_block "><a href="form_tutup.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-danger btn-sm">Tutup</a></div>
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
}
?>