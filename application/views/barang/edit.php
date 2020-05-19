<div class="row">
    <div class="col-md-12">
	<a href="<?php echo site_url('barang/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit Barang</h3>
            </div>
			<?php echo form_open('barang/aksiEditBarang/'.$barang['id_barang']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_barang" class="control-label"><span class="text-danger">*</span>Nama Barang</label>
						<div class="form-group">
							<input type="text" name="nama_barang" value="<?php echo ($this->input->post('nama_barang') ? $this->input->post('nama_barang') : $barang['nama_barang']); ?>" class="form-control" id="nama_barang" />
							<span class="text-danger"><?php echo form_error('nama_barang');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="deskripsi" class="control-label"><span class="text-danger">*</span>Deskripsi</label>
						<div class="form-group">
							<input type="text" name="deskripsi" value="<?php echo ($this->input->post('deskripsi') ? $this->input->post('deskripsi') : $barang['deskripsi']); ?>" class="form-control" id="deskripsi" />
							<span class="text-danger"><?php echo form_error('deskripsi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="stok" class="control-label"><span class="text-danger">*</span>Stok</label>
						<div class="form-group">
							<input type="text" name="stok" value="<?php echo ($this->input->post('stok') ? $this->input->post('stok') : $barang['stok']); ?>" class="form-control" id="stok" />
							<span class="text-danger"><?php echo form_error('stok');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga" class="control-label"><span class="text-danger">*</span>Harga</label>
						<div class="form-group">
							<input type="text" name="harga" value="<?php echo ($this->input->post('harga') ? $this->input->post('harga') : $barang['harga']); ?>" class="form-control" id="harga" />
							<span class="text-danger"><?php echo form_error('harga');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Simpan
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>