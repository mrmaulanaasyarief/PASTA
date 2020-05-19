<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemesanans Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pemesanan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pemesanan</th>
						<th>Id User</th>
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
						<td><?php echo $p['id_user']; ?></td>
						<td><?php echo $p['status_pemesanan']; ?></td>
						<td><?php echo $p['tanggal_pemesanan']; ?></td>
						<td><?php echo $p['durasi']; ?></td>
						<td><?php echo $p['total_item']; ?></td>
						<td><?php echo $p['total_harga']; ?></td>
						<td>
                            <a href="<?php echo site_url('pemesanan/edit/'.$p['id_pemesanan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pemesanan/remove/'.$p['id_pemesanan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
