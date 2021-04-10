 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">

        <?=anchor('admin/agen/tambah', '<button class="btn btn-sm btn-success mb-3">
        <i class="fa fa-plus fa-sm"></i> Tambah Agen</button>') ?>
        <a class="btn btn-sm btn-info mb-3" href="<?=base_url('admin/agen/cetak')?>" target="_blank">
        <i class="fas fa-file-pdf"></i> Print PDF</a>
        <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
          <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php endif; ?>
       
     <table id="data" class="table table-bordered table-hover">
        <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Id agen</th>
            <th>Nama agen</th>
            <th>Cabang</th>
            <th>Unit</th>
            <th style="width: 20%">Opsi</th>
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
            <td class="text-center">
                <a id="detail_agen" href="#" 
                class="badge badge-pill badge-info" data-toggle="modal" data-target="#detail"
                data-foto="<?=$ag->foto;?>"
                data-id_agen="<?= $ag->id_agen?>" 
                data-nama_agen="<?=$ag->nama_agen?>"
                data-jk="<?=$ag->jk?>"
                data-alamat="<?=$ag->alamat?>"
                data-cbg_nama="<?=$ag->cbg_nama?>"
                data-unt_nama="<?=$ag->unt_nama?>"
                data-no_hp="<?=$ag->no_hp?>"
                data-email="<?=$ag->email?>"
                data-password="<?=$ag->password?>"
                data-blokir="<?=$ag->blokir?>">
                <i class="fa fa-eye"></i> Detail</a>
                <a href="<?=base_url(); ?>admin/agen/edit/<?= $ag->id_agen; ?>" 
                class="badge badge-warning">
                <i class="fas fa-edit"></i> Ubah</a>
                <a href="<?=base_url(); ?>admin/agen/hapus/<?= $ag->id_agen; ?>"
                class="badge badge-pill badge-danger" 
                onclick="return confirm('yakin?');">
                <i class="fa fa-trash"></i> Hapus</a> 
            </td>
        </tr>  
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
</div>
</div>
</div>

</div> 

<!-- Modal detail-->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-detail">
              <table class="table">
                <tbody>
                <tr>
                    <th>Foto</th>
                    <td><img src="" id="foto" width="80px"></td>
                </tr>
                <tr>
                    <th>ID Agen</th>
                    <td>
                    <input type="text" class="form-control" id="id_agen" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Nama Agen</th>
                    <td>
                    <input type="text" class="form-control" id="nama_agen" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                    <input type="text" class="form-control" id="jk" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                    <input type="text" class="form-control" id="alamat" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td>
                    <input type="text" class="form-control" id="cabang" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td><input type="text" class="form-control" id="unit" readonly>
                    </td>
                </tr>
                <tr>
                    <th>No.Hp</th>
                    <td><input type="text" class="form-control" id="no_hp" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" class="form-control" id="email" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="text" class="form-control" id="password" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Blokir</th>
                    <td><input type="text" class="form-control" id="blokir" readonly>
                    </td>
                </tr>
                </tbody>
              </table>
            </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>
<!-- end Modal detail-->


<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika pilih ya anda akan logout, ingin batal klik cancel atau tanda kali(x)</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>