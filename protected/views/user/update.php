<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('User'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List User','url'=>array('index')),
	array('label'=>'Tambah User','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View User','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data User','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit User</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>