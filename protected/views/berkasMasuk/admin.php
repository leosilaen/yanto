<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Berkas Masuk'),
		
    )
);
$this->menu=array(
//array('label'=>'List BerkasMasuk','url'=>array('index')),
array('label'=>'Tambah Berkas Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('berkas-masuk-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Berkas Masuk</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	
</section>
<section class="content">
<div class="filter">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'hasil-pemeriksaan-form',
	'enableAjaxValidation'=>false,'action'=>"index.php?r=berkasMasuk/admin",'method'=>'get'
	//'htmlOptions'=>array('action'=>"index.php?r=hasilPemeriksaan/view",'method'=>'get')
)); ?>
<div class='col-md-4'>
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
<div class='col-md-4'>
<input type='hidden' name='id' value='<?php echo $model->id?>'>
			<?php echo $form->datePickerGroup($new_filter,'tanggal_masuk',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?> 
</div>
<div class="form-actions col-md-3">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Filter',
		)); ?>
	<a href='index.php?r=berkasMasuk/admin' class='btn btn-danger'><i class='glyphicon glyphicon-remove-sign'></i> Clear</a>
</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>
</div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'berkas-masuk-grid',
'dataProvider'=>$model->search(),
'rowCssClassExpression'=>'"status".$data->status_berkas',
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'nomor_berkas',
		'nomor_spm',
		'tanggal_masuk',

		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->skpd',
			'filter'=> CHtml::listData(skpd::model()->findAll(array('order'=>'skpd')), 'id', 'skpd'),
			//'visible'=>Yii::app()->user->isAdminBappeda()
		),
		
		'keterangan',
		'jenis_berkas_.jenis_berkas',
		//'penerima_.nama_pengguna',
		/*
		'riwayat_berkas_terakhir',
		'status_berkas',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
