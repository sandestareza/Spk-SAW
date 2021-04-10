<!DOCTYPE html>
<html>
<head>
	<!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<title>Cetak Laporan</title>
</head>
<body>
	<h4><center>LAPORAN REWARD AGEN TAHUN <?= date('Y',strtotime($_GET['dari'])); ?><br>
	PT.PEGADAIAN (PERSERO) AREA PALEMBANG
  <h6>Tanggal:<?= date('d-M-Y',strtotime($_GET['dari'])); ?> 
      s/d 
      <?= date('d-M-Y',strtotime($_GET['sampai'])); ?>
  </h6>
  </center></h4><hr><br>
	<table class="table table-bordered">
        <thead class="table-primary">
                <tr>
                    <th>Nama Agen</th>
                    <th>Nilai</th>
                    <th>Reward</th>
              </tr>
                </thead>
            <tbody>
              <?php
                foreach ($laporan as $row) : ?>
                <tr>
                <td width="350px"><?=$row['nm_ag'];  ?></td>
                <td width="350px"><?=$hasil=($bobotc1*($row['b1']/$c1max))+($bobotc2*($row['b2']/$c2max))+($bobotc3*($row['b3']/$c3max));  ?></td>
                <td width="350px">
                  <?php
                    if($hasil>=10){
                      echo "Tabungan Emas Rp.10.000.000";
                    } else{
                      echo "Tidak Ada";
                    }

                  ?>
                </td>
                </tr>  
              <?php endforeach; ?>
            </tbody>
            </table>
    <script type="text/javascript">
    	window.print();
    </script>

</body>
</html>