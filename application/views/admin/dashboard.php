
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="alert alert-success" role="alert">
          <h5><center>Selamat Datang <?=$user['nama'];?> anda Login sebagai <?=$user['level'];?></center></h5> 
        </div>


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Data Agen -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Agen/Alternatif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$bykagen; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                    <a href="<?=base_url('admin/agen');?>" class="badge badge-success">Lihat detail</a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Data Kriteria -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Kriteria</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$bykkriteria; ?> Kriteria</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                    <a href="<?=base_url('admin/kriteria');?>" class="badge badge-success">Lihat detail</a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Data Kriteria -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi Agen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp.<?=number_format($tot_transaksi,0,'.','.'); ?>,-</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-wave-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                    <a href="<?=base_url('admin/penilaian');?>" class="badge badge-success">Lihat detail</a>
              </div>
            </div>

           
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Nasabah Agen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$tot_nasabah; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                  <a href="<?=base_url('admin/penilaian');?>" class="badge badge-success">Lihat detail</a>
              </div>
            </div>
          </div>        
        </div>
          <hr>
          <br>

      <div class="row">
            <!-- Bar Chart -->
            <div class="col-xl-7 col-lg-6 ml-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rangking Agen</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBar"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- donat Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Agen per Cabang</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="doughnutchart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <div class="row">
            <!-- Bar Chart -->
            <div class="col-xl-9 col-lg-8 ml-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Omset per Cabang</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar mb-4">
                    <canvas id="myBarOmset"></canvas>
                  </div>
                </div>
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
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

<!-- end modal logout -->

  