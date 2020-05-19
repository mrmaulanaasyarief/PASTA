<div class="row">
    <div class="col-md-12">
		<a href="<?php echo site_url('user/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tambah User</h3>
            </div>
            <?php echo form_open('user/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="jk" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
						<div class="form-group">
							<select name="jk" class="form-control">
								<option value="">select</option>
								<?php 
								$jk_values = array(
									'0'=>'Laki-Laki',
									'1'=>'Perempuan',
								);

								foreach($jk_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('jk')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('jk');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
						<div class="form-group">
							<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
							<span class="text-danger"><?php echo form_error('alamat');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="telp" class="control-label"><span class="text-danger">*</span>Telp</label>
						<div class="form-group">
							<input type="text" name="telp" value="<?php echo $this->input->post('telp'); ?>" class="form-control" id="telp" />
							<span class="text-danger"><?php echo form_error('telp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="jenis_user" class="control-label"><span class="text-danger">*</span>Jenis User</label>
						<div class="form-group">
							<select name="jenis_user" class="form-control">
								<option value="">select</option>
								<?php 
								$jenis_user_values = array(
									'0'=>'Admin',
									'1'=>'Customer',
								);

								foreach($jenis_user_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('jenis_user')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('jenis_user');?></span>
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