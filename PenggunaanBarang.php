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
              <h1>Penggunaan Barang Aset</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Penggunaan Barang</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
        <?php if ($action == 'Add') { ?>
            <form class="form-horizontal" action=<?php echo base_url("KaryawanController/simpanPenggunaan"); ?> method="post">
          <?php } else if ($action == 'Edit') { ?>
            <form class="form-horizontal" action=<?php echo base_url("KaryawanController/simpanEditPenggunaan"); ?> method="post"> 
          <?php } ?>
            <input type="hidden" value="<?php echo $action; ?>" id="action" />
            <?php if ($action == 'Add') { ?>
            <div class="row">
              <div class="col-md-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">BARANG</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <?php foreach ($dataBarang as $rows) { ?>
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text" name="idbarang" value="<?php echo $rows->id_barang; ?>" readonly>
                        <label>Kode Lokasi</label>
                        <input class="form-control form-control-sm" type="text" name="kodelokasi" value="<?php echo $rows->kode_lokasi; ?>" readonly>
                        <label>Kode Barang</label>
                        <input class="form-control form-control-sm" type="text" name="kodebarang" value="<?php echo $rows->kode_barang; ?>" readonly>
                        <label>NUP</label>
                        <input class="form-control form-control-sm" type="text" name="nup" value="<?php echo $rows->nup; ?>" readonly>
                        <label>Merk/Type Barang</label>
                        <input class="form-control form-control-sm" type="text" name="merk" value="<?php echo $rows->merk; ?>" readonly>
                        <label>Nama Barang</label>
                        <input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $rows->nama_barang; ?>" readonly>
                        <label>Tanggal Perolehan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" value="<?php echo $rows->tgl_perolehan; ?>" readonly>
                        </div>
                        <label>Harga Perolehan</label>
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo $rows->harga_perolehan; ?>" readonly>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">DETAIL PENGGUNAAN</h3>
                  </div>
                  <div class="card-body">
                    <label>ID Penggunaan</label>
                    <input class="form-control form-control-sm" type="text" name="idpenggunaan" value="<?= $kodeunik; ?>" readonly>
                    <label>Status Kepemilikan</label>
                    <select class="form-control form-control-sm" name="stkepemilikan">
                      <option value=""> -</option>
                      <option value="Milik Sendiri"> Milik Sendiri</option>
                      <option value="Pinjam"> Pinjam</option>
                      <option value="Sewa"> Sewa</option>
                      <option value="Hibah"> Hibah</option>
                    </select>
                    <label>Status Penggunaan</label>
                    <select class="form-control form-control-sm" name="stpenggunaan">
                      <option value=""> -</option>
                      <option value="Digunakan Sendiri"> Digunakan Sendiri</option>
                      <option value="Disewakan"> Disewakan</option>
                      <option value="Dipinjamkan"> Dipinjamkan</option>
                    </select>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">SUBMIT</h3>
                  </div>
                  <div class="card-body">
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">SAVE</button>
                      <a href=<?php echo base_url("KaryawanController/penggunaan"); ?> >
                        <button type="button" class="btn btn-default float-right">Cancel</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <?php } else { ?>
              <?php foreach ($penggunaan as $rows) { ?>
                          <div class="row">
              <div class="col-md-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">BARANG</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                     
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text" name="idbarang" value="<?php echo $rows->id_barang; ?>" readonly>
                        <label>Kode Lokasi</label>
                        <input class="form-control form-control-sm" type="text" name="kodelokasi" value="<?php echo $rows->kode_lokasi; ?>" readonly>
                        <label>Kode Barang</label>
                        <input class="form-control form-control-sm" type="text" name="kodebarang" value="<?php echo $rows->kode_barang; ?>" >
                        <label>NUP</label>
                        <input class="form-control form-control-sm" type="text" name="nup" value="<?php echo $rows->nup; ?>" readonly>
                        <label>Merk/Type Barang</label>
                        <input class="form-control form-control-sm" type="text" name="merk" value="<?php echo $rows->merk; ?>" readonly>
                        <label>Nama Barang</label>
                        <input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $rows->nama_barang; ?>" readonly>
                        <label>Tanggal Perolehan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" value="<?php echo $rows->tanggal_perolehan; ?>" readonly>
                        </div>
                        <label>Harga Perolehan</label>
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo $rows->harga_perolehan; ?>" readonly>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">DETAIL PENGGUNAAN</h3>
                  </div>
                  <div class="card-body">
                    <label>ID Penggunaan</label>
                    <input class="form-control form-control-sm" type="text" name="idpenggunaan" value="<?php echo $rows->id_penggunaan; ?>" readonly>
                    <label>Status Kepemilikan</label>
                    <select class="form-control form-control-sm" name="stkepemilikan" id="stkepemilikan">
                      <option value="<?php echo $rows->status_kepemilikan; ?>"> <?php echo $rows->status_kepemilikan; ?></option>
                      <option value=""> -</option>
                      <option value="Milik Sendiri"> Milik Sendiri</option>
                      <option value="Pinjam"> Pinjam</option>
                      <option value="Sewa"> Sewa</option>
                      <option value="Hibah"> Hibah</option>
                    </select>
                    <label>Status Penggunaan</label>
                    <select class="form-control form-control-sm" name="stpenggunaan" id="stpenggunaan">
                    <option value="<?php echo $rows->status_penggunaan; ?>"> <?php echo $rows->status_penggunaan; ?></option>
                      <option value=""> -</option>
                      <option value="Digunakan Sendiri"> Digunakan Sendiri</option>
                      <option value="Disewakan"> Disewakan</option>
                      <option value="Dipinjamkan"> Dipinjamkan</option>
                    </select>
                  </div>
                </div>
                <?php if ($action != 'View') { ?>
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">SUBMIT</h3>
                  </div>
                  <div class="card-body">
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">SAVE</button>
                      <a href=<?php echo base_url("KaryawanController/penggunaan"); ?> >
                        <button type="button" class="btn btn-default float-right">Cancel</button>
                      </a>
                    </div>
                  </div>
                </div>

              <?php }?>

              </div>
            </div>
          </form>
          <?php } ?>
            <?php } ?>
        </div>
      </section>
    </div>
    <?php require_once('Include/Footer.php'); ?>
  </div>
  <?php require_once('Include/Foot.php'); ?>
  <script>
  $(function () {
      var action = document.getElementById("action").value;
      if (action == 'View') {
              document.getElementById ("stpenggunaan").disabled = true;
              document.getElementById ("stkepemilikan").disabled = true;

      }
    })
  </script>
</body>
</html>