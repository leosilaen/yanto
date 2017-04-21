<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php //echo Yii::app()->name?>
        </h1>
        
    </section>
    <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    <!-- Main content -->
    <section class="content">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-archive" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Masuk</span>
              <span class="info-box-number"><?php echo $jumlah_dokumen?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Proses</span>
              <span class="info-box-number"><?php echo $jumlah_dokumen_dalam_proses?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-ok-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Selesai</span>
              <span class="info-box-number"><?php echo $jumlah_dokumen_dalam_selesai?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-remove-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Ditolak</span>
              <span class="info-box-number"><?php echo ($jumlah_dokumen-($jumlah_dokumen_dalam_selesai+$jumlah_dokumen_dalam_proses))?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="clear"></div>
       <div class="dashboard">
          <h2 class="dashboard-heading">Selamat Datang di <br><strong><?php echo Yii::app()->name?></strong></h2>
          <p>

          </p>
        </div>
       

    </section><!-- /.content -->
</aside><!-- /.right-side -->

<!-- <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>    -->