<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Berkas Masuk'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Berkas Masuk','url'=>array('index')),
	array('label'=>'Tambah Berkas Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Berkas Masuk','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Berkas Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Berkas Masuk</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>