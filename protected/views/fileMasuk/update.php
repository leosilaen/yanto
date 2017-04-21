<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('File Masuk'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List File Masuk','url'=>array('index')),
	array('label'=>'Tambah File Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View File Masuk','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data File Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit File Masuk</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>