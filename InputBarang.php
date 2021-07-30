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
              <h1>Rekam Data Barang</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Rekam Data Barang</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <?php if ($action == 'Add') { ?>
					  <form class="form-horizontal" action=<?php echo base_url("KaryawanController/simpanRekamData"); ?> method="post" enctype="multipart/form-data">
					<?php } else if ($action == 'Edit') { ?>
						<form class="form-horizontal" action=<?php echo base_url("KaryawanController/simpanEditRekamData"); ?> method="post" enctype="multipart/form-data">	
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
                        <label>ID Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="idbarang" value="<?php echo $id['id']; ?>" id="idbarang" readonly>
                        <label>Kode Lokasi</label>
                        <input class="form-control form-control-sm" type="text"  name="kodelokasi">
                        <label>Jenis Inventarisasi</label>
                        <select class="form-control form-control-sm" name="inven" id="inven" onchange="generateKodeBarang()">
                          <option value=""> -</option>
                          <option value="BRG"> BARANG (BRG)</option>
                          <option value="JIJ"> JALAN, IRIGASI, JARINGAN (JIJ)</option>
                          <option value="CD"> GEDUNG DAN BANGUNAN (GD)</option>
                          <option value="TNH"> TANAH(TNH)</option>
                        </select>
                        <label>Kode Barang</label>
                        <input class="form-control form-control-sm" type="text"  name="kodebarang" id="kodebarang" readonly>
                        <label>NUP</label>
                        <input class="form-control form-control-sm" type="text"  name="nup">
                        <label>Tanggal Perolehan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" id="timepicker">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">UPLOAD</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Faktur Pembelian</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="faktur">
                          <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                        </div>
                        <label>Gambar Barang</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                          <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">DETAIL</h3>
                    </div>
                    <div class="card-body">
                      <label>Nama Barang</label>
                      <input class="form-control form-control-sm" type="text" name="nama">
                      <label>Merk / Type</label>
                      <input class="form-control form-control-sm" type="text" name="merk">
                      <label>Jenis Barang</label>
                      <select class="form-control form-control-sm" name="jenis">
                        <option value=""> -</option>
                        <option value="BERGERAK"> Barang Bergerak</option>
                        <option value="TIDAK BERGERAK"> Barang Tidak Bergerak</option>
                        <option value="ELEKTRONIK"> Barang Elektronik</option>
                      </select>
                      <label>Harga Perolehan</label>
                      <input class="form-control form-control-sm" type="text" name="harga">
                      <label>Satuan</label>
                      <input class="form-control form-control-sm" type="text" name="satuan">
                      <label>Kuantitas</label>
                      <input class="form-control form-control-sm" type="text" name="kuantitas">
                      <label>AKM Penyusutan</label>
                      <input class="form-control form-control-sm" type="text" name="penyusutan">
                      <label>Nilai Buku</label>
                      <input class="form-control form-control-sm" type="text" name="nilai">
                      <label>Kondisi Barang</label>
                      <select class="form-control form-control-sm" name="kondisi">
                        <option value=""> -</option>
                        <option value="BAIK"> Barang Baik</option>
                        <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                        <option value="RUSAK BERAT"> Barang Rusak Berat</option>
                      </select>
                      <label>Status Barang</label>
                      <select class="form-control form-control-sm" name="status">
                        <option value=""> -</option>
                        <option value="BARU"> Barang Baru</option>
                        <option value="BEKAS"> Barang Bekas</option>
                        <option value="HIBAH"> Barang Hibah</option>
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
                        <a href=<?php echo base_url("KaryawanController/manajemenBarang"); ?> >
                          <button type="button" class="btn btn-default float-right">Cancel</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <?php foreach ($barang as $rows) { ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">BARANG</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>ID Barang</label>
                          <input class="form-control form-control-sm" type="text"  name="idbarang" value="<?php echo $rows->id_barang; ?>" id="idbarang" readonly>
                          <label>Kode Lokasi</label>
                          <input class="form-control form-control-sm" type="text"  name="kodelokasi" id="kodelokasi" value="<?php echo $rows->kode_lokasi; ?>">
                          <label>Jenis Inventarisasi</label>
                          <select class="form-control form-control-sm" name="inven" id="inven" value="<?php echo $rows->jenis_invetarisasi; ?>" onchange="generateKodeBarang()">
                            <option value="<?php echo $rows->jenis_invetarisasi; ?>"> <?php echo $rows->jenis_invetarisasi; ?></option>
                            <option value=""> -</option>
                            <option value="BRG"> BARANG (BRG)</option>
                            <option value="JIJ"> JALAN, IRIGASI, JARINGAN (JIJ)</option>
                            <option value="CD"> GEDUNG DAN BANGUNAN (GD)</option>
                            <option value="TNH"> TANAH(TNH)</option>
                          </select>
                          <label>Kode Barang</label>
                          <input class="form-control form-control-sm" type="text" name="kodebarang" id="kodebarang" value="<?php echo $rows->kode_barang; ?>" readonly>
                          <label>NUP</label>
                          <input class="form-control form-control-sm" type="text" name="nup" id="nup" value="<?php echo $rows->nup; ?>">
                          <label>Tanggal Perolehan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $rows->tgl_perolehan; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal" id="tanggal">
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php if ($action != 'View') { ?>
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">UPLOAD</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Faktur Pembelian</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="faktur" id="faktur">
                            <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                          </div>
                          <label>Gambar Barang</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar" id="gambar">
                            <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?PHP } ?>
                    <?php if ($action == 'View') { ?>
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">GAMBAR</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Faktur Pembelian</label>
                         <div>
                           <img src="<?php echo base_url()?>Assets/images/<?php echo $rows->faktur; ?> " width="500" >
                          </div>
                          <label>Gambar Barang</label>
                          <div>
                           <img src="<?php echo base_url()?>Assets/images/<?php echo $rows->gambar; ?> " width="500" >
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <?PHP } ?>

                  </div>
                  <div class="col-md-6">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">DETAIL</h3>
                      </div>
                      <div class="card-body">
                        <label>Nama Barang</label>
                        <input class="form-control form-control-sm" type="text" name="nama" id="nama" value="<?php echo $rows->nama_barang; ?>">
                        <label>Merk / Type</label>
                        <input class="form-control form-control-sm" type="text" name="merk" id="merk" value="<?php echo $rows->merk; ?>">
                        <label>Jenis Barang</label>
                        <select class="form-control form-control-sm" name="jenis" id="jenis" >
                          <option value="<?php echo $rows->jenis_barang; ?>" > <?php echo $rows->jenis_barang; ?></option>
                          <option value=""> -</option>
                          <option value="BERGERAK"> Barang Bergerak</option>
                          <option value="TIDAK BERGERAK"> Barang Tidak Bergerak</option>
                          <option value="ELEKTRONIK"> Barang Elektronik</option>
                        </select>
                        <label>Harga Perolehan</label>
                        <input class="form-control form-control-sm" type="text" name="harga" id="harga" value="<?php echo $rows->harga_perolehan; ?>">
                        <label>Satuan</label>
                        <input class="form-control form-control-sm" type="text" name="satuan" id="satuan" value="<?php echo $rows->satuan; ?>">
                        <label>Kuantitas</label>
                        <input class="form-control form-control-sm" type="text" name="kuantitas" id="kuantitas" value="<?php echo $rows->kuantitas; ?>">
                        <label>AKM Penyusutan</label>
                        <input class="form-control form-control-sm" type="text" name="penyusutan" id="penyusutan" value="<?php echo $rows->akm_penyusutan; ?>">
                        <label>Nilai Buku</label>
                        <input class="form-control form-control-sm" type="text" name="nilai" id="nilai" value="<?php echo $rows->nilai_buku; ?>">
                        <label>Kondisi Barang</label>
                        <select class="form-control form-control-sm" name="kondisi" id="kondisi" value="<?php echo $rows->kondisi_barang; ?>">
                          <option value="<?php echo $rows->kondisi_barang; ?>"> <?php echo $rows->kondisi_barang; ?></option>
                          <option value=""> -</option>
                          <option value="BAIK"> Barang Baik</option>
                          <option value="RUSAK RINGAN"> Barang Rusak Ringan</option>
                          <option value="RUSAK BERAT"> Barang Rusak Berat</option>
                        </select>
                        <label>Status Barang</label>
                        <select class="form-control form-control-sm" name="status" id="status">
                          <option value=value="<?php echo $rows->status_barang; ?>"> <?php echo $rows->status_barang; ?></option>
                          <option value=""> -</option>
                          <option value="BARU"> Barang Baru</option>
                          <option value="BEKAS"> Barang Bekas</option>
                          <option value="HIBAH"> Barang Hibah</option>
                        </select>
                      </div>
                    </div><?php if ($action != 'View') { ?>
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">SUBMIT</h3>
                      </div>
                      <div class="card-body">
                        <div class="card-footer">
                          
                            <button type="submit" class="btn btn-info">SAVE</button>'
                        
                          <a href=<?php echo base_url("KaryawanController/manajemenBarang"); ?> >
                            <button type="button" class="btn btn-default float-right">Cancel</button>
                          </a>
                        </div>
                      </div>
                    </div>
                      <?php } ?>
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
      document.getElementById("idbarang")     .disabled = true;
      document.getElementById("kodelokasi")   .disabled = true;
      document.getElementById("inven")        .disabled = true;
      document.getElementById("kodebarang")   .disabled = true;
      document.getElementById("nup")          .disabled = true;
      document.getElementById("tanggal")      .disabled = true;
      document.getElementById("nama")         .disabled = true;
      document.getElementById("merk")         .disabled = true;
      document.getElementById("jenis")        .disabled = true;
      document.getElementById("harga")        .disabled = true;
      document.getElementById("satuan")       .disabled = true;
      document.getElementById("kuantitas")    .disabled = true;
      document.getElementById("penyusutan")   .disabled = true;
      document.getElementById("nilai")        .disabled = true;
      document.getElementById("kondisi")      .disabled = true;
      document.getElementById("status")       .disabled = true;
    }
  })
  function generateKodeBarang() {
    var inven = document.getElementById("inven").value;
    var idbarang = document.getElementById("idbarang").value;
    $("#kodebarang").val("INV/SDN/DLG/" + inven + "/" + idbarang);
  }
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>