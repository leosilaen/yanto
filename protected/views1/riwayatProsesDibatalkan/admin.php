<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Riwayat Proses Dibatalkan'),
		
    )
);
$this->menu=array(
//array('label'=>'List RiwayatProsesDibatalkan','url'=>array('index')),
//array('label'=>'Tambah Riwayat Proses Dibatalkan','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "


");
?>
<section class="content-header">
<h1>Data Riwayat Proses Dibatalkan</h1>

</section>
<section class="content">
<div class="filter">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'hasil-pemeriksaan-form',
	'enableAjaxValidation'=>false,'action'=>"index.php?r=riwayatProsesDibatalkan/admin",'method'=>'get'
	//'htmlOptions'=>array('action'=>"index.php?r=hasilPemeriksaan/view",'method'=>'get')
)); ?>
<div class='col-md-3'>
<input type='hidden' name='id' value='<?php echo $model->id?>'>
<?php echo $form->textFieldGroup($model,'nomor_berkas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
</div>
<div class='col-md-3'>
	<div class='form-group'>
		<?php echo $form->dropdownList($model,'jenis_berkas',CHtml::listData(JenisBerkas::model()->findAll(array('order'=>'jenis_berkas')),
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
<?php echo $form->datePickerGroup($model,'tanggal_dibatalkan',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?> 
</div>
<div class="form-actions col-md-3">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Filter',
		)); ?>&nbsp;
<a href='index.php?r=riwayatProsesDibatalkan/admin' class='btn btn-danger'><i class='glyphicon glyphicon-remove-sign'></i> Clear</a>
</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>
</div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'riwayat-proses-dibatalkan-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'filter'=>null,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'berkas.nomor_berkas',
		'berkas.jenis_berkas_.jenis_berkas',
		'tanggal_dibatalkan',
		'keterangan',
		array(
			'header'=>'Pemeriksa',
			'name'=>'pemeriksa_.nama_pengguna'
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
'template'=>'{view}{delete}',
'buttons'=>array(
	'delete'=>array(
		'icon'=>'glyphicon glyphicon-circle-arrow-left',
		'url'=>'Yii::app()->createUrl("riwayatProsesDibatalkan/delete", array("id"=>$data->id,"id_berkas"=>$data->id_berkas,"id_alur_berkas"=>$data->id_alur_berkas))',
		'options'=>array(
			'class'=>'button_column',
		)
	),
	'view'=>array(
		'icon'=>'glyphicon glyphicon-eye-open',
		'url'=>'Yii::app()->createUrl("berkasMasuk/view", array("id"=>$data->id_berkas))',
		'options'=>array(
			'class'=>'button_column',
		)
	),
)
),
),
)); ?>
</section>
