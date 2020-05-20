<div class="row">
    <div class="col-md-12">
		<a href="<?php echo site_url('pembayaran/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tambah Pembayaran</h3>
            </div>
            <?php echo form_open('pembayaran/aksiTambahPembayaran'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="jenis_pembayaran" class="control-label"><span class="text-danger">*</span>Jenis Pembayaran</label>
						<div class="form-group">
							<select name="jenis_pembayaran" class="form-control">
								<option value="">select</option>
								<?php 
								$jenis_pembayaran_values = array(
									'1'=>'Transfer',
								);

								foreach($jenis_pembayaran_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('jenis_pembayaran')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('jenis_pembayaran');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_pembayaran" class="control-label"><span class="text-danger">*</span>Status Pembayaran</label>
						<div class="form-group">
							<select name="status_pembayaran" class="form-control">
								<option value="">select</option>
								<?php 
								$status_pembayaran_values = array(
									'0'=>'Belum Dibayar',
									'1'=>'Menunggu Konfirmasi',
									'2'=>'Sudah Dibayar',
								);

								foreach($status_pembayaran_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('status_pembayaran')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('status_pembayaran');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_pemesanan" class="control-label"><span class="text-danger">*</span>Pemesanan</label>
						<div class="form-group">
							<select name="id_pemesanan" class="form-control">
								<option value="">select pemesanan</option>
								<?php 
								foreach($all_pemesanans as $pemesanan)
								{
									$selected = ($pemesanan['id_pemesanan'] == $this->input->post('id_pemesanan')) ? ' selected="selected"' : "";

									echo '<option value="'.$pemesanan['id_pemesanan'].'" '.$selected.'>'.$pemesanan['id_pemesanan'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_pemesanan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tanggal_pembayaran" class="control-label">Tanggal Pembayaran</label>
						<div class="form-group">
							<input type="text" name="tanggal_pembayaran" value="<?php echo $this->input->post('tanggal_pembayaran'); ?>" class="has-datetimepicker form-control" id="tanggal_pembayaran" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="bukti_pembayaran" class="control-label">Bukti Pembayaran</label>
						<div class="form-group">
							<input type="text" name="bukti_pembayaran" value="<?php echo $this->input->post('bukti_pembayaran'); ?>" class="form-control" id="bukti_pembayaran" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label">Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo $this->input->post('keterangan'); ?>" class="form-control" id="keterangan" />
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