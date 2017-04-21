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
<div class="filter">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'hasil-pemeriksaan-form',
	'enableAjaxValidation'=>false,'action'=>"index.php?r=riwayatAlurBerkas/perbendaharaan",'method'=>'get'
	//'htmlOptions'=>array('action'=>"index.php?r=hasilPemeriksaan/view",'method'=>'get')
)); ?>
<div class='col-md-3'>
<input type='hidden' name='id' value='<?php echo $model->id?>'>
<?php echo $form->textFieldGroup($new_filter,'nomor_berkas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
</div>
<div class='col-md-3'>
	<div class='form-group'>
		<?php echo $form->dropdownList($new_filter,'jenis_berkas',CHtml::listData(JenisBerkas::model()->findAll(array('order'=>'jenis_berkas')),
								'id','jenis_berkas'),
								
								array(
								'id'=>'jenis_berkas',
								'class'=>'form-control',
								'prompt'=>'---Pilih ---',
								)); 
		 ?> 
	</div>
</div>

<div class='col-md-3'>
<input type='hidden' name='id' value='<?php echo $model->id?>'>
<?php echo $form->datePickerGroup($new_filter,'tanggal_dikirimkan',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?> 
</div>
<div class="form-actions col-md-3">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Filter',
		)); ?>&nbsp;
<a href='index.php?r=riwayatAlurBerkas/perbendaharaan' class='btn btn-danger'><i class='glyphicon glyphicon-remove-sign'></i> Clear</a>
</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>
</div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'riwayat-alur-berkas-grid',
'dataProvider'=>$model->search(),
'rowCssClassExpression'=>'"status".$data->status',
'filter'=>null,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'berkas.nomor_berkas',
		'jam_proses',
		array(
			'header'=>'Tanggal Disposisi',
			'name'=>'tanggal_dikirimkan',
		),
		array(
			'header'=>'Tanggal Disposisi Diterima',
			'name'=>'tanggal_diterima',
		),
		'keterangan',
		'berkas.jenis_berkas_.jenis_berkas',
		'status',
		
		/*
		'pengirim',
		'keterangan',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
//'template'=>'{view}{Verifikasi}{Terima Disposisi}{Tolak Permohonan}',
'template'=>'{view}{Terima Disposisi}{Verifikasi}{Disposisi}',
'buttons'=>array(
	'view'=>array(
		'icon'=>'glyphicon glyphicon-eye-open',
		'url'=>'Yii::app()->createUrl("riwayatAlurBerkas/viewBendahara", array("id"=>$data->id))',
		'options'=>array(
			'class'=>'button_column',
		)
	),
	'Verifikasi'=>array(
		'icon'=>'glyphicon glyphicon-list-alt',
		'url'=>'Yii::app()->createUrl("riwayatAlurBerkas/verifikasiBendahara", array("id"=>$data->id))',
		'visible'=>'!$data->status_verifikasi ',
		'options'=>array(
			'class'=>'button_column',
		)
	),
	'Disposisi'=>array(
		'icon'=>'glyphicon glyphicon-pushpin',
		'url'=>'Yii::app()->createUrl("RiwayatAlurBerkas/CreateFromBendahara", array("id_berkas"=>$data->id_berkas,"id"=>$data->id))',
		'visible'=>'$data->status_disposisi',
		'options'=>array(
			'id'=>'disposisi',
			'class'=>'button_column',
		)
	),
	'Terima Disposisi'=>array(
		'icon'=>'glyphicon glyphicon-ok-sign',
		'url'=>'Yii::app()->createUrl("riwayatAlurBerkas/terimaBendahara", array("id"=>$data->id))',
		'visible'=>'!$data->status_terima_disposisi',
		'options'=>array(
			'id'=>'terima_disposisi',
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