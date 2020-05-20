<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pembayaran</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pembayaran/aksiTambahPembayaran'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Pembayaran</a> 
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
						<th>Aksi</th>
                    </tr>
                    <?php foreach($pembayarans as $p){ ?>
                    <tr>
						<td><?php echo '#'.$p['id_pembayaran']; ?></td>
						<td>
                            <?php
                                if($p['jenis_pembayaran'] == 1){
                                    echo 'Transfer';
                                } 
                            ?>
                        </td>
						<td>
                            <?php
                                if($p['status_pembayaran'] == 0){
                                    echo 'Belum Dibayar';
                                }else if($p['status_pembayaran'] == 1){
                                    echo 'Menunggu Kofirmasi';
                                }else{
                                    echo 'Sudah Dibayar';
                                }
                            ?>
                        </td>
						<td><?php echo '#'.$p['id_pemesanan']; ?></td>
						<td><?php echo $p['tanggal_pembayaran']; ?></td>
						<td><?php echo $p['bukti_pembayaran']; ?></td>
						<td><?php echo $p['keterangan']; ?></td>
						<td>
                            <?php
                                 if($p['status_pembayaran'] == 1){
                                    ?><a href="<?php echo site_url('pembayaran/aksiKonfirmasiPembayaran/'.$p['id_pembayaran']); ?>" class="btn btn-success btn-xs"><span class="fa fa-check"></span> Konfirmasi Pembayaran</a> <?php
                                }
                            ?>
                            <a href="<?php echo site_url('pembayaran/aksiEditPembayaran/'.$p['id_pembayaran']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pembayaran/aksiHapusPembayaran/'.$p['id_pembayaran']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>            
            </div>
        </div>
    </div>
</div>