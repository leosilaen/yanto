<?php
$this->breadcrumbs=array(
	'Skpd',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah SKPD','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage User','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>SKPD</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>