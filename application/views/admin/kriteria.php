 <div class="container-fluid">
 <!-- Data Agen -->
<div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#kriteria" data-toggle="tab">KRITERIA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#subkriteria" data-toggle="tab">SUB KRITERIA</a>
            </li>
        </div>
          
        <div class="card-body">
          <div class="tab-content">
            <!-- ahp -->
            <div class="tab-pane active" id="kriteria">
        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus fa-sm"></i> Tambah Kriteria</button>
        <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
          <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php endif; ?>
       
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Kode Kriteria</th>
            <th>Keterangan</th>
            <th>Bobot</th>
            <th>Atribut</th>
            <th style="width: 15%">Opsi</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($kriteria as $krt) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= $krt->kd_kriteria; ?></td>
        <td><?= $krt->ket; ?></td>
        <td><?= $krt->bobot; ?> </td>
        <td><?= $krt->attribut; ?></td>
        <td class="text-center">
          <a href="<?=base_url();?>admin/kriteria/edit/<?=$krt->kd_kriteria;?>"
          class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
          <a href="<?=base_url();?>admin/kriteria/hapus/<?=$krt->kd_kriteria;?>"
          class="badge badge-pill badge-danger"
          onclick="return confirm('yakin?');"><i class="fa fa-trash"></i> Hapus</a>
        </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
    </table>
              </div>
            </div>
            <!-- tempat kriteria -->
            <div class="tab-pane" id="subkriteria">
                <form method="post" action="<?=base_url() .'admin/kriteria/tambah_sub'; ?>">
                    <div class="form-group">
                      <label>Kode Kriteria</label>
                      <select name="kd_kriteria" id="kd_kriteria" class="form-control input-lg" style="width: 20%">
                        <option value="">Pilih Kriteria</option>
                        <?php foreach ($kriteria as $krt) : ?>
                        <option value="<?=$krt->kd_kriteria; ?>">
                          <?=$krt->ket; ?>[<?=$krt->kd_kriteria; ?>]</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Sub</label>
                        <input type="text" class="form-control" name="ket_sub" style="width: 55%"
                        required oninvalid="this.setCustomValidity('SubKriteria tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="number" class="form-control" name="bobot" style="width: 55%" 
                        required oninvalid="this.setCustomValidity('Bobot tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <br><hr><br>
        <div class="table-responsive">
        <table class="table table-bordered table-hover" id="data">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Kode Kriteria</th>
            <th>Ket Kriteria</th>
            <th>Ket SubKriteria</th>
            <th>Bobot</th>
            <th style="width: 30%">Opsi</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($subkriteria as $sk) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= $sk->kd_kriteria; ?></td>
        <td><?= $sk->nm_kriteria; ?></td>
        <td><?= $sk->ket_sub; ?></td>
        <td><?= $sk->bobot; ?></td>
        <td class="text-center">
          <a href="<?=base_url();?>admin/kriteria/edit_sub/<?=$sk->id_subkriteria;?>"
          class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
          <a href="<?=base_url();?>admin/kriteria/del_sub/<?=$sk->id_subkriteria;?>"
          class="badge badge-pill badge-danger"
          onclick="return confirm('yakin?');"><i class="fa fa-trash"></i> Hapus</a>
        </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
    </table>
              </div>
            </div>
            
</div>




<!-- Modal tambah kriteria-->
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
        <form method="post" action="<?=base_url() .'admin/kriteria/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label>Kode kriteria</label>
                        <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" placeholder="contoh C1..." 
                        required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">
                       
                    </div>
                    <div class="form-group">
                        <label>Keterangan kriteria</label>
                        <input type="text" class="form-control" id="ket" name="ket" 
                        required oninvalid="this.setCustomValidity('Keterangan tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="number" class="form-control" id="bobot" name="bobot" 
                        required oninvalid="this.setCustomValidity('Bobot tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Atribut</label>
                      <select name="attribut" id="attribut" class="form-control input-lg">
                        <option value="">Pilih Atribut</option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>

      </div>
    </div>
  </div>
</div>
<!-- end Modal tambah-->


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

