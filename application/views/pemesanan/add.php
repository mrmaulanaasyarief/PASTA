<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pemesanan Add</h3>
            </div>
            <?php echo form_open('pemesanan/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_user" class="control-label"><span class="text-danger">*</span>User</label>
						<div class="form-group">
							<select name="id_user" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id_user'] == $this->input->post('id_user')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id_user'].'" '.$selected.'>'.$user['nama'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_user');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_pemesanan" class="control-label"><span class="text-danger">*</span>Status Pemesanan</label>
						<div class="form-group">
							<select name="status_pemesanan" class="form-control">
								<option value="">select</option>
								<?php 
								$status_pemesanan_values = array(
									'0'=>'Belum Dipesan',
									'1'=>'Dipesan',
								);

								foreach($status_pemesanan_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('status_pemesanan')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('status_pemesanan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tanggal_pemesanan" class="control-label"><span class="text-danger">*</span>Tanggal Pemesanan</label>
						<div class="form-group">
							<input type="text" name="tanggal_pemesanan" value="<?php echo $this->input->post('tanggal_pemesanan'); ?>" class="has-datetimepicker form-control" id="tanggal_pemesanan" />
							<span class="text-danger"><?php echo form_error('tanggal_pemesanan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="durasi" class="control-label"><span class="text-danger">*</span>Durasi</label>
						<div class="form-group">
							<input type="text" name="durasi" value="<?php echo $this->input->post('durasi'); ?>" class="form-control" id="durasi" />
							<span class="text-danger"><?php echo form_error('durasi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_item" class="control-label">Total Item</label>
						<div class="form-group">
							<input type="text" name="total_item" value="<?php echo $this->input->post('total_item'); ?>" class="form-control" id="total_item" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_harga" class="control-label">Total Harga</label>
						<div class="form-group">
							<input type="text" name="total_harga" value="<?php echo $this->input->post('total_harga'); ?>" class="form-control" id="total_harga" />
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