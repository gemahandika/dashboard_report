<?php
include '../header.php';
include 'modal.php';
$cabang_pilihan = isset($_GET['cabang']) ? $_GET['cabang'] : '';
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
        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
            <div class="row column2 graph margin_bottom_30">
                <div class="col-md-l2 col-lg-12">
                    <div class="white_shd full">
                        <div class="full graph_head">
                            <div class="d-flex heading1 margin_0">
                                <div class="button_block mr-2">
                                    <a href="#" class="btn cur-p btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">CREATE</a>
                                </div>
                                <div class="button_block">
                                    <a href="export.php" class="btn cur-p btn-danger btn-sm mr-4" target="_blank">DOWNLOAD</a>
                                </div>
                                <form action="index.php" method="get" class="d-flex">
                                    <div class="button_block mr-2 mr-l">
                                        <select class="form-control" id="cabang" name="cabang" aria-label="Default select example" required>
                                            <option value="">- Pilih Cabang -</option>
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                                            $result = array();
                                            while ($data = mysqli_fetch_array($sql)) {
                                                $result[] = $data;
                                            }
                                            foreach ($result as $data) {
                                            ?>
                                                <option value="<?= $data['nama_cabang'] ?>" <?= ($cabang_pilihan == $data['nama_cabang']) ? 'selected' : '' ?>><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="approve" class="btn btn-primary btn-sm mr-2"><i class="fa fa-search"></i> Cari</button>
                                    <a href="index.php" class="btn btn-dark icon-btn btn-sm"><i class="fa fa-search"></i> REFRESH</a>
                                    <div class="ml-4 d-flex">
                                        <?php
                                        if (!empty($cabang_pilihan)) {
                                            echo "<h4><bold> DATA " . htmlspecialchars($cabang_pilihan) . "</bold></h4>";
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>
                                </form>
                                <div class="button_block">
                                    <a href="import.php" class="btn cur-p btn-success btn-sm mr-4">IMPORT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
                                        <?php if ($role_user === 'admin' || $role_user === 'super_admin') { ?>
                                            <th class="small">ADD USERS</th>
                                        <?php } ?>
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
                                    $result = array();

                                    // Jika role pengguna adalah "admin" atau "super admin", tampilkan seluruh data atau berdasarkan cabang yang dipilih
                                    if ($role_user == 'admin' || $role_user == 'super_admin') {
                                        if (!empty($cabang_pilihan)) {
                                            $stmt = $koneksi->prepare("SELECT * FROM tb_counter WHERE cabang_counter = ? AND status != 'TUTUP' ORDER BY id_counter DESC");
                                            if ($stmt === false) {
                                                die($koneksi->error);
                                            }
                                            $stmt->bind_param("s", $cabang_pilihan);
                                            $stmt->execute();
                                            $sql = $stmt->get_result();
                                        } else {
                                            $sql = $koneksi->query("SELECT * FROM tb_counter WHERE status != 'TUTUP' ORDER BY id_counter DESC");
                                            if ($sql === false) {
                                                die($koneksi->error);
                                            }
                                        }
                                    } else {
                                        // Jika bukan admin atau super admin, tampilkan data berdasarkan cabang pengguna yang login
                                        $stmt = $koneksi->prepare("SELECT * FROM tb_counter WHERE cabang_counter = ? AND status != 'TUTUP' ORDER BY id_counter DESC");
                                        if ($stmt === false) {
                                            die($koneksi->error);
                                        }
                                        $stmt->bind_param("s", $cabang_user);
                                        $stmt->execute();
                                        $sql = $stmt->get_result();
                                    }

                                    while ($data = mysqli_fetch_array($sql)) {
                                        $result[] = $data;
                                    }

                                    foreach ($result as $data) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class=" small text-left"><?= $no ?></td>
                                            <?php if ($role_user === 'admin' || $role_user === 'super_admin') { ?>
                                                <td>
                                                    <div class="button_block "><a href="form_adduser.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-success btn-sm mr-2">Add</a></div>
                                                </td>
                                            <?php } ?>
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
                                                <div class="button_block "><a href="form_edit.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-warning btn-sm mr-2 text-white">Edit</a></div>
                                                <div class="button_block "><a href="form_tutup.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-success btn-sm mr-2">Tutup</a></div>
                                                <div class="button_block "><a href="delete.php?id=<?= $data['id_counter'] ?>" class="btn cur-p btn-primary btn-sm">Hapus</a></div>
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