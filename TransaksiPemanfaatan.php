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
            <h1>Tabel Pemanfaatan Barang</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
 <?php if ($action != 'print') { ?>
            
              <a href = <?php echo base_url("KaryawanController/manajemenPemanfaatan?a=print"); ?> > <button type="button" class="btn btn-block btn-primary btn" ><i class="fas fa-print"></i> Cetak Data Pemanfaatan</button></a>
            <?php } ?>
              </ol>

            </div>
          </div>
        </div>
      </section>
      <section class="content">
 <?php if ($action == 'print') { ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Pilih Bulan dan Tahun Pemanfaatan</h3>
              </div>
              <div class="card-body col-sm-3">
                <form action=<?php echo base_url("KaryawanController/printPDF/Pemanfaatan"); ?> method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-control form-control-sm" name="bulan" id="inven">
                          <option value="01"> Januari</option>
                          <option value="02"> Februari</option>
                          <option value="03"> Maret</option>
                          <option value="04"> April</option>
                          <option value="05"> Mei</option>
                          <option value="06"> Juni</option>
                          <option value="07"> Juli</option>
                          <option value="08"> Agustus</option>
                          <option value="09"> September</option>
                          <option value="10"> Oktober</option>
                          <option value="11"> November</option>
                          <option value="12"> Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tahun</label>
                        <select class="form-control form-control-sm" name="tahun" id="inven">
                          <option value="2015"> 2015</option>
                          <option value="2016"> 2016</option>
                          <option value="2017"> 2017</option>
                          <option value="2018"> 2018</option>
                          <option value="2019"> 2019</option>
                          <option value="2020"> 2020</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary btn" ><i class="fas fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <h3 class="card-title">Tabel Pemanfaatan Barang</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Pemanfaatan</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Merk/Type</th>
                  <th>Nama Peminjam/sewa</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                    <?php if ($this->session->userdata('userRole') == 'Karyawan') { ?>
                  <th>Aksi</th>
                <?php }?>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($listPemanfaatan as $rows) { ?>
                    <tr>
                      <td><a href = <?php echo base_url("KaryawanController/editPemanfaatan?id=".$rows->id_pemanfaatan."&a=View"); ?> ><?php echo $rows->id_pemanfaatan; ?></a></td>
                      <td><?php echo $rows->kode_barang; ?></td>

                      <td><?php echo $rows->nama_barang; ?></td>
                      <td><?php echo $rows->merk; ?></td>
                      <td><?php echo $rows->nama_sewa; ?></td>
                      <td><?php echo $rows->tanggal_sewa; ?></td>
                      <td><?php echo $rows->tanggal_kembali; ?></td>

                      <td> 
                      <?php if ($rows->status_verifikasi=='PROSES') { ?> <span class="badge bg-warning"> <?PHP }  
                      elseif ($rows->status_verifikasi=='DISETUJUI') { ?> <span class="badge bg-success"> <?PHP } 
                      elseif ($rows->status_verifikasi=='DITOLAK') { ?> <span class="badge bg-danger"> <?PHP } ?>  


                      <?php echo $rows->status_verifikasi; ?> </span> </td>

                    <?php if ($this->session->userdata('userRole') == 'Karyawan') { ?>
                       <td align="center"> <div class="btn-group">
                        <a href=<?php echo base_url("KaryawanController/editPemanfaatan?id=".$rows->id_pemanfaatan."&a=Edit"); ?>><button type="button" class="btn btn-default">
                        <i class="fas fa-edit"></i></button> </a>
                        <a href=<?php echo base_url("KaryawanController/hapusPemanfaatan?id=".$rows->id_pemanfaatan); ?>><button type="button" class="btn btn-default">
                        <i class="fas fa-trash"></i></button> </a>
                      </div></td>
                    <?php }?>
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