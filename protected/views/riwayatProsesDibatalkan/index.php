<?php
$this->breadcrumbs=array(
	'Riwayat Proses Dibatalkan',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Riwayat Proses Dibatalkan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Riwayat Proses Dibatalkan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Riwayat Proses Dibatalkan</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>