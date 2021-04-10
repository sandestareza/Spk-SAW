<nav class="navbar navbar-dark bg-success text-white">
  <a class="navbar-brand">SPK REWARD AGEN PADA PT PEGADAIAN (PERSERO) AREA PALEMBANG</a>
  <span><i class="fas fas fa-calendar-alt"> <?=date('D, d-M-Y'); ?></i>
  </span>
  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#login">
  <span>Login</span></a>
</nav>
<!-- menu -->
<!-- pesan untuk login -->
                 <?= $this->session->flashdata('pesan'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Beranda</a>
      </li>
    </ul>
  </div>
</nav>
<!-- slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url('assets/img/slider/slider1.jpg')?>" class="d-block w-100" alt="Responsive image">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('assets/img/slider/slider2.jpg')?>" class="d-block w-100" alt="Responsive image">
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('assets/img/slider/slider3.jpg')?>" class="d-block w-100" alt="Responsive image">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br><br><br><br><br>
<center><span class=" text text-black">Copyright &copy;<?=date('Y');?> Sandesta Reza</span></center>

<!-- modal login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-login">
              <form method="post" action="<?=base_url('agen/main/proses_login'); ?>" class="agen">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Mauskan email anda..." autofocus required oninvalid="this.setCustomValidity('Email tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                    <input type="checkbox" id="checkbox"> Show password
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Login
                    </button> 
                  </form>                 
            </div>
            </div>
    </div>
  </div>
</div>