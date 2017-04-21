<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Riwayat Alur Berkas'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Riwayat Alur Berkas','url'=>array('index')),
	array('label'=>'Tambah Riwayat Alur Berkas','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Riwayat Alur Berkas','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Riwayat Alur Berkas','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Riwayat Alur Berkas</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>