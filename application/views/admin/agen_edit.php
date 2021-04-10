<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/agen'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <p class="text-center text-primary font-weight-bold">AKUN AGEN</p>
            <?php foreach($agen as $ag)  : ?>
            <?= form_open_multipart('admin/agen/edit_aksi'); ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="email" name="email"
                  value="<?=$ag->email; ?>">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" id="password" name="password"
                  value="<?=$ag->password; ?>">
               </div>
               <div class="form-group">
                  <label>Blokir</label>
                  <select name="blokir" id="blokir" class="form-control input-lg">
                  <option value="<?=$ag->blokir; ?>"><?=$ag->blokir; ?></option>
                  <option value="N">Tidak</option>
                  <option value="Y">Ya</option>
                </select>
               </div>
               <hr>
               <p class="text-center text-primary font-weight-bold">BIODATA AGEN</p>
                <div class="form-group">
                        <label>Id Agen</label>
                        <input type="number" class="form-control" id="id_agen" name="id_agen" value="<?=$ag->id_agen; ?>" required oninvalid="this.setCustomValidity('ID tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama Agen</label>
                        <input type="text" class="form-control" id="nama_agen" name="nama_agen" value="<?=$ag->nama_agen; ?>" 
                        required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control input-lg">
                          <option selected="<?=$ag->jk; ?>"><?=$ag->jk; ?></option>
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                        value="<?=$ag->alamat; ?>"required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Cabang</label>
                      <select name="cabang" id="cabang" class="form-control input-lg"> 
                        <option value=""
                        required oninvalid="this.setCustomValidity('Cabang tidak boleh kosong!')" oninput="setCustomValidity('')">Pilih Cabang</option>
                        <?php foreach ($cabang as $row) {
                          echo '<option value="'.$row->kd_cabang.'">['.$row->kd_cabang.']: '.$row->nama_cabang.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Unit</label>
                      <select name="unit" id="unit" class="form-control input-lg">
                        <option value=""
                        required oninvalid="this.setCustomValidity('Unit tidak boleh kosong!')" oninput="setCustomValidity('')">Pilih Unit</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?=$ag->no_hp; ?>" 
                        required oninvalid="this.setCustomValidity('No.Hp tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <div>
                        <img src="<?=base_url("assets/img/profile/").$ag->foto; ?>" id="foto" width="80px">
                      </div>
                        <label>Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="<?=$ag->foto; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>