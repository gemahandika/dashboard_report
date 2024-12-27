<?php
include '../header.php';
$date = date("Y-m-d");
$time = date("H:i");
$id_counter = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM user_hybrid WHERE id_hybrid = '$id_counter'") or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($sql);
?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Form Edit User</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <form class="row g-3" action="../../../app/controller/User_hybrid.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_hybrid'] ?>" readonly>
                            <div class="col-md-4 mt-4">
                                <label for="user_id" class="form-label"><strong>User ID</strong></label>
                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $data['user_id'] ?>">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $data['password'] ?>">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="fullname" class="form-label"><strong>Fullname</strong></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $data['username'] ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="nik" class="form-label"><strong>Nik</strong></label>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $data['nik'] ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="origin" class="form-label"><strong>Origin</strong></label>
                                <input type="text" class="form-control" id="origin" name="origin" value="<?= $data['user_origin'] ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="cust_id" class="form-label"><strong>Cust ID</strong></label>
                                <input type="text" class="form-control" id="cust_id" name="cust_id" value="<?= $data['cust_id'] ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="nama_agen" class="form-label"><strong>Nama Agen</strong></label>
                                <input type="text" class="form-control" id="nama_agen" name="nama_agen" value="<?= $data['nama_agen']  ?>">
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="hybrid"><strong>Status :</strong></label><br>
                                <select class="form-control" name="hybrid" type="text" required>
                                    <option value="<?= $data['hybrid'] ?>"><?= $data['hybrid'] ?></option>
                                    <option value="AGEN">AGEN</option>
                                    <option value="KP">KP</option>
                                    <option value="GERAI">GERAI</option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="edit_user"><strong>Update</strong></button>
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