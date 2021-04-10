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
	<h4><center>LAPORAN TRANSAKSI AGEN TAHUN <?= date('Y',strtotime($_POST['dari'])); ?><br>
	PT.PEGADAIAN (PERSERO) AREA PALEMBANG
  <h6>Tanggal:<?= date('d-M-Y',strtotime($_POST['dari'])); ?> 
      s/d 
      <?= date('d-M-Y',strtotime($_POST['sampai'])); ?>
  </h6>
  </center></h4><hr><br>
	<table id="data-agen" class="table table-bordered table-hover">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>ID Agen</th>
            <th>Nama</th>
            <th>Omset</th>
            <th>Jumlah Nasabah</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($laporan as $row) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= date('d F Y',strtotime($row->tanggal)); ?></td>
        <td><?= $row->id_agen; ?></td>
        <td><?= $row->nm_ag; ?></td>
        <td>Rp.<?= number_format($row->omset,0,'.','.'); ?>,-</td>
        <td><?= $row->j_nasabah; ?></td>
        </tr> 
      <?php endforeach; ?>
    </tbody>
    </table>
    <script type="text/javascript">
    	window.print();
    </script>

</body>
</html>