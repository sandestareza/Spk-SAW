<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
       	<div class="card-body">
       		<a href="<?=base_url('admin/agen'); ?>" class="badge badge-danger">
        		<i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
        	<div class="table-responsive">
        		<p class="text-center text-primary font-weight-bold">BIODATA AGEN</p>
        		<?= form_open_multipart('admin/agen/tambah_aksi'); ?>
        			<div class="form-group">
					    <label>Id agen</label>
					    <input type="number" class="form-control" id="id_agen" name="id_agen">
					   <?= form_error('id_agen', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
        			<div class="form-group">
					    <label>Nama agen</label>
					    <input type="text" class="form-control" id="nama_agen" name="nama_agen">
					   <?= form_error('nama_agen', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
					    <label>Jenis Kelamin</label>
					    <select name="jk" id="jk" class="form-control input-lg">
							<option value="">Pilih Jenis Kelamin</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					 </div>
					 <div class="form-group">
					    <label>Alamat</label>
					    <input type="text" class="form-control" id="alamat" name="alamat">
					   <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					<div class="form-group">
						<label>Cabang</label>
						<select name="cabang" id="cabang" class="form-control input-lg">
							<option value="">Pilih Cabang</option>
							<?php foreach ($cabang as $row) {
								echo '<option value="'.$row->kd_cabang.'">['.$row->kd_cabang.']: '.$row->nama_cabang.'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Unit</label>
						<select name="unit" id="unit" class="form-control input-lg">
							<option value="">Pilih Unit</option>
						</select>
					</div>
					<div class="form-group">
					    <label>No. Hp</label>
					    <input type="number" class="form-control" id="no_hp" name="no_hp">
					   <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
					 <p class="text-center text-primary font-weight-bold">AKUN AGEN</p>
					 <div class="form-group">
					    <label>Email</label>
					    <input type="text" class="form-control" id="email" name="email">
					   <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
					    <label>Password</label>
					    <input type="text" class="form-control" id="password" name="password">
					   <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
					    <label>Blokir</label>
					    <select name="blokir" id="blokir" class="form-control input-lg">
							<option value="">Pilih blokir</option>
							<option value="N">Tidak</option>
							<option value="Y">Ya</option>
						</select>
					 </div>
					<button type="submit" class="btn btn-primary float-right">Simpan</button>
				<?= form_close(); ?>

			</div>
		</div>
	</div>
</div>