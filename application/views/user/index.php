<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data User</h3>
            	<div class="box-tools">
                <a href="<?php echo site_url('user/aksiTambahUser'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah User</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id User</th>
						<th>Jenis Kelamin</th>
						<th>Jenis User</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telp</th>
						<th>Aksi</th>
                    </tr>
                    <?php foreach($users as $u){ ?>
                    <tr>
						<td><?php echo $u['id_user']; ?></td>
						<td>
                            <?php  
                                if ($u['jk'] == 0){
                                    echo 'Laki-laki';
                                }else{
                                    echo 'Perempuan';
                                }
                            ?>
                        </td>
                        <td>
                            <?php  
                                if ($u['jenis_user'] == 0){
                                    echo 'Admin';
                                }else{
                                    echo 'Customer';
                                }
                            ?>
                        </td>
						<td><?php echo $u['nama']; ?></td>
						<td><?php echo $u['alamat']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['telp']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/detail/'.$u['id_user']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-info"></span> detail</a> 
                            <a href="<?php echo site_url('user/edit/'.$u['id_user']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="deleteConfirm('<?php echo site_url('user/aksiHapusUser/'.$u['id_user']); ?>')"
											 href="#!" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
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