<?php
include '../../../app/config/koneksi.php';
?>
<html>

<head>
    <title>Download</title>
    <link rel="shortcut icon" href="../../../app/assets/img/LOGO1.png">
    <link rel="stylesheet" href="../../../app/assets/css/style_export.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Data Maintenance</h2>
        <div class="data-tables datatable-dark">
            <table id="mauexport" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM maintenance ") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                        $no++;
                    ?>
                        <tr>
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
                        <?php } ?>
                        </tr>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>