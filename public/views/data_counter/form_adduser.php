<?php
include '../header.php';
$date = date("Y-m-d");
$time = date("H:i");
$id_counter = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_counter WHERE id_counter = '$id_counter'") or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($sql);
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Form Tambah User</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <form class="row g-3" action="../../../app/controller/Counter.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                            <input type="hidden" name="origin" value="<?= $data['origin'] ?>">
                            <input type="hidden" name="cust_id" value="<?= $data['cust_id'] ?>">
                            <input type="hidden" name="status" value="<?= $data['status'] ?>">
                            <div class="col-md-3 mt-4">
                                <label for="cabang" class="form-label"><strong>Cabang</strong></label>
                                <input class="form-control" type="text" id="cabang" name="cabang" value="<?= $data['cabang_counter'] ?>" readonly>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="nama_counter" class="form-label"><strong>Nama Agen / KP</strong></label>
                                <input class="form-control" type="text" id="nama_counter" name="nama_counter" value="<?= $data['nama_counter'] ?>" readonly>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="user_id" class="form-label"><strong>User ID </strong><span style="color: red;"><strong>*</strong></span></label>
                                <input class="form-control" type="text" id="user_id" name="user_id" required>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="password" class="form-label"><strong>Password </strong><span style="color: red;"><strong>*</strong></span></label>
                                <input class="form-control" type="text" id="password" name="password" required>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fullname" class="form-label"><strong>Fullname </strong><span style="color: red;"><strong>*</strong></span></label>
                                <input class="form-control" type="text" id="fullname" name="fullname" required>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="nik" class="form-label"><strong>NIK </strong><span style="color: red;"><strong>*</strong></span></label>
                                <input class="form-control" type="text" id="nik" name="nik" required>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="add_user"><strong>Create User</strong></button>
                            </div>
                        </form>
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