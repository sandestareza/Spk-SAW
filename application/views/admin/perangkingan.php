 <div class="container-fluid">
    <!-- DataAlternatif -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Penilaian Alternatif</h6>
      </div>
        <div class="card-body">
        <div class="table-responsive">       
             <table class="table table-bordered table-hover">
                <thead class="table-success">
                <tr>
            <th>No</th>
            <th>Nama Agen</th>
            <th>Omset(C1)</th>
            <th>Jumlah Nasabah(C2)</th>
            <th>Pengetahuan(C3)</th>
      </tr>
        </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($nilai as $n) : ?>
        <tr>
        <td width="20px"><?= $no++; ?></td>
        <td><?= $n->nm_ag; ?></td>
        <td><?= $n->nm_sub; ?></td><!-- C1 -->
        <td><?= $n->sub; ?></td><!-- C2 -->
        <td><?= $n->nmsub; ?></td><!-- C3 -->
        </tr>  
      <?php endforeach; ?>
    </tbody>
            </table>
        </div>
        </div>
    </div>

     <!-- DataRating Kecocokan -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rating Kecocokan</h6>
      </div>
        <div class="card-body">
        <div class="table-responsive">       
             <table class="table table-bordered table-hover">
                <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Agen</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
              </tr>
                </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($rating as $row) : ?>
                <tr>
                <td width="20px"><?= $no++; ?></td>
                <td><?= $row['nm_ag']; ?></td>
                <!-- Normalisasi C1,C2,C3 ke bobot -->
                <td><?= $row['b1'];  ?></td>
                <td><?= $row['b2']; ?></td>
                <td><?= $row['b3']; ?></td>
                </tr>  
              <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>

    <!-- DataNormalisasi -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Normalisasi</h6>
      </div>
        <div class="card-body">
        <div class="table-responsive">       
             <table class="table table-bordered table-hover">
                <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Agen</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
              </tr>
                </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($rating as $row) : ?>
             <tr>
               <td width="20px"><?= $no++; ?></td>
               <td><?=$row['nm_ag']; ?></td>
               <!-- Menghitung bobot dari nilai max -->
               <td><?=$row['b1']/$c1max; ?></td>
               <td><?=$row['b2']/$c2max; ?></td>
               <td><?=$row['b3']/$c3max; ?></td>
             </tr>
              <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>

<!-- DataPerangkingan -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perangkingan</h6>
      </div>
        <div class="card-body">
        <div class="table-responsive">      
             <table class="table table-bordered table-hover">
                <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Agen</th>
                    <th>Nilai</th>
              </tr>
                </thead>
            <tbody>
              <?php
              $no = 1;
                foreach ($rating as $row) : ?>
                <tr>
                <td width="20px"><?= $no++; ?></td>
                <td width="350px"><?=$row['nm_ag'];  ?></td>
                <td width="350px"><?=($bobotc1*($row['b1']/$c1max))+($bobotc2*($row['b2']/$c2max))+($bobotc3*($row['b3']/$c3max));  ?></td>
                </tr>  
              <?php endforeach; ?>
            </tbody>
            </table>
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
