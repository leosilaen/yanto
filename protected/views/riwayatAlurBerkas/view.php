<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Data Berkas'=> array('akuntansi'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Riwayat Alur Berkas','url'=>array('index')),
//array('label'=>'Tolak Permohonan','url'=>array('riwayatProsesDibatalkan/create','id_berkas'=>$model->id_berkas),'buttonType'=> 'link','context' => 'danger','visible'=>!$model->status_tolak,'htmlOptions'=>array('id'=>'tolak_permohonan')),
//array('label'=>'Disposisi','url'=>array('RiwayatAlurBerkas/CreateFromAkuntansi','id_berkas'=>$model->id_berkas,'id'=>$model->id),'buttonType'=> 'link','context' => 'info','visible'=>!$model->status_tolak,'htmlOptions'=>array('id'=>'disposisi')),
//array('label'=>'Edit Riwayat Alur Berkas','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Riwayat Alur Berkas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
//array('label'=>'Data Riwayat Alur Berkas','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1><small>View Data Berkas</small> <strong><?php echo $model->berkas->nomor_berkas?></strong></h1>
</section>
<section class="content">
<div class="col-md-12">
<?php 
$this->widget('booster.widgets.TbAlert', array(
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
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
		'berkas.nomor_berkas',
		'berkas.nomor_spm',
		'berkas.skpd_.skpd',
		'berkas.jenis_berkas_.jenis_berkas',
		'posisi_berkas',
		'tanggal_diterima',
		'tanggal_dikirimkan',
		array(
			'label'=>'Penerima',
			'name'=>'penerima_.nama_pengguna'
		),
		//'pengirim',
		'keterangan',
),
)); ?>
<br><small>Untuk setiap dokumen masuk di bidang akuntansi, durasi maksimal adalah 6 jam.</small>
</section>
<section class="content-header">Unggahan Berkas 

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

),
)); ?>
</section>
<?php 
Yii::app()->clientScript->registerScript('js', "
	$('#tolak_permohonan').click(function(){
		url = $(this).attr('href');
		$.post(url,function(evt){
			$('#dialog2 #modal_content').html(evt);
			$('#dialog2 #tombolaksi').hide();
			$('#dialog2').modal('show'); 
			waitingDialog.hide();
		});
		return false;
	});
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
");
?>