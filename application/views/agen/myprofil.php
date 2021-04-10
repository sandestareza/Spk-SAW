
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Data Omset -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Omset Anda</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                       Rp.<?=number_format($omset,0,'.','.'); ?>,-</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-wave-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Data Nasabah -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Nasabah Anda</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$nasabah;?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr>
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
                        <img src="<?=base_url('assets/img/profile/'. $agen['foto'])?>" class="card-img">
                      </div>
                      <div class="card-body">
                       <h4 class="card-title"><?=$agen['nama_agen']; ?></h4>
                       <hr class="sidebar-divider my-0">
                        <p class="card-text ">ID: <?=$agen['id_agen']; ?><br>
                        Jenis Kelamin: <?=$agen['jk']; ?><br>
                        Alamat: <?=$agen['alamat']; ?><br>
                        No.Hp: <?=$agen['no_hp']; ?></p><br>
                        <a id="edit-agen" href="#" 
                        class="badge badge-success" data-toggle="modal" data-target="#edit" 
                        data-nama_agen="<?= $agen['nama_agen']; ?>" 
                        data-id_agen="<?=$agen['id_agen'];?>"
                        data-jk="<?=$agen['jk'];?>"
                        data-email="<?=$agen['email'];?>"
                        data-alamat="<?=$agen['alamat'];?>"
                        data-no_hp="<?=$agen['no_hp'];?>"
                        data-foto="<?=$agen['foto'];?>">
                        <i class="fas fa-edit"></i> edit profil</a>
                        <a id="edit-agen" href="#" 
                        class="badge badge-warning" data-toggle="modal" data-target="#password">
                        <i class="fas fa-lock"></i> Ganti Password</a>
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
          <a class="btn btn-primary" href="<?= base_url('agen/main'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

<!-- end modal logout -->

<!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-agen">
                <?= form_open_multipart('agen/myprofil/edit_aksi'); ?>
                    <div class="form-group">
                        <label>ID Agen</label>
                        <input type="text" class="form-control" id="id_agen" name="id_agen" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama_agen" name="nama_agen"
                        required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control input-lg">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                        required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                        required oninvalid="this.setCustomValidity('No.Hp tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <div>
                        <img src="" id="foto" width="80px">
                      </div>
                      <label>Foto</label>
                      <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
      </div>
            </div>
    </div>
  </div>
</div>
<!-- end Modal edit-->

<!-- Modal ganti password-->
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-password">
              <form method="post" action="<?=base_url('agen/login_agen/proses_ganti'); ?>" class="user">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="pass_new" name="pass_new" placeholder="Masukan password baru"
                      required oninvalid="this.setCustomValidity('Password baru tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="ulang_pass" name="ulang_pass" placeholder="Ulangi password"
                     required oninvalid="this.setCustomValidity('Ulangi password tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                  
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Ganti Password
                    </button>                    
                  </form>       
            </div>
            </div>
    </div>
  </div>
</div>
