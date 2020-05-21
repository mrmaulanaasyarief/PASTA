<?php if($pemesanan['status_pemesanan'] == 0){?>
<div class="row no-print">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tambah Pesanan</h3>
            </div>
            <?php echo form_open('item_pemesanan/aksiTambahItem'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6 hidden">
						<label for="id_pemesanan" class="control-label"><span class="text-danger">*</span>Pemesanan</label>
						<div class="form-group">
                            <input type="text" name="id_pemesanan" value="<?php echo ($this->input->post('id_pemesanan')) ? $this->input->post('id_pemesanan') : $pemesanan['id_pemesanan'];?>" class="form-control" id="id_pemesanan" />
							<span class="text-danger"><?php echo form_error('id_pemesanan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_barang" class="control-label"><span class="text-danger">*</span>Barang</label>
						<div class="form-group">
							<select name="id_barang" class="form-control">
								<option value="">select barang</option>
								<?php 
								foreach($all_barangs as $barang)
								{
									$selected = ($barang['id_barang'] == $this->input->post('id_barang')) ? ' selected="selected"' : "";

									echo '<option value="'.$barang['id_barang'].'" '.$selected.'>'.$barang['nama_barang'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_barang');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kuantitas" class="control-label"><span class="text-danger">*</span>Kuantitas</label>
						<div class="form-group">
							<input type="text" name="kuantitas" value="<?php echo $this->input->post('kuantitas'); ?>" class="form-control" id="kuantitas" />
							<span class="text-danger"><?php echo form_error('kuantitas');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-plus"></i> Tambah
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
<?php }?>
<div class="row">
    <div class="col-md-12">
		<div class="box">
            <div class="box-header no-print">
                <h3 class="box-title">Detail Pesanan #<?=$pemesanan['id_pemesanan']?></h3>
            </div>
            <div class="box-body">
                <table class="table table-striped no-print">
                    <tr>
						<th>Barang</th>
						<th>Harga</th>
						<th>Kuantitas</th>
						<th>Total Harga</th>
                        <?php if($pemesanan['status_pemesanan'] == 0){?>
						<th></th>
                        <?php }?>
                    </tr>
                    <?php 
                          $tot_qty = 0; $tot_hrg = 0;
                          foreach($items as $i){ ?>
                    <tr>
                        <td>
                            <?php 
                                foreach($all_barangs as $b){
                                    if($b['id_barang'] == $i['id_barang']){
                                        echo $b['nama_barang'];
                                    }
                                }
                            ?>
                        </td>
						<td><?php echo $i['harga'];?></td>
						<td><?php echo $i['kuantitas']; $tot_qty += $i['kuantitas']; ?></td>
						<td><?php echo $i['total_harga']; $tot_hrg += $i['total_harga']; ?></td>
                        <?php if($pemesanan['status_pemesanan'] == 0){?>
                        <td>
                            <a href="<?php echo site_url('item_pemesanan/aksiHapusItem/'.$i['id_pemesanan'].'/'.$i['id_item']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-times"></span> Hapus</a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" class="text-right">TOTAL: </th>
                        <th><?=$tot_qty?></th>
                        <th><?=$tot_hrg?></th>
                    </tr>
                </table>
                
                <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> PASTA
                    </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Pasta</strong><br>
                        Bandung<br>
                        Phone: (022) 1231231<br>
                        Email: info@pasta.com
                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $this->session->userdata('user_name')?></strong><br>
                        <?= $this->session->userdata('user_address')?><br>
                        Phone: <?= $this->session->userdata('user_telp')?><br>
                        Email: <?= $this->session->userdata('user_email')?>
                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $pembayaran['id_pembayaran']?></b><br>
                    <b>Tanggal Pesanan:</b> <?= $pemesanan['tanggal_pemesanan']?><br>
                    <b>Order ID:</b> #<?= $pemesanan['id_pemesanan']?><br>
                    <b>Account:</b> <?= $this->session->userdata('user_id')?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $tot_qty = 0; $tot_hrg = 0;
                            foreach($items as $i){ ?>
                        <tr>
                            <td><?php echo $i['kuantitas']; $tot_qty += $i['kuantitas']; ?></td>
                            <td>
                                <?php 
                                    foreach($all_barangs as $b){
                                        if($b['id_barang'] == $i['id_barang']){
                                            echo $b['nama_barang'];
                                        }
                                    }
                                ?>
                            </td>
                            <td>Rp.<?php echo $i['harga'];?></td>
                            <td>Rp.<?php echo $i['total_harga']; $tot_hrg += $i['total_harga']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Transfer ke :<br>
                        bank XXX<br>
                        No Rek: 1234567890
                    </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">

                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>Rp.<?= $tot_hrg?></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td><?= $pemesanan['durasi']?> Hari</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>Rp.<?= $pemesanan['total_harga']?></td>
                        </tr>
                        </table>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                    <a href="<?php echo site_url('pemesanan/aksiCetakStruk/'.$this->session->userdata('user_id'));?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>

                <div class="row no-print">
                    <div class="col-xs-12">
                    <?php 
                        if($pemesanan['status_pemesanan'] == 1){ 
                            if($pembayaran['status_pembayaran'] == 0){
                    ?>
                            <a href="<?php echo site_url('pembayaran/bayar/'.$pemesanan['id_pemesanan']); ?>" class="btn btn-success pull-right" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Bayar Pesanan</a>
                    <?php 
                        }else if($pembayaran['status_pembayaran'] == 1){
                            ?><a href="#" class="btn btn-primary pull-right disabled" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Menunggu Konfirmasi</a><?php
                        }else{
                            ?><a href="#" class="btn btn-success pull-right disabled" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Sudah Dibayar</a><?php
                        }
                    }
                    ?>
                    <?php if($pemesanan['status_pemesanan'] == 0){ ?>
                        <a href="<?php echo site_url('pemesanan/place_order/'.$this->session->userdata('user_id').'/'.$pemesanan['id_pemesanan']);?>" class="btn btn-success pull-left" tabindex="-1" role="button" aria-disabled="true" style="margin-right: 5px;"> 
                            <i class="fa fa-check"></i> Pesan
                        </a>
                    <?php
                        }
                    ?>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>