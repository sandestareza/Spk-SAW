<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
       	<div class="card-body">
       		<a href="<?=base_url('admin/kriteria'); ?>" class="badge badge-danger">
        		<i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
        	<div class="table-responsive">

        		<?php foreach($subkriteria as $sk)	:	?>

        		<form method="post" action="<?=base_url('admin/kriteria/sub_aksi') ?>">
        			<div class="form-group">
					    <label>Kode kriteria</label>
					    <input type="hidden" class="form-control" name="id_subkriteria" value="<?=$sk->id_subkriteria; ?>">

					    <select name="kd_kriteria" id="kd_kriteria" class="form-control input-lg" style="width: 20%">
                        <option value="<?=$sk->kd_kriteria; ?>"><?=$sk->kd_kriteria;?></option>
                        <option value="">Pilih Kriteria</option>
                        <?php foreach ($kriteria as $krt) : ?>
                        <option value="<?=$krt->kd_kriteria; ?>">
                        <?=$krt->ket; ?>[<?=$krt->kd_kriteria; ?>]</option>
                        <?php endforeach; ?>
                      </select>		   
					</div>
        			<div class="form-group">
					    <label>Ket Subkriteria</label>
					    <input type="text" class="form-control" name="ket_sub" 
					    value="<?=$sk->ket_sub; ?>">
					</div>
					<div class="form-group">
					    <label>Bobot</label>
					    <input type="number" class="form-control" name="bobot" 
					    value="<?=$sk->bobot; ?>">
					</div>
					<button type="submit" class="btn btn-primary float-right">Simpan</button>
				</form>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>