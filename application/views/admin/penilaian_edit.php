<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/penilaian'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>

            <?php foreach ($nilai as $n) : ?>

            <form method="post" action="
            <?=base_url('admin/penilaian/edit_aksi') ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control input-lg" name="id_nilai" value="<?=$n->id_nilai?>">
                        <label>Nama Agen</label>
                        <select name="id_agen" id="id_agen" class="form-control input-lg" readonly>
                        <option value="">Pilih Nama Agen</option>
                          <?php 
                          foreach ($transaksi as $row){
                            if ($n->id_agen==$row->id_agen){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$row->id_agen' $pilih>".$row->nama_agen."</option>";              
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?=$n->tanggal; ?>">
                    </div>
                    <div class="form-group">
                        <label>Omset(C1)</label>
                        <select name="C1" id="C1" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">
                          <option value="">Pilih SubKriteria C1</option>
                          <?php 
                          foreach ($omset as $row){
                            if ($n->C1==$row->id_subkriteria){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$row->id_subkriteria'$pilih>".$row->ket_sub."</option>";                
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Nasabah(C2)</label>
                        <select name="C2" id="C2" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">>
                          <option value="">Pilih SubKriteria C2</option>
                          <?php 
                          foreach ($nasabah as $row){
                            if ($n->C2==$row->id_subkriteria){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$row->id_subkriteria'$pilih>".$row->ket_sub."</option>";                
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pengetahuan(C3)</label>
                        <select name="C3" id="C3" class="form-control input-lg"
                        required oninvalid="this.setCustomValidity('Pilih kriteria dulu!')" oninput="setCustomValidity('')">>
                          <option value="">Pilih SubKriteria C3</option>
                          <?php 
                          foreach ($tahu as $row){
                            if ($n->C3==$row->id_subkriteria){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                           echo "<option value='$row->id_subkriteria'$pilih>".$row->ket_sub."</option>";                 
                          }
                          ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
          <?php endforeach; ?>
    </div>
  </div>
</div>