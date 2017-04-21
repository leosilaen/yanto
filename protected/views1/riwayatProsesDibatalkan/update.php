<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Riwayat Proses Dibatalkan'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Riwayat Proses Dibatalkan','url'=>array('index')),
	array('label'=>'Tambah Riwayat Proses Dibatalkan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Riwayat Proses Dibatalkan','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Riwayat Proses Dibatalkan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Riwayat Proses Dibatalkan</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>