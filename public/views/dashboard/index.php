<?php
include '../../../app/_include/home_include.php';
?>
<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Dashboard</h2>
            </div>
         </div>
      </div>

      <?php if ($role_user === 'admin' || $role_user === 'super_admin') { ?>
         <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
               <div class="white_shd full">
                  <div class="full graph_head d-flex">
                     <form action="index.php" method="get">
                        <div class=" d-flex heading1 margin_0">
                           <div class="button_block mr-2">
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
                                    <option value="<?= $data['nama_cabang'] ?>"><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <button type="submit" name="approve" class="btn btn-primary icon-btn form-group mr-2"><i class="fa fa-search"></i> Cari</button>
                           <a href="index.php" class="btn btn-dark icon-btn form-group"><i class="fa fa-search"></i> REFRESH</a>
                           <div class="ml-4 d-flex">
                              <?php
                              if (isset($_GET['cabang'])) {
                                 echo "<h4><bold> DATA " . $_GET['cabang'] . "</bold></h4>";
                              } else {
                                 echo "-";
                              }
                              ?>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>

      <div class="row column1">
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-group green_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $all_data ?></p>
                     <p class="head_couter">ALL AGEN</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-laptop" style="color: green;"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $data_hybrid ?></p>
                     <p class="head_couter"><strong>HYBRID</strong></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-mobile" style="color: blue;"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $data_mec ?></p>
                     <p class="head_couter"><strong>MEC</strong></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-pencil yellow_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $data_offline ?></p>
                     <p class="head_couter"><strong>OFFLINE</strong></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-university red_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $data_kp ?></p>
                     <p class="head_couter">KCU</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2">
            <div class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-print blue1_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $printer ?></p>
                     <p class="head_couter">PRINTER</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- graph -->
      <div class="row column2 graph margin_bottom_30">
         <div class="col-md-l2 col-lg-6">
            <div class="white_shd full">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h5>AGEN JNE CABANG MEDAN</h5>
                  </div>
               </div>
               <div class="full graph_revenue">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="content d-flex">
                           <div class="area_chart">
                              <h5 class="d-flex justify-content-center align-items-center" id="dataList"></h5>
                              <canvas height="300" width="700" id="myChart"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-l2 col-lg-6">
            <div class="white_shd full">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h5>ONLINE MES 1 & MES 2</h5>
                  </div>
               </div>
               <div class="full graph_revenue">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="content d-flex">
                           <div class="area_chart">
                              <h5 class="d-flex justify-content-center align-items-center" id="dataList"></h5>
                              <canvas height="330" width="700" id="bar_chart1"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row column1 social_media_section">
         <div class="col-md-6 col-lg-3">
            <div class="full socile_icons fb margin_bottom_30">
               <div class="social_icon">
                  <h5 class="text-white p-3">USER HYBRID</h5>
               </div>
               <div class="social_cont">
                  <ul>
                     <li>
                        <span><strong class="text-danger">35</strong></span>
                        <span>On Proses</span>
                     </li>
                     <li>
                        <span><strong><?= $total_data ?></strong></span>
                        <span>Total</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="full socile_icons tw margin_bottom_30">
               <div class="social_icon">
                  <h5 class="text-white p-3">PROBLEM</h5>
               </div>
               <div class="social_cont">
                  <ul>
                     <li>
                        <span><strong class="text-danger">58</strong></span>
                        <span>On Proses</span>
                     </li>
                     <li>
                        <span><strong><?= $total_maintenance ?></strong></span>
                        <span>Total</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="full socile_icons linked margin_bottom_30">
               <div class="social_icon">
                  <h5 class="text-white p-3">REQUEST</h5>
               </div>
               <div class="social_cont">
                  <ul>
                     <li>
                        <span><strong class="text-danger">758</strong></span>
                        <span>On Proses</span>
                     </li>
                     <li>
                        <span><strong>365</strong></span>
                        <span>Total</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="full socile_icons google_p margin_bottom_30">
               <div class="social_icon">
                  <h5 class="text-white p-3">RESI CANCEL</h5>
               </div>
               <div class="social_cont">
                  <ul>
                     <li>
                        <span><strong class="text-danger">450</strong></span>
                        <span>On Proses</span>
                     </li>
                     <li>
                        <span><strong>57</strong></span>
                        <span>Total</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <!-- <div class="row column2 graph margin_bottom_30">
         <div class="col-lg-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h5>AGEN CABANG</h5>
                  </div>
               </div>
               <div class="map_section padding_infor_info">
                  <canvas id="bar_chart" width="1000" height="800"></canvas>
               </div>
            </div>
         </div>
      </div> -->
      <!-- end graph -->

   </div>
   <!-- footer -->
   <div class="container-fluid">
      <div class="footer">
         <p>Copyright © 2024 IT Dept JNE Medan.<br>
         </p>
      </div>
   </div>
</div>
<!-- end dashboard inner -->

<?php
include '../footer.php';
?>