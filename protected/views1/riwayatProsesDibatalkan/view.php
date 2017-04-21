<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Riwayat Proses Dibatalkan'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Riwayat Proses Dibatalkan','url'=>array('index')),
array('label'=>'Tambah Riwayat Proses Dibatalkan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Riwayat Proses Dibatalkan','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Riwayat Proses Dibatalkan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Riwayat Proses Dibatalkan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Riwayat Proses Dibatalkan</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_berkas',
		'tanggal_dibatalkan',
		'keterangan',
		'pemeriksa',
),
)); ?>
</section>