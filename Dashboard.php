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
              <h1 class="m-0 text-dark">Dashboard SISTEM MONITORING BARANG</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Barang</span>
                  <span class="info-box-number"><?php echo $jumlahbarang?></span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-briefcase"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Penggunaan</span>
                  <span class="info-box-number"><?php echo $jumlahpenggunaan?></span>
                </div>
              </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-recycle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pemanfaatan</span>
                  <span class="info-box-number"><?php echo $jumlahpemanfaatan?></span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-wrench"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pemeliharaan</span>
                  <span class="info-box-number"><?php echo $jumlahpemeliharaan ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-share"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pindah Tangan</span>
                  <span class="info-box-number"><?php echo $jumlahpindahtangan ?></span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-fire"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pemusnahan</span>
                  <span class="info-box-number"><?php echo $jumlahpemusnahan ?></span>
                </div>
              </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Penghapusan</span>
                  <span class="info-box-number"><?php echo $jumlahpenghapusan ?></span>
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
</html>