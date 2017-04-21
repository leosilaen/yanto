<?php
/* @var $this StatusBerkasController */
/* @var $model StatusBerkas */

$this->breadcrumbs=array(
	'Status Berkases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusBerkas', 'url'=>array('index')),
	array('label'=>'Create StatusBerkas', 'url'=>array('create')),
	array('label'=>'View StatusBerkas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatusBerkas', 'url'=>array('admin')),
);
?>

<h1>Update StatusBerkas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>