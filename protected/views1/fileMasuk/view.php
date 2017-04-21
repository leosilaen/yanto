<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('File Masuk'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List File Masuk','url'=>array('index')),
array('label'=>'Tambah File Masuk','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit File Masuk','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus File Masuk','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data File Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View File Masuk</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_berkas',
		'nama_dokumen',
		'keterangan',
		'nama_file',
),
)); ?>
</section>