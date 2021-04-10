<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
       	<div class="card-body">
       		<a href="<?=base_url('admin/kriteria'); ?>" class="badge badge-danger">
        		<i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
        	<div class="table-responsive">

        		<?php foreach($kriteria as $krt)	:	?>

        		<form method="post" action="<?=base_url('admin/kriteria/edit_aksi') ?>">
        			<div class="form-group">
					    <label>Kode kriteria</label>
					    <input type="text" class="form-control" name="kd_kriteria" 
					    value="<?=$krt->kd_kriteria; ?>">		   
					</div>
        			<div class="form-group">
					    <label>Nama kriteria</label>
					    <input type="text" class="form-control" name="ket" 
					    value="<?=$krt->ket; ?>">
					</div>
					<div class="form-group">
					    <label>Bobot</label>
					    <input type="number" class="form-control" name="bobot" 
					    value="<?=$krt->bobot; ?>">
					</div>
					<div class="form-group">
					    <label>Attribut</label>
					    <select name="attribut" id="attribut" class="form-control input-lg">
                        <option value="<?=$krt->attribut; ?>"><?=$krt->attribut; ?></option>
                        <option value="">Pilih Atribut</option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                      </select>
					</div>
					<button type="submit" class="btn btn-primary float-right">Simpan</button>
				</form>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>