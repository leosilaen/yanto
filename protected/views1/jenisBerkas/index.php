<?php
$this->breadcrumbs=array(
	'Jenis Berkas',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Jenis Berkas','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Jenis Berkas','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Jenis Berkas</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>