<!DOCTYPE html>
<html>
<?php require_once('Include/Head.php'); ?>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php require_once('Include/NavBar.php'); ?>
    <?php require_once('Include/Menu.php'); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pemeliharaan Barang</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Kode Lokasi</th>
                    <th>Nama Barang</th>
                    <th>Merk/Type</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listBarang as $rows) { ?>
                      <tr>
                        <td><a href = <?php echo base_url("KaryawanController/tambahPemeliharaan?id=".$rows->id_barang."&a=Add"); ?> >
                          <?php echo $rows->kode_barang; ?>
                        </a></td>
                        <td><?php echo $rows->kode_lokasi; ?></td>
                        <td><?php echo $rows->nama_barang; ?></td>
                        <td><?php echo $rows->merk; ?></td>
                      </tr>
                    <?php } ?>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php require_once('Include/Footer.php'); ?>
  </div>
<?php require_once('Include/Foot.php'); ?>
</body>
</html>