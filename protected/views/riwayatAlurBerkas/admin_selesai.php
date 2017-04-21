<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Data Berkas'),
		
    )
);
$this->menu=array(
//array('label'=>'List RiwayatAlurBerkas','url'=>array('index')),
	//array('label'=>'Tambah Riwayat Alur Berkas','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

");
?>
<section class="content-header">
<h1>Data Berkas</h1>


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
        'error' => array('closeText' => 'AAARGHH!!')
    ),
));
?>
</div>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'riwayat-alur-berkas-grid',
'dataProvider'=>$model->searchSelesai(),
'rowCssClassExpression'=>'"status".$data->status',
'filter'=>null,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'berkas.nomor_berkas',
		'berkas.nomor_spm',
		'berkas.skpd_.skpd',
		array(
			'header'=>'Tanggal Disposisi',
			'name'=>'tanggal_dikirimkan',
		),
		'tanggal_diterima',
		'keterangan',
		'berkas.jenis_berkas_.jenis_berkas',
		/*
		'pengirim',
		'keterangan',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
//'template'=>'{view}{Verifikasi}{Terima Disposisi}{Tolak Permohonan}',
'template'=>'{view}',
'buttons'=>array(
	'view'=>array(
		'icon'=>'glyphicon glyphicon-eye-open',
		'url'=>'Yii::app()->createUrl("riwayatAlurBerkas/viewSekretariat", array("id"=>$data->id))',
		'options'=>array(
			'class'=>'button_column',
		)
	),
	
	
)
),
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