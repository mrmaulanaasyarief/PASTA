<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Barang</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('barang/aksiTambahBarang'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Barang</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Barang</th>
						<th>Nama Barang</th>
						<th>Deskripsi</th>
						<th>Stok</th>
						<th>Harga</th>
						<th>Aksi</th>
                    </tr>
                    <?php foreach($barangs as $b){ ?>
                    <tr>
						<td><?php echo $b['id_barang']; ?></td>
						<td><?php echo $b['nama_barang']; ?></td>
						<td><?php echo $b['deskripsi']; ?></td>
						<td><?php echo $b['stok']; ?></td>
						<td><?php echo $b['harga']; ?></td>
						<td>
                            <a href="<?php echo site_url('barang/detail/'.$b['id_barang']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-info"></span> detail</a> 
                            <a href="<?php echo site_url('barang/aksiEditBarang/'.$b['id_barang']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a onclick="deleteConfirm('<?php echo site_url('barang/aksiHapusBarang/'.$b['id_barang']); ?>')"
											 href="#!" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>            
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
