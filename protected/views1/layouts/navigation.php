<aside style="min-height: 2104px;" class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar04.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo Yii::app()->user->name?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
					<?php 
		$this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'sidebar-menu'),
			'submenuHtmlOptions'=>array('class'=>'treeview-menu'),
			'itemCssClass'=>'item-test',
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<i class="glyphicon glyphicon-home"></i> Home', 'url'=>array('/site/index')),
				array('label'=>'<i class="glyphicon glyphicon-list"></i> Berkas Masuk', 'url'=>array('/berkasMasuk/admin'),'visible'=>Yii::app()->user->isSekretariat(),'htmlOptions'=>array('data-toggle'=>'tooltip'),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas masuk bidang sekretariat", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Berkas Masuk', 'url'=>array('/riwayatAlurBerkas/akuntansi'),'visible'=>Yii::app()->user->isAkuntansi(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas masuk bidang akuntansi", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Berkas Masuk', 'url'=>array('/riwayatAlurBerkas/perbendaharaan'),'visible'=>Yii::app()->user->isPerbendaharaan(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas masuk bidang perbendaharaan", 'data-content'=>"Default popover",'tabindex'=>"-1")),
               // array('label'=>'<i class="glyphicon glyphicon-list"></i> Verifikasi Akuntansi', 'url'=>array('/tempKonfirmasiHasilPemeriksaan/import'),'visible'=>Yii::app()->user->isAdministrator()),
                //array('label'=>'<i class="glyphicon glyphicon-list"></i> Verifikasi Perbendaharan', 'url'=>array('/tindakLanjutTemuanPemeriksaan/index'),'visible'=>Yii::app()->user->isAdministrator()),
				array('label'=>'<i class="glyphicon glyphicon-list"></i> Permohonan Diterima', 'url'=>array('/riwayatAlurBerkas/diterimaAkuntansi'),'visible'=>Yii::app()->user->isAkuntansi(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas permohonan diterima bidang akuntansi", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Permohonan Ditolak ', 'url'=>array('RiwayatProsesDibatalkan/admin'),'visible'=>Yii::app()->user->isAkuntansi(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas permohonan ditolak bidang akuntansi", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Data Diposisi', 'url'=>array('riwayatAlurBerkas/adminDisposisiAkuntansi'),'visible'=>Yii::app()->user->isAkuntansi(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas disposisi bidang akuntansi", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                // menu bendaraha
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Permohonan Diterima', 'url'=>array('/riwayatAlurBerkas/diterimaBendahara'),'visible'=>Yii::app()->user->isPerbendaharaan(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas permohonan diterima bidang Perbendaharan", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Permohonan Ditolak ', 'url'=>array('RiwayatProsesDibatalkan/adminBendahara'),'visible'=>Yii::app()->user->isPerbendaharaan(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas permohonan ditolak bidang Perbendaharan", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Data Diposisi', 'url'=>array('riwayatAlurBerkas/adminDisposisiBendahara'),'visible'=>Yii::app()->user->isPerbendaharaan(),'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Berkas disposisi bidang Perbendaharan", 'data-content'=>"Default popover",'tabindex'=>"-1")),
                array('label'=>'<i class="glyphicon glyphicon-search"></i> Cari Dokumen', 'url'=>array('/berkasMasuk/cariDokumen'),'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'<i class="glyphicon glyphicon-list"></i> Pengguna', 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->isAdministrator()),
                 
				array('label'=>'<i class="glyphicon glyphicon-user"></i> Login', 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<i class="glyphicon glyphicon-off"></i> Logout', 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
                  
                </section>
                <!-- /.sidebar -->
            </aside>