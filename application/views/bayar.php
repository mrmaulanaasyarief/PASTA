<div class="row">
    <div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Detail Pemesanan</h3>
            </div>
			<?php echo form_open('pembayaran/bayar/'.$pemesanan['id_pemesanan']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tanggal_pemesanan" class="control-label">Tanggal Pemesanan</label>
						<div class="form-group">
							<input type="text" name="tanggal_pemesanan" value="<?php echo ($this->input->post('tanggal_pemesanan') ? $this->input->post('tanggal_pemesanan') : $pemesanan['tanggal_pemesanan']); ?>" class="has-datetimepicker form-control" id="tanggal_pemesanan" />
                            <span class="text-danger"><?php echo form_error('tanggal_pemesanan');?></span>
                        </div>
					</div>
					<div class="col-md-6">
						<label for="durasi" class="control-label">Durasi</label>
						<div class="form-group">
							<input type="text" name="durasi" value="<?php echo ($this->input->post('durasi') ? $this->input->post('durasi') : $pemesanan['durasi']); ?>" class="form-control" id="durasi" />
							<span class="text-danger"><?php echo form_error('durasi');?></span>
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