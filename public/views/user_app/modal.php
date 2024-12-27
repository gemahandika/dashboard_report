<?php
include '../../../app/config/koneksi.php';


// search_agen.php

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $pdo->prepare("SELECT id, name FROM tb_agen WHERE name LIKE ? LIMIT 10");
    $stmt->execute(['%' . $query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}

?>




<!-- Modal Edit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/User_aplikasi.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h6 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">Create Data User Aplikasi</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1">
                            <label for="nik"><strong>NIK :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" name="nik" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="nama_user"><strong>FULLNAME :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" name="nama_user" required>
                        </div>
                        <div class="label-1 mt-4">
                            <label for="username"><strong>USER ID :</strong></label><br>
                            <input class="form-control form-control-sm" type="text" name="username" required>
                        </div>
                        <input type="hidden" name="password" value="123" required readonly>

                        <div class="label-1 mt-4">
                            <label for="cabang"><strong>CABANG :</strong></label><br>
                            <select class="form-control" id="cabang" name="cabang" aria-label="Default select example" required onchange="filterCounters()">
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
                                    <option value="<?= $data['nama_cabang'] ?>"><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="modal-body">
                            <input type="text" id="searchBox" class="form-control" placeholder="Ketik nama agen...">
                            <ul id="resultList" class="list-group mt-3"></ul>
                        </div>


                        <input type="hidden" name="status" value="NONAKTIF" required readonly>
                        <!-- <div class="label-1 mt-4">
                            <label for="sistem"><strong>Sistem</strong></label>
                            <select class="form-control form-control-sm" type="text" name="sistem" required>
                                <option value="admin">ADMIN</option>
                                <option value="user">USER</option>
                            </select>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="user_app" class="btn btn-info" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#searchBox').on('input', function() {
            let query = $(this).val();

            if (query.length > 2) { // Lakukan pencarian jika panjang input lebih dari 2 karakter
                $.ajax({
                    url: 'search_agen.php', // Endpoint PHP untuk mencari data
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        let results = JSON.parse(response);
                        let resultList = $('#resultList');
                        resultList.empty(); // Kosongkan hasil sebelumnya

                        results.forEach(result => {
                            resultList.append(`
                            <li class="list-group-item" data-id="${result.id}" data-name="${result.name}">
                                ${result.name}
                            </li>
                        `);
                        });

                        // Klik pada hasil untuk memilih data
                        $('#resultList li').on('click', function() {
                            let id = $(this).data('id');
                            let name = $(this).data('name');

                            $('#nama_counter').append(`<option value="${id}" selected>${name}</option>`);
                            $('#searchModal').modal('hide'); // Tutup modal
                        });
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }
        });
    });
</script>

<!-- Modal NON AKtif 111 -->