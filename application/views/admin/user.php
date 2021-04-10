 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">


        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus fa-sm"></i> Tambah user</button>
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
            <th>Nama</th>
            <th>Level</th>
            <th>Blokir</th>
            <th>Image</th>
    		<th style="width: 15%">Opsi</th>
    	</tr>
        </thead>
    <tbody">
    	<?php
    	$no = 1;
    	foreach ($user as $u) : ?>
        <tr>
    		<td width="20px"><?= $no++;?></td>
            <td><?= $u->nama; ?></td>
        	<td><?= $u->level; ?></td>
            <td><?= $u->blokir; ?></td>
            <td><img src="<?=base_url('assets/img/profile/'. $u->image) ?>" style="width: 50px;"></td>
            <td class="text-center">
                <a id="detail_user" href="#" 
                class="badge badge-pill badge-info" data-toggle="modal" data-target="#detail" data-id="<?=$u->id; ?>" data-nama="<?=$u->nama; ?>" data-email="<?=$u->email; ?>" data-password="<?=$u->password; ?>" data-level="<?=$u->level; ?>" data-blokir="<?=$u->blokir; ?>" data-image="<?=$u->image; ?>"><i class="fa fa-eye"></i> Detail</a>
                <a href="<?=base_url(); ?>admin/user/hapus/<?= $u->id; ?>"
                class="badge badge-pill badge-danger" onclick="return confirm('yakin?');">
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
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" enctype="multipart/form-data" action="<?=base_url() .'admin/user/tambah_aksi'; ?>">
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" 
                        required oninvalid="this.setCustomValidity('Nama harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                        required oninvalid="this.setCustomValidity('Email harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="password" name="password"
                        required oninvalid="this.setCustomValidity('Password harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="level" name="level">
                          <option selected>--Pilih Level--</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="blokir" name="blokir">
                          <option selected>--Pilih Blokir--</option>
                            <option value="N">N</option>
                            <option value="Y">Y</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
                    </div>
            </div>
    </div>
  </div>
</div>
<!-- end Modal tambah-->

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
                    <th>Nama</th>
                    <td>
                    <input type="text" class="form-control" id="nama" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                    <input type="text" class="form-control" id="email" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                    <input type="text" class="form-control" id="password" readonly>
                    </td>
                </tr>
                <tr>
                    <th>level</th>
                    <td>
                    <input type="text" class="form-control" id="level" readonly>
                    </td>
                </tr>
                <tr>
                    <th>blokir</th>
                    <td>
                    <input type="text" class="form-control" id="blokir" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="" id="image" width="80px"></td>
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

