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
            <h1>Penghapusan Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penghapusan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanPenghapusan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
               <div class="form-group">
                        <?php foreach ($dataPemusnahan as $rows) { ?>
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text" name="idbarang" value="<?php echo $rows->kode_barang; ?>" readonly>
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
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo  $rows->harga; ?>" readonly>
                         <label>Kondisi Barang</label>
                        <input class="form-control form-control-sm" type="text" name="kondisi" value="<?php echo  $rows->kondisi; ?>" readonly>

                      
                        </div>
                        <label>Gambar</label>
                        </div>
              
            </div>
             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMUSNAHAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pemusnahan</label>
              <input class="form-control form-control-sm" type="text" name="idpemusnahan" value="<?php echo  $rows->id_pemusnahan; ?>" readonly>
              <label>Jumlah Barang</label>
              <input class="form-control form-control-sm" type="text" name="jumlah" value="<?php echo  $rows->jumlah; ?>" readonly>
              <label>Keterangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan" value="<?php echo  $rows->keterangan; ?>" readonly>
              <label>Status Barang</label>
                <input class="form-control form-control-sm" type="text" name="status" value="<?php echo  $rows->status; ?>" readonly>
               
               
               <label>Pengajuan Pemusnahan</label>
                <input class="form-control form-control-sm" type="text" name="pengajuan" value="<?php echo  $rows->pengajuan; ?>" readonly>
               </select>
              </div>
            </div>
            <?php } ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">PENGHAPUSAN</h3>
              </div>
              <div class="card-body">
                        <div class="card-footer">
              <label>ID Penghapusan</label>
              <input class="form-control form-control-sm" type="text" name="idpenghapusan" value="<?= $kodeunik; ?>" readonly>
                  <label>Status Penghapusan</label>
               <select class="form-control form-control-sm" name="stpenghapusan">
                          <option value=""> -</option>
                          <option value="Barang Berlebih"> Barang Berlebih</option>
                          <option value="Barang Tidak Ditemukan"> Barang Tidak Ditemukan</option>
                          <option value="Barang Dalam Sengketa"> Barang Dalam Sengketa</option>
               </select>
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

<?php } else { ?>


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
            <h1>Penghapusan Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penghapusan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanEditPenghapusan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
               <div class="form-group">
                        <?php foreach ($penghapusan as $rows) { ?>
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text" name="idbarang" value="<?php echo $rows->kode_barang; ?>" readonly>
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
                         <label>Kondisi Barang</label>
                        <input class="form-control form-control-sm" type="text" name="kondisi" value="<?php echo  $rows->kondisi; ?>" readonly>

                      
                        </div>
                        <label>Gambar</label>
                        </div>
              
            </div>
             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMUSNAHAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pemusnahan</label>
              <input class="form-control form-control-sm" type="text" name="idpemusnahan" value="<?php echo  $rows->id_pemusnahan; ?>" readonly>
              <label>Jumlah Barang</label>
              <input class="form-control form-control-sm" type="text" name="jumlah" value="<?php echo  $rows->jumlah; ?>" readonly>
              <label>Keterangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan" value="<?php echo  $rows->keterangan; ?>" readonly>
              <label>Status Barang</label>
                <input class="form-control form-control-sm" type="text" name="status" value="<?php echo  $rows->status_barang; ?>" readonly>
               
               
               <label>Pengajuan Pemusnahan</label>
                <input class="form-control form-control-sm" type="text" name="pengajuan" value="<?php echo  $rows->pengajuan; ?>" readonly>
               </select>
              </div>
            </div>
          
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">PENGHAPUSAN</h3>
              </div>
              <div class="card-body">
                        <div class="card-footer">
              <label>ID Penghapusan</label>
              <input class="form-control form-control-sm" type="text" name="idpenghapusan" value="<?php echo  $rows->id_penghapusan; ?>" readonly>
                  <label>Status Penghapusan</label>
               <select class="form-control form-control-sm" name="stpenghapusan" id="stpenghapusan" >
                          <option value="<?php echo  $rows->status_hapus; ?>"> <?php echo  $rows->status_hapus; ?></option>
                          <option value=""> -</option>
                          <option value="Barang Berlebih"> Barang Berlebih</option>
                          <option value="Barang Tidak Ditemukan"> Barang Tidak Ditemukan</option>
                          <option value="Barang Dalam Sengketa"> Barang Dalam Sengketa</option>
               </select>
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
        document.getElementById ("stpenghapusan").disabled = true;




      }
    })
  </script>
</html>