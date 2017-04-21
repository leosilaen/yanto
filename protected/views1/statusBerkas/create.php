<?php
/* @var $this StatusBerkasController */
/* @var $model StatusBerkas */

$this->breadcrumbs=array(
	'Status Berkases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusBerkas', 'url'=>array('index')),
	array('label'=>'Manage StatusBerkas', 'url'=>array('admin')),
);
?>

<h1>Create StatusBerkas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>