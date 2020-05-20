<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pemesanan</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pemesanan/aksiTambahPemesanan'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Pemesanan</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pemesanan</th>
						<th>Customer</th>
						<th>Status Pemesanan</th>
						<th>Tanggal Pemesanan</th>
						<th>Durasi</th>
						<th>Total Item</th>
						<th>Total Harga</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pemesanans as $p){ ?>
                    <tr>
						<td><?php echo $p['id_pemesanan']; ?></td>
                        <td>
                            <?php 
                                foreach($all_users as $u)
								{
									if($u['id_user'] == $p['id_user']){
                                        echo $u['nama'];
                                    }
								} 
                            ?>
                        </td>
						<td>
                            <?php 
                                if($p['status_pemesanan'] == 0){
                                    echo 'Belum Dipesan';
                                }else{
                                    echo 'Dipesan';
                                }
                            ?>
                        </td>
						<td><?php echo $p['tanggal_pemesanan']; ?></td>
						<td><?php echo $p['durasi']; ?></td>
						<td><?php echo $p['total_item']; ?></td>
						<td><?php echo $p['total_harga']; ?></td>
						<td>
                            <a href="<?php echo site_url('pemesanan/detail/'.$p['id_user'].'/'.$p['id_pemesanan']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-info"></span> detail</a> 
                            <a href="<?php echo site_url('pemesanan/aksiEditPemesanan/'.$p['id_pemesanan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="deleteConfirm('<?php echo site_url('pemesanan/aksiHapusPemesanan/'.$p['id_pemesanan']); ?>')"
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