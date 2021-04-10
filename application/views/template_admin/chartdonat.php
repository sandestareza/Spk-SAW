<!-- Mengisi data Grafik -->
<?php
  $cabang="";
  $total=null;
    foreach ($agen as $row) 
    { 
            /*perhitungan rangking*/
    $cabang_agen=$row->cbg_nama;
    $cabang.="'$cabang_agen'".", ";
    $hasil=$row->total;
    $total.="$hasil".", ";
    
    }
?>

  <script>
    // Bar Chart Example

  var ctx = document.getElementById("doughnutchart").getContext('2d');
  var data = {
            labels: [<?=$cabang; ?>],
            datasets: [
            {
              label: "Jumlah Agen per Cabang",
              data: [<?=$total; ?>],
              backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ]
            }
            ]
            };
 
  var mydoughnutchart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                  tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                    },
                  Legend: {
                    position: 'bottom',
                  },
                  cutoutPercentage: 65,
                  animation: {
                    animateScale: true,
                    animateRotate: true
                  }
                }
              });
  </script>
  
