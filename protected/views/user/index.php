<?php
$this->breadcrumbs=array(
	'User',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah User','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage User','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>User</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>