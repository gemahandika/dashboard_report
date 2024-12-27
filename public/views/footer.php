<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<!-- jQuery -->
<script src="../../../app/assets/js/jquery.min.js"></script>
<script src="../../../app/assets/js/popper.min.js"></script>
<script src="../../../app/assets/js/bootstrap.min.js"></script>

<!-- Pustaka Tambahan -->
<script src="../../../app/assets/js/animate.js"></script>
<script src="../../../app/assets/js/bootstrap-select.js"></script>
<script src="../../../app/assets/js/owl.carousel.js"></script>
<script src="../../../app/assets/js/Chart.min.js"></script>
<script src="../../../app/assets/js/perfect-scrollbar.min.js"></script>

<!-- Inisialisasi Perfect Scrollbar -->
<script>
  var ps = new PerfectScrollbar('#sidebar');
</script>

<!-- Inisialisasi DataTable -->
<script>
  new DataTable('#example');



  new DataTable('#example1', {
    paging: false,
    scrollCollapse: true,
    scrollY: '300px'
  });
</script>

<!-- Pengaturan Data Chart -->
<script>
  var chartData = <?php echo json_encode($data_chart); ?>;
  console.log(chartData); // Debugging

  var labels = ['MES 1', 'MES 2'];
  var hybridData = [chartData.MES10000.hybrid, chartData.Non_MES10000.hybrid];
  var mecData = [chartData.MES10000.mec, chartData.Non_MES10000.mec];
  var offlineData = [chartData.MES10000.offline, chartData.Non_MES10000.offline];

  // Chart Bar 1
  var ctx1 = document.getElementById('bar_chart1').getContext('2d');
  var barChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
          label: 'HYBRID',
          data: hybridData,
          backgroundColor: 'rgba(75, 192, 75, 0.6)',
          borderColor: 'rgba(75, 192, 75, 1)',
          borderWidth: 1
        },
        {
          label: 'MEC',
          data: mecData,
          backgroundColor: 'rgba(54, 162, 235, 0.4)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'OFFLINE',
          data: offlineData,
          backgroundColor: 'rgba(255, 99, 132, 0.6)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        title: {
          display: true,
          text: 'Jumlah Data per Cabang'
        },
        legend: {
          position: 'top'
        }
      }
    }
  });

  // Chart Pie
  var xValues = ["HYBRID", "MEC", "OFFLINE"];
  var yValues = <?php echo $data_json; ?>;
  var barColors = ["green", "blue", "red", "orange", "brown"];

  new Chart("myChart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
      }
    }
  });

  // Menampilkan Daftar Data
  var dataList = document.getElementById('dataList');
  dataList.style.display = 'flex';
  dataList.style.gap = '20px';
  dataList.style.flexWrap = 'wrap';

  xValues.forEach((label, index) => {
    var listItem = document.createElement('span');
    listItem.textContent = `${label}: ${yValues[index]}`;
    listItem.style.color = barColors[index];
    listItem.style.fontSize = '14px';
    listItem.style.fontWeight = 'bold';
    dataList.appendChild(listItem);
  });

  // Membuat Chart menggunakan Chart.js
  var ctx = document.getElementById('bar_chart').getContext('2d');
  var barChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: cabangData, // Label adalah nama cabang
      datasets: [{
          label: 'Hybrid',
          data: hybridData, // Data untuk Hybrid
          backgroundColor: 'rgba(75, 192, 75, 0.6)', // Hijau lembut
          borderColor: 'rgba(75, 192, 75, 1)',
          borderWidth: 1
        },
        {
          label: 'MEC',
          data: mecData, // Data untuk MEC
          backgroundColor: 'rgba(54, 162, 235, 0.4)', // Biru lembut
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'Offline',
          data: offlineData, // Data untuk Offline
          backgroundColor: 'rgba(255, 99, 132, 0.6)', // Kuning lembut
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          beginAtZero: true,
          ticks: {
            maxRotation: 0, // Tidak memutar label
            font: {
              size: 12 // Ukuran font label lebih besar dan mudah terbaca
            }
          }
        },
        y: {
          beginAtZero: true,
          ticks: {
            font: {
              size: 12 // Ukuran font sumbu Y
            }
          }
        }
      },
      plugins: {
        title: {
          display: true,
          text: 'Jumlah Data per Cabang (Hybrid, MEC, Offline)',
          font: {
            size: 18 // Ukuran font judul lebih besar
          }
        },
        legend: {
          labels: {
            font: {
              size: 14 // Ukuran font legend
            }
          }
        }
      }
    }
  });
</script>

<!-- Skrip Kustom -->
<script src="../../../app/assets/js/chart_custom_style1.js"></script>
<script src="../../../app/assets/js/custom.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>