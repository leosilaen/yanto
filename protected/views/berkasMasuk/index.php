<?php
$this->breadcrumbs=array(
	'Berkas Masuk',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Berkas Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Berkas Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Berkas Masuk</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>