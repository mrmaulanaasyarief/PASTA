<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Item Pemesanans Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('item_pemesanan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Item</th>
						<th>Id Pemesanan</th>
						<th>Id Barang</th>
						<th>Kuantitas</th>
						<th>Harga</th>
						<th>Total Harga</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($item_pemesanans as $i){ ?>
                    <tr>
						<td><?php echo $i['id_item']; ?></td>
						<td><?php echo $i['id_pemesanan']; ?></td>
						<td><?php echo $i['id_barang']; ?></td>
						<td><?php echo $i['kuantitas']; ?></td>
						<td><?php echo $i['harga']; ?></td>
						<td><?php echo $i['total_harga']; ?></td>
						<td>
                            <a href="<?php echo site_url('item_pemesanan/edit/'.$i['id_item']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('item_pemesanan/remove/'.$i['id_item']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
