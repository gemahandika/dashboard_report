


console.log(chartData); // Debugging

// Data untuk chart
var labels = ['MES 1', 'MES 2']; // Label sumbu X
var hybridData = [chartData.MES10000.hybrid, chartData.Non_MES10000.hybrid];
var mecData = [chartData.MES10000.mec, chartData.Non_MES10000.mec];
var offlineData = [chartData.MES10000.offline, chartData.Non_MES10000.offline];

// Membuat chart bar
var ctx = document.getElementById('bar_chart1').getContext('2d');
var barChart = new Chart(ctx, {
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

// ================================================================================
  // Data dari PHP diubah menjadi JavaScript


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