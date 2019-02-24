<div class="container">
	
			<div class="card">
			  <div class="card-header">
			    Tambah Data
			  </div>
			  <?php if($this->session->flashdata('flash')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">Data <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
				</button>
				</div>
			</div>
		</div>
<?php endif; ?>
			  <div class="card-body">
			    <form action="" method="post">
				<div class="form-group">
					<?php if ( validation_errors() ) : ?>
			  	<div class="alert alert-danger" role="alert">
				  <?= validation_errors(); ?>
				</div>
				<?php endif; ?>
			    <label for="nama">Nama</label>
			    <input type="text" name="nama" class="form-control" id="nama"/>
			  	</div>
			  	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
			  	<label for="email">Email</label>
			    <input type="text" name="email" class="form-control" id="email"/>
			    <small class="form-text text-danger"><?= form_error('email'); ?></small>
			    <label for="nim">Nim</label>
			    <input type="text" name="nim" class="form-control" id="nim"/>
			    <small class="form-text text-danger"><?= form_error('nim'); ?></small>
				<label for="jurusan">Jurusan</label>
				  <select class="form-control" id="jurusan" name="jurusan">
				    <option>MM</option>
				    <option>TIF</option>
				    <option>RPL</option>
				  </select>
				    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				 </div>
				 	</form>
			  </div>
			</div>
		</div>
	</div>
</div>