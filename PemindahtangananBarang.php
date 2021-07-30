<!DOCTYPE html>
<html>
<input type="hidden" value="<?php echo $action; ?>" id="action" />

<?php if ($action == 'Add') { ?>

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
            <h1>Pemindahtanganan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemindahtanganan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanPemindahtanganan"); ?> enctype="multipart/form-data">
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
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo  $rows->harga_perolehan; ?>" readonly>
                      <?php } ?>
                        </div>
                        <label>Gambar</label>
              </div>
            </div>
             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMINDAHTANGANAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pindah Tangan</label>
              <input class="form-control form-control-sm" type="text" name="idpindahtangan" value="<?= $kodeunik; ?>" readonly>
              <label>Status Pemindahtanganan</label>
               <select class="form-control form-control-sm" name="stpindahtangan">
                          <option value=""> -</option>
                          <option value="Diberikan"> Diberikan</option>
                          <option value="Dihibahkan"> Dihibahkan</option>
                          <option value="Disewakan"> Disewakan</option>
                          <option value="Dipinjamkan"> Dipinjamkan</option>
               </select>
               <label>Keterangan Pindah Tangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan">
                <label>Kondisi Barang</label>
               <select class="form-control form-control-sm" name="kondisi">
                          <option value=""> -</option>
                          <option value="BAIK"> Barang Baik</option>
                          <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                          <option value="RUSAK BERAT"> Barang Rusak Berat</option>
               </select>
                <label>Nama Penerima</label>
              <input class="form-control form-control-sm" type="text" name="namapenerima">
              <label>Tanggal Pemindahtanganan</label>
                        <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggalpdh">
                  </div>
              </div>
            </div>

             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">SUBMIT</h3>
              </div>
              <div class="card-body">
                        <div class="card-footer">
                  <button type="submit" class="btn btn-info">SAVE</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
              </div>
            </div>
            </div></form>
                  </div>
                  <div class="form-group">
                  </div>
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
<?PHP } else {?>
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
            <h1>Pemindahtanganan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemindahtanganan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanEditPemindahtanganan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
                        <?php foreach ($pindahtangan as $rows) { ?>
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
                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" value="<?php echo $rows->tanggal_perolehan; ?>" readonly>
                        </div>
                        <label>Harga Perolehan</label>
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo  $rows->harga_perolehan; ?>" readonly>
                     
                        </div>
                        <label>Gambar</label>
              </div>
            </div>
             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMINDAHTANGANAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pindah Tangan</label>
              <input class="form-control form-control-sm" type="text" name="idpindahtangan" value="<?php echo  $rows->id_pindahtangan; ?>" readonly>
              <label>Status Pemindahtanganan</label>
               <select class="form-control form-control-sm" name="stpindahtangan" id="stpindahtangan">
                          <option value="<?php echo  $rows->status_pindahtangan; ?>"> <?php echo  $rows->status_pindahtangan; ?></option>
                          <option value=""> -</option>
                          <option value="Diberikan"> Diberikan</option>
                          <option value="Dihibahkan"> Dihibahkan</option>
                          <option value="Disewakan"> Disewakan</option>
                          <option value="Dipinjamkan"> Dipinjamkan</option>
               </select>
               <label>Keterangan Pindah Tangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan" value="<?php echo  $rows->keterangan; ?>" id="keterangan">
                <label>Kondisi Barang</label>
               <select class="form-control form-control-sm" name="kondisi" id="kondisi">
                          <option value="<?php echo  $rows->kondisi; ?>"> <?php echo  $rows->kondisi; ?></option>
                          <option value=""> -</option>
                          <option value="BAIK"> Barang Baik</option>
                          <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                          <option value="RUSAK BERAT"> Barang Rusak Berat</option>
               </select>
                <label>Nama Penerima</label>
              <input class="form-control form-control-sm" type="text" name="namapenerima" value="<?php echo  $rows->nama_penerima; ?>" id="namapenerima">
              <label>Tanggal Pemindahtanganan</label>
                        <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggalpdh" value="<?php echo  $rows->tanggal_pindahtangan; ?>" id="tglpindah">
                  </div>
                   <?php } ?>
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
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
              </div>
            </div>
          <?php } ?>
            </div></form>
                  </div>
                  <div class="form-group">
                  </div>
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
<?php } ?>
  <script>
  $(function () {
      var action = document.getElementById("action").value;
      if (action == 'View') {
              document.getElementById ("stpindahtangan").disabled = true;
              document.getElementById ("keterangan").disabled = true;
              document.getElementById ("namapenerima").disabled = true;
              document.getElementById ("kondisi").disabled = true;
              document.getElementById ("tglpindah").disabled = true;



      }
    })
  </script>
</html>