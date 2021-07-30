<!DOCTYPE html>
<html>

<?php require_once('Include/Head.php'); ?>
<body class="hold-transition sidebar-mini">
            <input type="hidden" value="<?php echo $action; ?>" id="action" />

<?php if ($action == 'Add') { ?>
  <div class="wrapper">
    <?php require_once('Include/NavBar.php'); ?>
    <?php require_once('Include/Menu.php'); ?>
    <div class="content-wrapper">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemeliharaan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemeliharaan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanPemeliharaan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
              <?php foreach ($dataBarang as $rows) { ?>
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="idbarang"  value="<?php echo $rows->id_barang; ?>" readonly>
                         <label>Kode Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="kodebarang" value="<?php echo $rows->kode_barang; ?>" readonly>
                        <label>Nama Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="nama" value="<?php echo $rows->nama_barang; ?>" readonly>
                        <label>Merk/Type Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="merk"  value="<?php echo $rows->merk; ?>" readonly>
                        <label>Tanggal Perolehan</label>
                        <input class="form-control form-control-sm" type="text"  name="tglperolehan"  value="<?php echo $rows->tgl_perolehan; ?>" readonly>
                        <label>Jenis Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="jenis"  value="<?php echo $rows->jenis_barang; ?>" readonly>
                        <?php } ?>
              </div>
            </div></div>
                                    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">UPLOAD</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
                       <label>Nota Perbaikan</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="nota">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div>
              </div>
            </div>
             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMELIHARAAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pemeliharaan</label>
              <input class="form-control form-control-sm" type="text" name="idpemeliharaan" value="<?= $kodeunik; ?>" readonly>
              <label>Status Pemeliharaan</label>
               <select class="form-control form-control-sm" name="stpemeliharaan">
                          <option value=""> -</option>
                          <option value="Perbaikan Berkala"> Perbaikan Berkala</option>
                          <option value="Perbaikan Ringan"> Perbaikan Ringan</option>
                          <option value="Perbaikan Berat"> Perbaikan Berat</option>
               </select>

                <label>Tanggal Perbaikan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" placeholder="DD/MM/YYYY">
                </div>
                <label>Keterangan Perbaikan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan">
              <label>Biaya Pemeliharaan</label>
              <input class="form-control form-control-sm" type="text" name="biaya">
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
            </form>
                  <div class="form-group">
                  </div>
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
<?php } else { ?>
<div class="wrapper">
    <?php require_once('Include/NavBar.php'); ?>
    <?php require_once('Include/Menu.php'); ?>
    <div class="content-wrapper">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemeliharaan Barang Aset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemeliharaan Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form id="form_validation" method="POST" action=<?php echo base_url("KaryawanController/simpanEditPemeliharaan"); ?> enctype="multipart/form-data">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">BARANG</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
              <?php foreach ($pemeliharaan as $rows) { ?>
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="idbarang"  value="<?php echo $rows->id_barang; ?>" readonly>
                         <label>Kode Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="kodebarang" value="<?php echo $rows->kode_barang; ?>" readonly>
                        <label>Nama Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="nama" value="<?php echo $rows->nama_barang; ?>" readonly>
                        <label>Merk/Type Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="merk"  value="<?php echo $rows->merk; ?>" readonly>
                        <label>Tanggal Perolehan</label>
                        <input class="form-control form-control-sm" type="text"  name="tglperolehan"  value="<?php echo $rows->tanggal_perolehan; ?>" readonly>
                        <label>Jenis Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="jenis"  value="<?php echo $rows->jenis_barang; ?>" readonly>
                        <?php } ?>
              </div>
            </div></div>
            <?php if ($action != 'View') { ?>

                                    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">UPLOAD</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
                       <label>Nota Perbaikan</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="nota">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div>
              </div>
            </div>
  <?php }?>


             </div>
            <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL PEMELIHARAAN</h3>
              </div>
              <div class="card-body">
              <label>ID Pemeliharaan</label>
              <input class="form-control form-control-sm" type="text" name="idpemeliharaan" value="<?php echo $rows->id_pemeliharaan; ?>" readonly>
              <label>Status Pemeliharaan</label>
               <select class="form-control form-control-sm" name="stpemeliharaan" id="stpemeliharaan">
                          <option value="<?php echo $rows->status_pemeliharaan; ?>"> <?php echo $rows->status_pemeliharaan; ?></option>
                          <option value=""> -</option>
                          <option value="Perbaikan Berkala"> Perbaikan Berkala</option>
                          <option value="Perbaikan Ringan"> Perbaikan Ringan</option>
                          <option value="Perbaikan Berat"> Perbaikan Berat</option>
               </select>

                <label>Tanggal Perbaikan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" placeholder="DD/MM/YYYY" value="<?php echo $rows->tanggal_perbaikan; ?>" id="tglperbaikan">
                </div>
                <label>Keterangan Perbaikan</label>
              <input class="form-control form-control-sm" type="text" name="keterangan" value="<?php echo $rows->keterangan; ?>" id="keterangan">
              <label>Biaya Pemeliharaan</label>
              <input class="form-control form-control-sm" type="text" name="biaya" value="<?php echo $rows->biaya; ?>" id="biaya">
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

<?php if ($this->session->userdata('userRole') != 'Karyawan' &&  $rows->status_verifikasi == 'PROSES') { ?>
                   <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">SUBMIT</h3>
                    </div>
                       <div class="card-body">
                      <div class="card-footer">
                       
                          <a href=<?php echo base_url("KaryawanController/setujuPemeliharaan?id=".$rows->id_pemeliharaan); ?>> <button type="button" class="btn btn-success">SETUJU</button> </a>                        
                        <a href=<?php echo base_url("KaryawanController/tolakPemeliharaan?id=".$rows->id_pemeliharaan); ?> >
                          <button type="button" class="btn btn-danger float-right">TOLAK</button>
                        </a>
                      </div>
                    </div>
                  </div>


                    <?php  } ?>
                    </div>
            </form>
                  <div class="form-group">
                  </div>
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
<?php } ?>
  <script>
  $(function () {
      var action = document.getElementById("action").value;
      if (action == 'View') {
              document.getElementById ("stpemeliharaan").disabled = true;
              document.getElementById ("tglperbaikan").disabled = true;
              document.getElementById ("biaya").disabled = true;
              document.getElementById ("keterangan").disabled = true;


      }
    })
  </script>
</body>
</html>