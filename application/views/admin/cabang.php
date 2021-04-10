 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">


        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus fa-sm"></i> Tambah Cabang</button>
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
            <th>Kode Cabang</th>
            <th>Nama Cabang</th>
    		<th style="width: 15%">Opsi</th>
    	</tr>
        </thead>
    <tbody">
    	<?php
    	$no = 1;
    	foreach ($cabang as $cbg) : ?>
        <tr>
    		<td width="20px"><?= $no++;?></td>
            <td><?= $cbg->kd_cabang; ?></td>
    		<td><?= $cbg->nama_cabang; ?></td>
            <td class="text-center">
                <a id="edit-cabang" href="#" 
                class="badge badge-warning" data-toggle="modal" data-target="#edit"
                data-kd_cabang="<?= $cbg->kd_cabang?>" 
                data-nama_cabang="<?=$cbg->nama_cabang?>">
                <i class="fas fa-edit"></i> Ubah</a>
                <a href="<?=base_url(); ?>admin/cabang/hapus/<?= $cbg->kd_cabang; ?>"
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
        <form method="post" action="<?=base_url() .'admin/cabang/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label>Kode cabang</label>
                        <input type="text" class="form-control" id="kd_cabang" name="kd_cabang"
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama cabang</label>
                        <input type="text" class="form-control" id="nama_cabang" name="nama_cabang"
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
            <div class="modal-body" id="modal-cabang">
                <?= form_open_multipart('admin/cabang/edit_aksi'); ?>
                <div class="form-group">
                        <label>Kode cabang</label>
                        <input type="text" class="form-control" id="kd_cabang" name="kd_cabang" readonly 
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama cabang</label>
                        <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" 
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