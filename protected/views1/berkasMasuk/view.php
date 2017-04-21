<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Berkas Masuk'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Berkas Masuk','url'=>array('index')),
array('label'=>'Tambah Berkas Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Berkas Masuk','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Berkas Masuk','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Berkas Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Lihat Berkas Masuk <?php echo $model->nomor_berkas?></h1>
</section>
<section class="content">
<div class="col-md-12">
<?php 
$this->widget('booster.widgets.TbAlert', array(
    'fade' => true,
    'closeText' => false, // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info', // you don't need to specify full config
        'warning' => array('closeText' => false),
        'error' 
    ),
));
?>
</div>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nomor_berkas',
		'tanggal_masuk',
		'jenis_berkas_.jenis_berkas',
		
		'keterangan',
		array(
			'label'=>'Input oleh',
			'value'=>$model->penerima_->nama_pengguna
		),
		//'riwayat_berkas_terakhir',
		//'status_berkas',
),
)); ?>
<br><small>Untuk setiap dokumen masuk urgent, durasi maksimal adalah 6 jam.</small>
</section>
<section class="content-header">Unggah Berkas 
<a class="btn btn-info" href='<?php echo Yii::app()->createUrl('berkasMasuk/upload',array('id'=>$model->id))?>' id='upload'><i class='glyphicon glyphicon-upload'></i> Upload</a>

</section>
<section class="content">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'file-masuk-grid',
'dataProvider'=>$modelFileMasuk->search(),
'filter'=>null,
'template' => '{items}{pager}',
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'nama_dokumen',
			'sortable' => false,
			'filter'=> '',
			'htmlOptions'=>array('width'=>170),
			//'htmlOptions'=>array('id' => ($data->harga_satuan==0) ? "parent_" : "child_"),
			'editable' => array(
			'url' => $this->createUrl('fileMasuk/gridUpdate'),
			//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
			'name'=>"nama_dokumen",
			'inputclass' => 'col-md-3 ',
			'options' => array(
				'placement' => 'top',
				'success' => 'js: function(data) {
					//location.reload(); 
				}',
			),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'keterangan',
			'sortable' => false,
			'filter'=> '',
			'htmlOptions'=>array('width'=>170),
			//'htmlOptions'=>array('id' => ($data->harga_satuan==0) ? "parent_" : "child_"),
			'editable' => array(
			'url' => $this->createUrl('fileMasuk/gridUpdate'),
			//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
			'name'=>"keterangan",
			'inputclass' => 'col-md-3 ',
			'options' => array(
				'placement' => 'top',
				'success' => 'js: function(data) {
					//location.reload(); 
				}',
			),
			)
		),
		'dokumen_download:html',
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
'template'=>'{delete}',
'buttons'=>array(
	'Riwayat Perubahan Tanggal Komitmen' => array
	(
		'icon'=>'glyphicon glyphicon-th-large',
		'url'=>'Yii::app()->createUrl("historyPerubahanTanggalKomitmenBank/admin", array("id"=>$data->id))',
		'options'=>array(
			'id'=>'riwayat_tanggal_komitmen',
		),
	),
	'delete' => array
	(
		'icon'=>'glyphicon glyphicon-trash',
		'url'=>'Yii::app()->createUrl("fileMasuk/delete", array("id"=>$data->id))',
		//'visible'=>ApplikasiKomponen::hak_akses()->hapus,
	),
	
)
),
),
)); ?>
</section>
<?php 
Yii::app()->clientScript->registerScript('js', "
$('#disposisi').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').hide();
		$('#dialog2').modal('show'); 
		waitingDialog.hide();
	});
	return false;
});
$('#upload').click(function(){
	waitingDialog.show();

	url = $(this).attr('href');
	evt = '<form method=\'post\' enctype=\'multipart/form-data\' action=\''+url+'\'><div class=\'col-md-5\'><div class=\'form-group\'><label>Pilih File  :</label></div></div><div class=\'col-md-9\'><div class=\'form-group\'><input required type=\'file\' name=\'dokumen\' required><input type=\'hidden\' value=\'go\' name=\'act\'></div></div><div class=\'col-md-4\'><label>Nama Dokumen</label><input required type=\'text\' name=\'nama_dokumen\' class=\'form-control\'></div><div class=\'clear\'></div><div class=\'col-md-6\'><label>Keterangan</label><textarea name=\'keterangan\' class=\'form-control\'></textarea><br></div><div class=\'col-md-12\'><div class=\'form-group\'><button type=\'submit\' class=\'btn btn-success\'>Upload</button></div></div></form>';
	$('#dialog2 #modal_content').html(evt);
	$('#dialog2 #tombolaksi').hide();
	$('#dialog2').modal('show'); 
	waitingDialog.hide();
	return false;
});");
?>