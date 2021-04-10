 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input <?= $title; ?></h6>
            </div>
              <div class="card-body">
              <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"> Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <?php endif; ?>
                <form method="post" action="<?=base_url() .'agen/transaksi/tambah_aksi'; ?>">
                    <div class="form-group">
                        <label for="date">Tanggal Hari Ini</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                        <label>Total Omset</label>
                        <input type="number" class="form-control" id="omset" name="omset" value="">
                        <?= form_error('omset', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Nasabah</label>
                        <input type="number" class="form-control" id="j_nasabah" name="j_nasabah">
                        <?= form_error('j_nasabah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                <br><br><hr><br>
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                <br>
                <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                <thead class="table-success">
              <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Omset Agen</th>
                    <th>Jumlah Nasabah Agen</th>
                <th style="width: 15%">Opsi</th>
              </tr>
                </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($transaksi as $trs) : ?>
                <tr>
                <td width="20px"><?= $no++;?></td>
                    <td><?= date('d-m-Y',strtotime($trs->tanggal)); ?></td>
                    <td>Rp.<?= number_format($trs->omset,0,',','.'); ?>,-</td>
                    <td><?= $trs->j_nasabah; ?></td>
                    <td class="text-center">
                        <a id="edit_trs" href="#" data-toggle="modal" data-target="#edit"
                        data-id_transaksi="<?=$trs->id_transaksi; ?>"
                        data-tanggal="<?= $trs->tanggal;?>" 
                        data-omset="<?=$trs->omset;?>"
                        data-j_nasabah="<?=$trs->j_nasabah;?>"
                        class="badge badge-warning">
                        <i class="fas fa-edit"></i> Ubah</a>
                        <a href="<?=base_url(); ?>agen/transaksi/hapus/<?=$trs->id_transaksi;?>"
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

<!-- modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-trs">
                <?= form_open_multipart('agen/transaksi/edit_aksi'); ?>
                <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="hidden" name="id_transaksi" id="id_transaksi">
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Total Omset</label>
                        <input type="number" class="form-control" id="omset" name="omset"
                        required oninvalid="this.setCustomValidity('Omset tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Nasabah</label>
                        <input type="number" class="form-control" id="j_nasabah" name="j_nasabah" 
                        required oninvalid="this.setCustomValidity('Jumalah nasabah tidak boleh kosong!')" oninput="setCustomValidity('')">
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
          <a class="btn btn-primary" href="<?= base_url('agen/main'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>