<?php 
	$this->widget('zii.widgets.CMenu',array(
	  'htmlOptions'=>array('class'=>'nav navbar-nav pull-left mainNav'),
	  
	  'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
	  'id'=>'menu-top',
	  'itemCssClass'=>'item-test',
	  'encodeLabel'=>false,
	  'items'=>array(
		array('label'=>'<i class="glyphicon glyphicon-home"></i> Home', 'url'=>array('/site/index')),
		array('label'=>'<i class="glyphicon glyphicon-list"></i> Peta','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Peta Tanggap Bencana", 'data-content'=>"Default popover",), 'url'=>array('site/peta'),'visible'=>!Yii::app()->user->isGuest,
								),
		array('label'=>'<i class="glyphicon glyphicon-book"></i> Data  <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Cross Sungai','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/tblSurveySungai/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/tblSurveySungai/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),

                        array('label'=>'<i class="glyphicon glyphicon-list"></i> Rumah Sakit','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/rumahSakit/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/rumahSakit/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Puskesmas','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/puskesmas/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/puskesmas/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),
						/*array('label'=>'<i class="glyphicon glyphicon-list"></i> Lapangan','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/lapangan/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/lapangan/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),*/
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Permukiman Pinggir Sungai','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/daerahPermukiman/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/daerahPermukiman/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Rawan Kebakaran','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/WilayahRawanKebakaran/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/WilayahRawanKebakaran/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Riwayat Bencana ','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Tambah Data', 'url' => array('/RiwayatBencana/create'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Lihat Data', 'url' => array('/RiwayatBencana/admin'),'laporan'=>!Yii::app()->user->isGuest,),
						),),
						), 'visible'=>!Yii::app()->user->isGuest ),
		
		array('label'=>'<i class="glyphicon glyphicon-book"></i>  Arsip <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"", 'data-content'=>"Default popover",'class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Laporan Bencana','itemOptions'=>array('class' => 'dropdown-submenu','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Data arsip surat masuk", 'data-content'=>"Default popover",), 'url'=>'#','visible'=>!Yii::app()->user->isGuest,
								'items' => array(
                                array('label' => 'Data Laporan Bencana', 'url' => array('/suratMasuk/admin'),'visible'=>!Yii::app()->user->isGuest,),
								array('label' => 'Tambah Laporan Bencana', 'url' => array('/suratMasuk/create'),'laporan'=>!Yii::app()->user->isGuest,),
								array('label' => 'Cetak Laporan Bencana', 'url' => array('/suratMasuk/laporan','tahun'=>date("Y")),'visible'=>!Yii::app()->user->isGuest,),
						   ),),
						
						), 'visible'=>!Yii::app()->user->isGuest ),
		
		array('label'=>'<i class="glyphicon glyphicon-book"></i> Data Rawan Bencana  <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Tambah Data','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Tambah Data ", 'data-content'=>"Default popover",), 'url'=>array('/DataRawanBencana/create'),'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'<i class="glyphicon glyphicon-list"></i> Lihat Data','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Lihat Data", 'data-content'=>"Default popover",), 'url'=>array('/DataRawanBencana/admin'),'visible'=>!Yii::app()->user->isGuest),
						//array('label'=>'<i class="glyphicon glyphicon-list"></i> Register','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Register", 'data-content'=>"Default popover",), 'url'=>array('/dpaSkpdPerubahan/admin'),'visible'=>!Yii::app()->user->isGuest),
						), 'visible'=>!Yii::app()->user->isGuest ),
		array('label'=>'<i class="glyphicon glyphicon-book"></i> SMS Gateway  <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Kotak Masuk','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Kotak Masuk ", 'data-content'=>"Default popover",), 'url'=>array('/inbox/admin'),'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'<i class="glyphicon glyphicon-list"></i> Kirim Pesan','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Kirim Pesan", 'data-content'=>"Default popover",), 'url'=>array('/outbox/create'),'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Blast SMS','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Blast SMS", 'data-content'=>"Default popover",), 'url'=>array('/outbox/blast'),'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Kontak','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Kontak", 'data-content'=>"Default popover",), 'url'=>array('/pbk/admin'),'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'<i class="glyphicon glyphicon-list"></i> Setting','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Setting", 'data-content'=>"Default popover",), 'url'=>'setting_sms_gateway/step2.php','visible'=>!Yii::app()->user->isGuest),
						//array('label'=>'<i class="glyphicon glyphicon-list"></i> Register','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Register", 'data-content'=>"Default popover",), 'url'=>array('/dpaSkpdPerubahan/admin'),'visible'=>!Yii::app()->user->isGuest),
						), 'visible'=>!Yii::app()->user->isGuest ),
		array('label'=>'<i class="glyphicon glyphicon-book"></i> Help  <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						//array('label'=>'<i class="glyphicon glyphicon-list"></i> About','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"About", 'data-content'=>"Default popover",), 'url'=>array('/DataRawanBencana/about'),'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'<i class="glyphicon glyphicon-list"></i> User Manual','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Download", 'data-content'=>"Default popover",), 'url'=>'upload/bukumanual.pdf','visible'=>!Yii::app()->user->isGuest),
						//array('label'=>'<i class="glyphicon glyphicon-list"></i> Register','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Register", 'data-content'=>"Default popover",), 'url'=>array('/dpaSkpdPerubahan/admin'),'visible'=>!Yii::app()->user->isGuest),
						), 'visible'=>!Yii::app()->user->isGuest ),
		array('label'=>'<i class="glyphicon glyphicon-on"></i> Login', 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
		array('label'=>'<i class="glyphicon glyphicon-off"></i> Logout', 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
		//array('label'=>'<i class="glyphicon glyphicon-off"></i> Logout', 'itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Keluar dan Logout dari aplikasi", 'data-content'=>"Default popover",),'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
	  ));	  
?>
