<?php
/* @var $this StatusBerkasController */
/* @var $model StatusBerkas */

$this->breadcrumbs=array(
	'Status Berkases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusBerkas', 'url'=>array('index')),
	array('label'=>'Create StatusBerkas', 'url'=>array('create')),
	array('label'=>'Update StatusBerkas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatusBerkas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusBerkas', 'url'=>array('admin')),
);
?>

<h1>View StatusBerkas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
	),
)); ?>
