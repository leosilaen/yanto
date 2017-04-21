<?php
/* @var $this StatusBerkasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Berkases',
);

$this->menu=array(
	array('label'=>'Create StatusBerkas', 'url'=>array('create')),
	array('label'=>'Manage StatusBerkas', 'url'=>array('admin')),
);
?>

<h1>Status Berkases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
