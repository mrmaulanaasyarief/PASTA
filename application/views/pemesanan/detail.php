<div class="row">
    <div class="col-md-12">
		<a href="<?php echo site_url('pemesanan/index'); ?>" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Kembali</a>
      	<div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Pesanan #<?=$pemesanan['id_pemesanan']?></h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Barang</th>
						<th>Harga</th>
						<th>Kuantitas</th>
						<th>Total Harga</th>
                    </tr>
                    <?php 
                          $tot_qty = 0; $tot_hrg = 0;
                          foreach($items as $i){ ?>
                    <tr>
                        <td>
                            <?php 
                                foreach($barang as $b){
                                    if($b['id_barang'] == $i['id_barang']){
                                        echo $b['nama_barang'];
                                    }
                                }
                            ?>
                        </td>
						<td><?php echo $i['harga'];?></td>
						<td><?php echo $i['kuantitas']; $tot_qty += $i['kuantitas']; ?></td>
						<td><?php echo $i['total_harga']; $tot_hrg += $i['total_harga']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" class="text-right">TOTAL: </th>
                        <th><?=$tot_qty?></th>
                        <th><?=$tot_hrg?></th>
                    </tr>
                </table>   
                <div class="row">
                    <div class="col-xs-12">
                    <?php 
                        if($pemesanan['status_pemesanan'] == 1){ 
                            if($pembayaran['status_pembayaran'] == 0){
                    ?>
                            <a href="#" class="btn btn-success pull-right disabled" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Belum Dibayar</a>
                    <?php 
                        }else if($pembayaran['status_pembayaran'] == 1){
                            ?><a href="<?php echo site_url('pembayaran/aksiKonfirmasiPembayaran/'.$pembayaran['id_pembayaran']); ?>" class="btn btn-success pull-right" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a><?php
                        }else{
                            ?><a href="#" class="btn btn-success pull-right disabled" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Sudah Dibayar</a><?php
                        }
                    }
                    ?>
                    <a href="#" class="btn btn-primary pull-right disabled" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;><i class="fa fa-shopping-cart"></i> 
                        <?php 
                            if($pemesanan['status_pemesanan'] == 0){
                                echo 'Belum Dipesan';
                            }else{
                                echo 'Dipesan';
                            }
                        ?>
                    </a>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>
