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
              <h1>Pemanfaatan Barang Aset</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pemanfaatan Barang</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <?php if ($action == 'Add') { ?>
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanPemanfaatan"); ?> enctype="multipart/form-data">
          <?php } else if ($action == 'Edit') { ?>
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanEditPemanfaatan"); ?> enctype="multipart/form-data">
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
                        <input class="form-control form-control-sm" type="text" name="harga" value="<?php echo  $rows->harga_perolehan; ?>" readonly>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">DETAIL PEMANFAATAN</h3>
                  </div>
                  <div class="card-body">
                    <label>ID Pemanfaatan</label>
                    <input class="form-control form-control-sm" type="text" name="idpemanfaatan" value="<?= $kodeunik; ?>" readonly>
                    <label>Status Pemanfaatan</label>
                    <select class="form-control form-control-sm" name="stpemanfaatan"a>
                      <option value=""> -</option>
                      <option value="Pinjam"> Pinjam</option>
                      <option value="Sewa"> Sewa</option>
                    </select>
                    <label>Nama Penyewa/Peminjam</label>
                    <input class="form-control form-control-sm" type="text" name="namasewa">
                    <label>Lama Sewa/pinjam</label>
                    <input class="form-control form-control-sm" type="text" name="lamasewa">
                    <label>Tanggal Sewa/Pinjam</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tglsewa">
                    </div>
                    <label>Tanggal Tanggal Kembali</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tglkembali">
                    </div>
                    <label>Harga Sewa</label>
                    <input class="form-control form-control-sm" type="text" name="hargasewa">
                    <label>Kondisi Barang</label>
                    <select class="form-control form-control-sm" name="kondisi">
                      <option value=""> -</option>
                      <option value="BAIK"> Barang Baik</option>
                      <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                      <option value="RUSAK BERAT"> Barang Rusak Berat</option>
                    </select>
                    <label>Jaminan</label>
                    <input class="form-control form-control-sm" type="text" name="jaminan">
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
              </div>
            </div>
            <div class="form-group"></div>
          <?php } else { ?>
            <?php foreach ($pemanfaatan as $rows) { ?>
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
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">DETAIL PEMANFAATAN</h3>
                    </div>
                    <div class="card-body">
                      <label>ID Pemanfaatan</label>
                      <input class="form-control form-control-sm" type="text" name="idpemanfaatan" value="<?php echo $rows->id_pemanfaatan; ?>" readonly>
                      <label>Status Pemanfaatan</label>
                      <select class="form-control form-control-sm" name="stpemanfaatan" id="stpemanfaatan">
                        <option value="<?php echo $rows->status_pemanfaatan; ?>"> <?php echo $rows->status_pemanfaatan; ?></option>
                        <option value=""> -</option>
                        <option value="Pinjam"> Pinjam</option>
                        <option value="Sewa"> Sewa</option>
                      </select>
                      <label>Nama Penyewa/Peminjam</label>
                      <input class="form-control form-control-sm" type="text" name="namasewa" id="namasewa" value="<?php echo $rows->nama_sewa; ?>">
                      <label>Lama Sewa/pinjam</label>
                      <input class="form-control form-control-sm" type="text" name="lamasewa" id="lamasewa" value="<?php echo $rows->lama_sewa; ?>">
                      <label>Tanggal Sewa/Pinjam</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tglsewa" id="tglsewa" value="<?php echo $rows->tanggal_sewa; ?>">
                      </div>
                      <label>Tanggal Tanggal Kembali</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tglkembali" id="tglkembali" value="<?php echo $rows->tanggal_kembali; ?>">
                      </div>
                      <label>Harga Sewa</label>
                      <input class="form-control form-control-sm" type="text" name="hargasewa" id="hargasewa" value="<?php echo $rows->harga_sewa; ?>">
                      <label>Kondisi Barang</label>
                      <select class="form-control form-control-sm" name="kondisi" id="kondisi">
                        <option value="<?php echo $rows->harga_sewa; ?>"> <?php echo $rows->kondisi_barang; ?></option>
                        <option value=""> -</option>
                        <option value="BAIK"> Barang Baik</option>
                        <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                        <option value="RUSAK BERAT"> Barang Rusak Berat</option>
                      </select>
                      <label>Jaminan</label>
                      <input class="form-control form-control-sm" type="text" name="jaminan" id="jaminan" value="<?php echo $rows->jaminan; ?>">
                    </div>
                  </div>
                  <?php if ($this->session->userdata('userRole') == 'Karyawan') { ?>
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">SUBMIT</h3>
                    </div>
                    <div class="card-body">
                      <div class="card-footer">
                        <?php if ($action != 'View') { ?>
                          <button type="submit" class="btn btn-info">SAVE</button>
                        <?php } ?>
                        <a href=<?php echo base_url("KaryawanController/manajemenPemanfaatan"); ?> >
                          <button type="button" class="btn btn-default float-right">Cancel</button>
                        </a>
                      </div>
                    </div>
                    <?PHP } ?>

                    <?php if ($this->session->userdata('userRole') != 'Karyawan' &&  $rows->status_verifikasi == 'PROSES') { ?>
                   <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">SUBMIT</h3>
                    </div>
                       <div class="card-body">
                      <div class="card-footer">
                       
                          <a href=<?php echo base_url("KaryawanController/setujuPemanfaatan?id=".$rows->id_pemanfaatan); ?>> <button type="button" class="btn btn-success">SETUJU</button> </a>                        
                        <a href=<?php echo base_url("KaryawanController/tolakPemanfaatan?id=".$rows->id_pemanfaatan); ?> >
                          <button type="button" class="btn btn-danger float-right">TOLAK</button>
                        </a>
                      </div>
                    </div>

                    <?php  } ?>



                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
          </form>
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
        document.getElementById ("stpemanfaatan").disabled = true;
        document.getElementById ("namasewa").disabled = true;
        document.getElementById ("lamasewa").disabled = true;
        document.getElementById ("tglsewa").disabled = true;
        document.getElementById ("tglkembali").disabled = true;
        document.getElementById ("hargasewa").disabled = true;
        document.getElementById ("kondisi").disabled = true;
        document.getElementById ("jaminan").disabled = true;
      }
    })
  </script>
</body>
</html>