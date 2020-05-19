<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Item Pemesanan Edit</h3>
            </div>
			<?php echo form_open('item_pemesanan/edit/'.$item_pemesanan['id_item']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_pemesanan" class="control-label"><span class="text-danger">*</span>Pemesanan</label>
						<div class="form-group">
							<select name="id_pemesanan" class="form-control">
								<option value="">select pemesanan</option>
								<?php 
								foreach($all_pemesanans as $pemesanan)
								{
									$selected = ($pemesanan['id_pemesanan'] == $item_pemesanan['id_pemesanan']) ? ' selected="selected"' : "";

									echo '<option value="'.$pemesanan['id_pemesanan'].'" '.$selected.'>'.$pemesanan['id_pemesanan'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_pemesanan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_barang" class="control-label"><span class="text-danger">*</span>Barang</label>
						<div class="form-group">
							<select name="id_barang" class="form-control">
								<option value="">select barang</option>
								<?php 
								foreach($all_barangs as $barang)
								{
									$selected = ($barang['id_barang'] == $item_pemesanan['id_barang']) ? ' selected="selected"' : "";

									echo '<option value="'.$barang['id_barang'].'" '.$selected.'>'.$barang['nama_barang'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_barang');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kuantitas" class="control-label"><span class="text-danger">*</span>Kuantitas</label>
						<div class="form-group">
							<input type="text" name="kuantitas" value="<?php echo ($this->input->post('kuantitas') ? $this->input->post('kuantitas') : $item_pemesanan['kuantitas']); ?>" class="form-control" id="kuantitas" />
							<span class="text-danger"><?php echo form_error('kuantitas');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga" class="control-label">Harga</label>
						<div class="form-group">
							<input type="text" name="harga" value="<?php echo ($this->input->post('harga') ? $this->input->post('harga') : $item_pemesanan['harga']); ?>" class="form-control" id="harga" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_harga" class="control-label">Total Harga</label>
						<div class="form-group">
							<input type="text" name="total_harga" value="<?php echo ($this->input->post('total_harga') ? $this->input->post('total_harga') : $item_pemesanan['total_harga']); ?>" class="form-control" id="total_harga" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>