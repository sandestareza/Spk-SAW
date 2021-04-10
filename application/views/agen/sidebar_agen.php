<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon small">
          <img src="<?php echo base_url() ?>assets/img/pegadaian1.png" class="img-fluid" alt="Responsive image">
        </div>
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>     

        <!-- Nav Item - User logout -->
      <li class="<?php if($this->uri->segment(2)=="myprofil"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?= base_url('agen/myprofil'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>My Profil</span></a>
      </li> 

       <!-- Nav Item - penilaian -->
      <li class="<?php if($this->uri->segment(2)=="transaksi"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?= base_url('agen/transaksi'); ?>">
          <i class="fas fa-fw fa-tablet-alt"></i>
          <span>Data Transaksi Agen</span></a>
      </li> 

       <!-- Nav Item - penilaian -->
      <li class="<?php if($this->uri->segment(2)=="laporan"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?= base_url('agen/laporan'); ?>">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Laporan</span></a>
      </li> 

      <!-- Divider -->
      <hr class="sidebar-divider">   

       <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>
      <!-- Nav Item - User logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('agen/main'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            </li>

           
            <div class="topbar-divider d-none d-sm-block"></div>  
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?= $agen['nama_agen'] ?></span>
                <img class="img-profile rounded-circle" src="
                <?=base_url('assets/img/profile/'. $agen['foto'])?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

