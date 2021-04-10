

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

    <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<!-- script untuk table searching -->
<script>
$(document).ready(function () {
$('#data').DataTable();
$('.dataTables_length').addClass('bs-select');
});
  </script>
<script>
$(document).ready(function () {
$('#data-agen').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
<!-- scrip untuk show password -->
  <script>
    $(document).ready(function(){
      $('#checkbox').click(function(){
        if($(this).is(':checked')){
          $('#password').attr('type','text');
        } else {
          $('#password').attr('type','password');
        }
      })
    })

  </script>

  <!-- scrip untuk show ganti password -->
  <script>
    $(document).ready(function(){
      $('#checkbox_pass').click(function(){
        if($(this).is(':checked')){
          $('#pass_new').attr('type','text');
        } else {
          $('#pass_new').attr('type','password');
        }
      })
    })

  </script>
  <!-- modal detail pengguna -->
  <script>
    $(document).on("click","#detail_user", function(){
      var nama   = $(this).data('nama');
      var email  = $(this).data('email');
      var password  = $(this).data('password');
      var level  = $(this).data('level');
      var blokir  = $(this).data('blokir');
      var img  = $(this).data('image');

      $("#modal-detail #nama").val(nama);
      $("#modal-detail #email").val(email);
      $("#modal-detail #password").val(password);
      $("#modal-detail #level").val(level);
      $("#modal-detail #blokir").val(blokir);
      $("#modal-detail #image").attr("src", "<?=base_url(); ?>assets/img/profile/" +img);
    })

  </script>
<!-- modal detail agen -->
<script>
    $(document).on("click","#detail_agen", function(){
      var img  = $(this).data('foto');
      var id_agen   = $(this).data('id_agen');
      var nama_agen  = $(this).data('nama_agen');
      var jk  = $(this).data('jk');
      var alamat  = $(this).data('alamat');
      var cabang  = $(this).data('cbg_nama');
      var unit  = $(this).data('unt_nama');
      var no_hp  = $(this).data('no_hp');
      var email  = $(this).data('email');
      var password  = $(this).data('password');
      var blokir  = $(this).data('blokir');

      $("#modal-detail #foto").attr("src", "<?=base_url(); ?>assets/img/profile/" +img);
      $("#modal-detail #id_agen").val(id_agen);
      $("#modal-detail #nama_agen").val(nama_agen);
      $("#modal-detail #jk").val(jk);
      $("#modal-detail #alamat").val(alamat);
      $("#modal-detail #cabang").val(cabang);
      $("#modal-detail #unit").val(unit);
      $("#modal-detail #no_hp").val(no_hp);
      $("#modal-detail #email").val(email);
      $("#modal-detail #password").val(password);
      $("#modal-detail #blokir").val(blokir);
      
    })

  </script>

<!-- modal edit profil -->
  <script>
    $(document).on("click","#edit-profil", function(){
      var nama   = $(this).data('nama');
      var email  = $(this).data('email');
      var img     = $(this).data('image');

      $("#modal-edit #nama").val(nama);
      $("#modal-edit #email").val(email);
      $("#modal-edit #image").attr("src", "<?=base_url(); ?>assets/img/profile/" +img);
    })  
  </script>

  <!-- modal edit agen profil -->
  <script>
    $(document).on("click","#edit-agen", function(){
      var nama_agen   = $(this).data('nama_agen');
      var email  = $(this).data('email');
      var id_agen = $(this).data('id_agen');
      var jk     = $(this).data('jk');
      var alamat     = $(this).data('alamat');
      var no_hp     = $(this).data('no_hp');
      var foto     = $(this).data('foto');

      $("#modal-agen #nama_agen").val(nama_agen);
      $("#modal-agen #email").val(email);
      $("#modal-agen #id_agen").val(id_agen);
      $("#modal-agen #jk").val(jk);
      $("#modal-agen #alamat").val(alamat);
      $("#modal-agen #no_hp").val(no_hp);
      $("#modal-agen #foto").attr("src", "<?=base_url(); ?>assets/img/profile/" +foto);
    })  
  </script>

  <!-- modal edit cabang -->
  <script>
    $(document).on("click","#edit-cabang", function(){
      var kd_cabang   = $(this).data('kd_cabang');
      var nama_cabang  = $(this).data('nama_cabang');

      $("#modal-cabang #kd_cabang").val(kd_cabang);
      $("#modal-cabang #nama_cabang").val(nama_cabang);
    })  
  </script>

   <!-- modal edit unit -->
  <script>
    $(document).on("click","#edit-unit", function(){
      var kd_unit   = $(this).data('kd_unit');
      var kd_cabang   = $(this).data('kd_cabang');
      var nama_unit  = $(this).data('nama_unit');

      $("#modal-unit #kd_unit").val(kd_unit);
      $("#modal-unit #kd_cabang").val(kd_cabang);
      $("#modal-unit #nama_unit").val(nama_unit);
    })  
  </script>

  <!-- modal edit transaksi -->
  <script>
    $(document).on("click","#edit_trs", function(){
      var id_transaksi        = $(this).data('id_transaksi');
      var tanggal   = $(this).data('tanggal');
      var omset   = $(this).data('omset');
      var j_nasabah  = $(this).data('j_nasabah');

      $("#modal-trs #id_transaksi").val(id_transaksi);
      $("#modal-trs #tanggal").val(tanggal);
      $("#modal-trs #omset").val(omset);
      $("#modal-trs #j_nasabah").val(j_nasabah);
    })  
  </script>

  <!-- combobox cabang+unit pada tambah agen-->
  <script>
    $(document).ready(function(){
      $('#cabang').change(function(){
        var kd_cabang = $('#cabang').val();
        if(kd_cabang != '')
        {
           $.ajax({
              url:"<?=base_url();?>admin/agen/fetch_unit",
              method:"POST",
              data:{kd_cabang:kd_cabang},
              success:function(data)
              {
                $('#unit').html(data);
              }
           })
        }
      })
    })
  </script>
  
  

</body>

</html>
