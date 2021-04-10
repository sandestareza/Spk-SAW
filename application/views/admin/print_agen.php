<!DOCTYPE html>
<html>
<head>
	<!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<title>Laporan</title>
</head>
<body>
	<h4><center>DATA AGEN TAHUN <?=date('Y')?><br>
	PT.PEGADAIAN (PERSERO) AREA PALEMBANG</center></h4><hr><br>
	<table class="table table-bordered table-hover">
        <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Id agen</th>
            <th>Nama agen</th>
            <th>Cabang</th>
            <th>Unit</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No.Hp</th>
        </tr>
        </thead>
    <tbody">
        <?php
        $no = 1;
        foreach ($agen as $ag) : ?>
        <tr>
            <td width="20px"><?= $no++;?></td>
            <td><img src="<?=base_url('assets/img/profile/'. $ag->foto) ?>" style="width: 50px;"></td>
            <td><?= $ag->id_agen; ?></td>
            <td><?= $ag->nama_agen; ?></td>
            <td><?= $ag->cbg_nama; ?></td>
            <td><?= $ag->unt_nama; ?></td>
            <td><?= $ag->jk; ?></td>
            <td><?= $ag->alamat; ?></td>
            <td><?= $ag->no_hp; ?></td>
        </tr>  
        <?php endforeach; ?>
    </tbody>
    </table>
    <script type="text/javascript">
    	window.print();
    </script>

</body>
</html>