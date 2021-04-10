
        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Profil</h1>
          </div>

          <?php if ($this->session->flashdata('pesan')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
            <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>

          <div class="row">
                <div class="col-sm-6">
                  <div class="card col-lg-10">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="<?=base_url('assets/img/profile/'. $user['image'])?>" class="card-img">
                      </div>
                      <div class="card-body">
                       <h4 class="card-title"><?=$user['nama']; ?></h4>
                       <hr class="sidebar-divider my-0">
                        <p class="card-text "><?=$user['email']; ?><br>
                        Anda sebagai <?=$user['level']; ?></p>
                        <a id="edit-profil" href="#" 
                        class="badge badge-success" data-toggle="modal" data-target="#edit" data-nama="<?= $user['nama']; ?>" 
                        data-email="<?=$user['email'];?>"
                        data-image="<?=$user['image'];?>">
                        <i class="fas fa-edit"></i> edit profil</a>
                      </div>
                    </div>
                  </div>
                </div>


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

<!-- end modal logout -->

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
            <div class="modal-body" id="modal-edit">
                <?= form_open_multipart('admin/myprofil/edit_aksi'); ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                        readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                        required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <div>
                        <img src="" id="image" width="80px">
                      </div>
                      <label>Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
      </div>
            </div>
    </div>
  </div>
</div>
<!-- end Modal edit-->