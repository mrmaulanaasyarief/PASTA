<div class="row">
    <div class="col-md-12">
	<a href="<?php echo site_url('user/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Detail</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $user['nama']); ?>" class="form-control" id="nama" disabled/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="jk" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
						<div class="form-group">
							<select name="jk" class="form-control" disabled>
								<option value="">select</option>
								<?php 
								$jk_values = array(
									'0'=>'Laki-Laki',
									'1'=>'Perempuan',
								);

								foreach($jk_values as $value => $display_text)
								{
									$selected = ($value == $user['jk']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $user['password']); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div> -->
					<div class="col-md-6">
						<label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
						<div class="form-group">
							<input type="text" name="alamat" value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $user['alamat']); ?>" class="form-control" id="alamat" disabled/>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div> -->
					<div class="col-md-6">
						<label for="telp" class="control-label"><span class="text-danger">*</span>Telp</label>
						<div class="form-group">
							<input type="text" name="telp" value="<?php echo ($this->input->post('telp') ? $this->input->post('telp') : $user['telp']); ?>" class="form-control" id="telp" disabled/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="jenis_user" class="control-label"><span class="text-danger">*</span>Jenis User</label>
						<div class="form-group">
							<select name="jenis_user" class="form-control" disabled>
								<option value="">select</option>
								<?php 
								$jenis_user_values = array(
									'0'=>'Admin',
									'1'=>'Customer',
								);

								foreach($jenis_user_values as $value => $display_text)
								{
									$selected = ($value == $user['jenis_user']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
                <a href="<?php echo site_url('user/aksiEditUser/'.$user['id_user']); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                <a onclick="deleteConfirm('<?php echo site_url('user/aksiHapusUSer/'.$user['id_user']); ?>')"
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