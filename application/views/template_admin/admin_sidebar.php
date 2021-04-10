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

      <!-- Nav Item - Dashboard -->
      <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?=base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Nav Item - Dashboard -->
      <li class="<?php if($this->uri->segment(2)=="kriteria"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?=base_url('admin/kriteria') ?>">
          <i class="fas fa-fw fa-file-signature"></i>
          <span>Data Kriteria</span></a>
      </li>

            <!-- Nav Item - penilaian -->
      <li class="<?php if($this->uri->segment(2)=="penilaian"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/penilaian'); ?>">
          <i class="fas fa-fw fa-file-signature"></i>
          <span>Penilaian Agen</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="<?php if($this->uri->segment(2)=="perangkingan"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?=base_url('admin/perangkingan') ?>">
          <i class="fas fa-fw fa-file-signature"></i>
          <span>Nilai / Proses SPK</span></a>
      </li>

      <!-- Nav Item - Laporan -->
      <li class="<?php if($this->uri->segment(2)=="laporan"){echo "active";}?> nav-item">
        <a class="nav-link" href="<?=base_url('admin/laporan') ?>">
          <i class="fas fa-fw fa-file-archive"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Management User
      </div>

      <!-- Nav Item - Data Menu -->      
      <li class="<?php if($this->uri->segment(2)=="cabang" || $this->uri->segment(2)=="unit" || $this->uri->segment(2)=="agen" || $this->uri->segment(2)=="user"){echo "active";}?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgen" aria-expanded="true" aria-controls="collapseAgen">
           <i class="fas fa-fw fa-folder"></i>
          <span>Master Data</span> 
        </a>
        <div id="collapseAgen" class="collapse" aria-labelledby="headingAgen" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Input</h6>
            <a class="<?php if($this->uri->segment(2)=="cabang"){echo "active";}?> collapse-item" href="<?=base_url('admin/cabang') ?>">Cabang</a>
            <a class="<?php if($this->uri->segment(2)=="unit"){echo "active";}?> collapse-item" href="<?=base_url('admin/unit') ?>">Unit</a>
            <a class="<?php if($this->uri->segment(2)=="agen"){echo "active";}?> collapse-item" href="<?=base_url('admin/agen') ?>">Agen</a>
            <a class="<?php if($this->uri->segment(2)=="user"){echo "active";}?> collapse-item" href="<?=base_url('admin/user') ?>">User</a>
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setelan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="<?php if($this->uri->segment(2)=="myprofil"){echo "active";}?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cog"></i></i>
          <span>Pengaturan Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin</h6>
            <a class="<?php if($this->uri->segment(2)=="myprofil"){echo "active";}?> collapse-item" href="<?=base_url('admin/myprofil') ?>">My Profil</a>
            <a class="collapse-item" href="<?=base_url('auth/ganti_password') ?>">
            Ganti Password</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>
      <!-- Nav Item - User logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


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
                  <?=$user['nama']; ?></span>
            
                <img class="img-profile rounded-circle" src="
                <?=base_url('assets/img/profile/'). $user['image']?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


