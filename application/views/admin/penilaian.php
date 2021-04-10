 <div class="container-fluid">
 <!-- Data Agen -->
<div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#agen" data-toggle="tab">DATA TRANSAKSI AGEN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nilai" data-toggle="tab">PENILAIAN AGEN</a>
            </li>
        </div>
        
        <div class="card-body">
          <div class="tab-content">
            <!-- DATA AGEN -->
            <div class="tab-pane active" id="agen">
        <button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#modalprint">
        <i class="fas fa-print"></i> Print PDF</button>
        <div class="table-responsive">
        <table id="data-agen" class="table table-bordered table-hover">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>ID Agen</th>
            <th>Nama</th>
            <th>Omset</th>
            <th>Jumlah Nasabah</th>
            <th style="width: 15%">Opsi</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($transaksi as $trs) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= date('d-m-Y',strtotime($trs->tanggal)); ?></td>
        <td><?= $trs->id_agen; ?></td>
        <td><?= $trs->nama_agen; ?></td>
        <td>Rp.<?= number_format($trs->omset,0,'.','.'); ?>,-</td>
        <td><?= $trs->j_nasabah; ?></td>
        <td class="text-center">
          <a id="detail_agen" href="#"
          class="badge badge-pill badge-info" data-toggle="modal" data-target="#exampleModal"
          data-foto="<?=$trs->foto;?>"
                data-id_agen="<?= $trs->id_agen?>" 
                data-nama_agen="<?=$trs->nama_agen?>"
                data-jk="<?=$trs->jk?>"
                data-alamat="<?=$trs->alamat?>"
                data-cbg_nama="<?=$trs->cbg_nama?>"
                data-unt_nama="<?=$trs->unt_nama?>"
                data-no_hp="<?=$trs->no_hp?>"
                data-email="<?=$trs->email?>">
                <i class="fa fa-eye"></i> Detail</a>
        </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
    </table>
              </div>
            </div>
            <!-- tempat kriteria -->
            <div class="tab-pane" id="nilai">
            <?php if ($this->session->flashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
              <strong>penilaian</strong> <?= $this->session->flashdata('pesan'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
            <form method="post" action="<?=base_url() .'admin/penilaian/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label for="date">Tanggal Hari Ini</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Agen</label>
                        <select name="id_agen" id="id_agen" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih Nama agen dulu!')" oninput="setCustomValidity('')">
                          <option value="">Pilih Nama Agen</option>
                          <?php foreach ($transaksi as $trs) : ?>
                          <option value="<?=$trs->id_agen; ?>">[<?=$trs->id_agen; ?>]-<?=$trs->nama_agen; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Omset(C1)</label>
                        <select name="C1" id="C1" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">
                          <option value="">Pilih SubKriteria C1</option>
                        <?php foreach ($omset as $row ) : ?>
                          <option value="<?=$row['id_subkriteria']; ?>"><?=$row['ket_sub']; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Nasabah(C2)</label>
                        <select name="C2" id="C2" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">>
                          <option value="">Pilih SubKriteria C2</option>
                          <?php foreach ($nasabah as $row ) : ?>
                          <option value="<?=$row['id_subkriteria']; ?>"><?=$row['ket_sub']; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pengetahuan(C3)</label>
                        <select name="C3" id="C3" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">>
                          <option value="">Pilih SubKriteria C3</option>
                          <?php foreach ($tahu as $row ) : ?>
                          <option value="<?=$row['id_subkriteria']; ?>"><?=$row['ket_sub']; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                <br><br><hr><br>
            <div class="table-responsive">
        <table id="data" class="table table-bordered table-hover">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Agen</th>
            <th>Omset(C1)</th>
            <th>Jumlah Nasabah(C2)</th>
            <th>Pengetahuan(C3)</th>
            <th style="width: 15%">Opsi</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($nilai as $n) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= date('d-m-Y',strtotime($n->tanggal)); ?></td>
        <td><?= $n->nm_ag; ?></td>
        <td><?= $n->nm_sub; ?></td><!-- C1 -->
        <td><?= $n->sub; ?></td><!-- C2 -->
        <td><?= $n->nmsub; ?></td><!-- C3 -->
        <td class="text-center">
          <a href="<?=base_url();?>admin/penilaian/edit/<?=$n->id_nilai; ?>"
          class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Ubah</a>
          <a href="<?=base_url();?>admin/penilaian/hapus/<?=$n->id_nilai;?>"
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

<!-- Modal detail-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Agen</h5>
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
                </tbody>
              </table>
            </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal prin-->
<div class="modal fade" id="modalprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalprint">Cetak Data Transaksi Agen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
              <form method="POST" target="_blank" action="<?=base_url('admin/penilaian/cetak/')?>">
              <table class="table">
                <tbody>
                <tr>
                    <th>Dari Tanggal</th>
                    <td>
                      <input type="date" class="form-control" name="dari"
                      required oninvalid="this.setCustomValidity('Tanggal harus diisi dulu!')" oninput="setCustomValidity('')">
                    </td>
                </tr>
                <tr>
                    <th>Sampai Tanggal</th>
                    <td>
                    <input type="date" class="form-control" name="sampai"
                    required oninvalid="this.setCustomValidity('Tanggal harus diisi dulu!')" oninput="setCustomValidity('')">
                    </td>
                </tr>
                <tr><th><td>
                <button type="submin" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak</button>
                </td></th></tr>
              </tbody>
            </table>
            </form>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>