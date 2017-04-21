<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Data Proses Kepala Dinas'),
		
    )
);


Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('riwayat-alur-berkas-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Proses Kepala Dinas</h1>


	<?php
$this->breadcrumbs=array(
		'Beranda'=>array('index'),
		'Manage',
	);?>


</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'riwayat-alur-berkas-grid',
'dataProvider'=>$model->searchKadis(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
			
		//'id_berkas',
		'nomor_berkas',
		'nomor_spm',
		'tanggal_masuk',
		'tgl_dokumen_selesai',
		'jenis_berkas_.jenis_berkas',
		'skpd_.skpd',
		/*
		'pengirim',
		'keterangan',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
