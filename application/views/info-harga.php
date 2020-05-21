<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Data Tables</title>
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  
</head>
<body>

  <section class="content-header">
    <h1>
      Data Barang
    </h1>
  </section>

  <section class="content">
    <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              $i = 1;
              foreach($barangs as $b){ ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $b['nama_barang']; ?></td>
                <td><?php echo $b['deskripsi']; ?></td>
                <td>Rp. <?php echo $b['harga']; ?></td>
              </tr>
              <?php } ?>
          </tbody>
      </table>
    </section>
  
  <script>
  $(document).ready(function(){
    $('#tabel-data').DataTable();
});
  </script>

  
</body>