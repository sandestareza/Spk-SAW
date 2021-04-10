
        <!-- Begin Page Content -->
        <div class="container-fluid">

    <!-- DataPerangkingan -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?=$title;?></h6>
      </div>
        <div class="card-body">
      <br>
      <form method="POST" action="<?= base_url('agen/laporan') ?>">
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">
            <?= form_error('dari', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">
            <?= form_error('sampai', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
            <button type="submit" class="btn btn-sm btn-primary">
            <i class="fas fa-eye"></i> Tampilkan</button>
      </form>
      <hr>
        <div class="table-responsive">       
             <table id="data" class="table table-bordered table-hover">
                <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama Agen</th>
                    <th>Nilai</th>
                    <th>Reward</th>
              </tr>
                </thead>
            <tbody>
              <?php
              $no = 1;
                foreach ($laporan as $row) : ?>
                <tr>
                <td width="20px"><?= $no++; ?></td>
                <td width="100px">
                  <?= date('d-m-Y',strtotime($row['tanggal'])); ?>
                </td>
                <td width="350px"><?=$row['nm_ag'];  ?></td>
                <td width="350px"><?=$hasil=($bobotc1*($row['b1']/$c1max))+($bobotc2*($row['b2']/$c2max))+($bobotc3*($row['b3']/$c3max));  ?></td>
                <td width="350px">
                  <?php
                    if($hasil>=10){
                      echo "Tabungan Emas Rp.10.000.000";
                    } else{
                      echo "Tidak Ada";
                    }

                  ?>
                </td>
                </tr>  
              <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;<?=date('Y');?> Sandesta Reza </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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