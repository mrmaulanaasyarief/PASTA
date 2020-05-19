<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pembayarans Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pembayaran/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pembayaran</th>
						<th>Jenis Pembayaran</th>
						<th>Status Pembayaran</th>
						<th>Id Pemesanan</th>
						<th>Tanggal Pembayaran</th>
						<th>Bukti Pembayaran</th>
						<th>Keterangan</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pembayarans as $p){ ?>
                    <tr>
						<td><?php echo $p['id_pembayaran']; ?></td>
						<td><?php echo $p['jenis_pembayaran']; ?></td>
						<td><?php echo $p['status_pembayaran']; ?></td>
						<td><?php echo $p['id_pemesanan']; ?></td>
						<td><?php echo $p['tanggal_pembayaran']; ?></td>
						<td><?php echo $p['bukti_pembayaran']; ?></td>
						<td><?php echo $p['keterangan']; ?></td>
						<td>
                            <a href="<?php echo site_url('pembayaran/edit/'.$p['id_pembayaran']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pembayaran/remove/'.$p['id_pembayaran']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
