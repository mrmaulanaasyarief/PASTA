<div class="row">
    <div class="col-md-12">
        <a href="<?php echo site_url('barang/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Detail Barang</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_barang" class="control-label">Nama Barang</label>
						<div class="form-group">
							<input type="text" name="nama_barang" value="<?php echo ($this->input->post('nama_barang') ? $this->input->post('nama_barang') : $barang['nama_barang']); ?>" class="form-control" id="nama_barang" disabled/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="deskripsi" class="control-label">Deskripsi</label>
						<div class="form-group">
							<input type="text" name="deskripsi" value="<?php echo ($this->input->post('deskripsi') ? $this->input->post('deskripsi') : $barang['deskripsi']); ?>" class="form-control" id="deskripsi" disabled/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="stok" class="control-label">Stok</label>
						<div class="form-group">
							<input type="text" name="stok" value="<?php echo ($this->input->post('stok') ? $this->input->post('stok') : $barang['stok']); ?>" class="form-control" id="stok" disabled/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga" class="control-label">Harga</label>
						<div class="form-group">
							<input type="text" name="harga" value="<?php echo ($this->input->post('harga') ? $this->input->post('harga') : $barang['harga']); ?>" class="form-control" id="harga" disabled/>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
                <a href="<?php echo site_url('barang/aksiEditBarang/'.$barang['id_barang']); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                <a onclick="deleteConfirm('<?php echo site_url('barang/aksiHapusBarang/'.$barang['id_barang']); ?>')"
											 href="#!" class="btn btn-danger"><span class="fa fa-trash"></span> Hapus</a>
	        </div>				
		</div>
    </div>
</div>
<?php $this->load->view("layouts/modal.php") ?>
<script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>