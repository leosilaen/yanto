<?php
$this->breadcrumbs=array(
	'Riwayat Alur Berkas',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Riwayat Alur Berkas','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Riwayat Alur Berkas','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Riwayat Alur Berkas</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>