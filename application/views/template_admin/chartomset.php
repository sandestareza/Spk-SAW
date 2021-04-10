<!-- Mengisi data Grafik -->
 <?php
  $cabang="";
  $total=null;
    foreach ($transaksi as $row) { 
            /*perhitungan rangking*/
    $nama_cabang=$row->cbg_nama;
    $cabang.="'$nama_cabang'".", ";
    $hasil=$row->omset;
    $total.="$hasil".", ";
    
  }?>

  <script>
    // Bar Chart Example
var ctx = document.getElementById("myBarOmset");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?=$cabang; ?>],
    datasets: [{
      label: "Omset",
      backgroundColor: "rgba(255, 99, 132, 1)",
      hoverBackgroundColor: "rgba(255, 99, 132, 1)",
      borderColor: "#4e73df",
      data: [<?=$total;?>],
    }],
  },
  options: {
    maintainAspectRatio: true,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 100
      }
    },
    scales: {
      xAxes: [{
        time: {
          max: '<?=$total;?>'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 20
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 15,
          padding: 10,
          // Include a dollar sign in the ticks
/*          callback: function(value, index, values) {
            return '$' + number_format(value);
          }*/
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
})
  </script>
  
