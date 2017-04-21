<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Yii::app()->name?> | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
          <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/Logo_Kota_PematangSiantar.png" type="image/x-icon" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo Yii::app()->params->application_nickname; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
				<?php 
				//$pesan = AplikasiKomponen::pesan_belum_dibaca();
				?>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                         <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">
                                <?php 
                                if(Yii::app()->user->isAkuntansi()){
                                $jumlahPemberitahuan = RiwayatAlurBerkas::model()->jumlahPemberitahuanAkuntansi();
                                echo $jumlahPemberitahuan;
                                }elseif (Yii::app()->user->isPerbendaharaan()) {
                                    $jumlahPemberitahuan = RiwayatAlurBerkas::model()->jumlahPemberitahuanPerbendaharaan();
                                echo $jumlahPemberitahuan;
                                }

                                ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $jumlahPemberitahuan;?> notifications</li>
                                <li>
                                    <ul class="menu">
                                    <!-- inner menu: contains the actual data -->
                                   <?php
                                    $this->widget('Notification', array(
                                        'maxNotif'=>10,
                                    ));
                                    ?>
                                    
                                       
                                    </ul>
                                </li>
                                <li class="footer"><br><br></li>
                            </ul>
                        </li>
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->user->name?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/logo2.png" class="" alt="User Image" />
                                    <p>
                                        <?php echo Yii::app()->user->akun->nama_pengguna?>
                                        <small><?php //echo Yii::app()->user->account->skpd_->nama_skpd?></small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="index.php?r=site/logout" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-off"></i> Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include "navigation.php"?>

            <!-- Right side column. Contains the navbar and content of the page -->

            <?php echo $content; ?>
            <!-- /.right-side -->
        </div><!-- ./wrapper -->
		<div class="modal fade bs-example-modal-lg" id='dialog1' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content"  id='modal_content'>
			  ...
			</div>
		  </div>
		</div>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id='dialog_utama'>
		  <div class="modal-dialog  modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body" id='modal_content'>
				<p>One fine body&hellip;</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
       

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
     
    </body>
</html>