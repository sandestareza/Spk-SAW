 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">


        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus fa-sm"></i> Tambah Unit</button>
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
            <th>Kode/Nama Cabang</th>
            <th>Kode Unit</th>
            <th>Nama Unit</th>
            <th style="width: 15%">Opsi</th>
        </tr>
        </thead>
    <tbody">
        <?php
        $no = 1;
        foreach ($unit as $u) : ?>
        <tr>
            <td width="20px"><?= $no++;?></td>
            <td>[<?= $u->kd_cabang; ?>]: <?= $u->cbg_nama; ?></td>
            <td><?= $u->kd_unit; ?></td>
            <td><?= $u->nama_unit; ?></td>
            <td class="text-center">
                <a id="edit-unit" href="#" 
                class="badge badge-warning" data-toggle="modal" data-target="#edit"
                data-kd_unit="<?= $u->kd_unit?>" 
                data-kd_cabang="<?= $u->kd_cabang?>" 
                data-nama_unit="<?=$u->nama_unit?>">
                <i class="fas fa-edit"></i> Ubah</a>
                <a href="<?=base_url(); ?>admin/unit/hapus/<?= $u->kd_unit; ?>"
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

<!-- Modal tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url() .'admin/unit/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label>Kode unit</label>
                        <input type="text" class="form-control" id="kd_unit" name="kd_unit"
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Kode cabang</label>
                        <input type="text" class="form-control" id="kd_cabang" name="kd_cabang"
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama unit</label>
                        <input type="text" class="form-control" id="nama_unit" name="nama_unit"
                        required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>

      </div>
    </div>
  </div>
</div>
<!-- end Modal tambah-->

<!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-unit">
                <?= form_open_multipart('admin/unit/edit_aksi'); ?>
                <div class="form-group">
                        <label>Kode unit</label>
                        <input type="text" class="form-control" id="kd_unit" name="kd_unit" readonly 
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Kode cabang</label>
                        <input type="text" class="form-control" id="kd_cabang" name="kd_cabang"
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama unit</label>
                        <input type="text" class="form-control" id="nama_unit" name="nama_unit" 
                        required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
      </div>
            </div>
    </div>
  </div>
</div>
<!-- end Modal edit-->

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