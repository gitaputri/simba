<!DOCTYPE html>
          <input type="hidden" value="<?php echo $action; ?>" id="action" />
<html>
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
            <h1>Pemusnahan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemusnahan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanPemusnahan"); ?> enctype="multipart/form-data">
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
                         <label>Kondisi Barang</label>
                        <input class="form-control form-control-sm" type="text" name="kondisi" value="<?php echo  $rows->harga_perolehan; ?>" readonly>

                      <?php } ?>
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
              <input class="form-control form-control-sm" type="text" name="idpemusnahan" value="<?= $kodeunik; ?>" readonly>
              <label>Jumlah Barang</label>
              <input class="form-control form-control-sm" type="text" name="jumlah">
              <label>Keterangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan">
              <label>Status Barang</label>
               <select class="form-control form-control-sm" name="stpenghapusan">
                          <option value=""> -</option>
                          <option value="Barang Berlebih"> Barang Berlebih</option>
                          <option value="Barang Tidak Ditemukan"> Barang Tidak Ditemukan</option>
                          <option value="Barang Dalam Sengketa"> Barang Dalam Sengketa</option>
               </select>
               
               
               <label>Pengajuan Pemusnahan</label>
               <select class="form-control form-control-sm" name="pengajuan">
                          <option value=""> -</option>
                          <option value="Dibakar"> Dibakar</option>
                          <option value="Dihancurkan"> Dihancurkan</option>
                          <option value="Ditimbun"> Ditimbun</option>
                          <option value="Ditenggelamkan"> Ditenggelamkan</option>
                          <option value="Dikembalikan"> Dikembalikan</option>
                          <option value="Cara Lain Sesuai Ketentuan PP"> Cara Lain Sesuai Ketentuan PP</option>
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
<?php } else {?>
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
            <h1>Pemusnahan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemusnahan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanEditPemusnahan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
               <div class="form-group">
                        <?php foreach ($pemusnahan as $rows) { ?>
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
              <input class="form-control form-control-sm" type="text" name="jumlah" value="<?php echo  $rows->jumlah; ?>" id="jumlah">
              <label>Keterangan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan" value="<?php echo  $rows->keterangan; ?>" id="keterangan">
              <label>Status Barang</label>
               <select class="form-control form-control-sm" name="stpenghapusan" id="status">
                          <option value="<?php echo  $rows->status; ?>"> <?php echo  $rows->status; ?></option>
                          <option value=""> -</option>
                          <option value="Barang Berlebih"> Barang Berlebih</option>
                          <option value="Barang Tidak Ditemukan"> Barang Tidak Ditemukan</option>
                          <option value="Barang Dalam Sengketa"> Barang Dalam Sengketa</option>
               </select>
               
               
               <label>Pengajuan Pemusnahan</label>
               <select class="form-control form-control-sm" name="pengajuan" id="pengajuan">
                          <option value="<?php echo  $rows->pengajuan; ?>"> <?php echo  $rows->pengajuan; ?></option>
                          <option value=""> -</option>
                          <option value="Dibakar"> Dibakar</option>
                          <option value="Dihancurkan"> Dihancurkan</option>
                          <option value="Ditimbun"> Ditimbun</option>
                          <option value="Ditenggelamkan"> Ditenggelamkan</option>
                          <option value="Dikembalikan"> Dikembalikan</option>
                          <option value="Cara Lain Sesuai Ketentuan PP"> Cara Lain Sesuai Ketentuan PP</option>
               </select>
              </div>
                      <?php } ?>

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
            <?php  } ?>
            <?php if ($this->session->userdata('userRole') != 'Karyawan' &&  $rows->status_verifikasi == 'PROSES' && $action == 'View') { ?>
                   <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">SUBMIT</h3>
                    </div>
                       <div class="card-body">
                      <div class="card-footer">
                       
                          <a href=<?php echo base_url("KaryawanController/setujuPemusnahan?id=".$rows->id_pemusnahan); ?>> <button type="button" class="btn btn-success">SETUJU</button> </a>                        
                        <a href=<?php echo base_url("KaryawanController/tolakPemusnahan?id=".$rows->id_pemusnahan); ?> >
                          <button type="button" class="btn btn-danger float-right">TOLAK</button>
                        </a>
                      </div>
                    </div>
                  </div>


                    
          <?php }?>
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
  <script>
    $(function () {
      var action = document.getElementById("action").value;
      if (action == 'View') {
        document.getElementById ("jumlah").disabled = true;
        document.getElementById ("keterangan").disabled = true;
        document.getElementById ("status").disabled = true;
        document.getElementById ("pengajuan").disabled = true;



      }
    })
  </script>
<?php }?>
</html>