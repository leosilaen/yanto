<?php
$this->breadcrumbs=array(
	'File Masuk',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah File Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage File Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>File Masuk</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>