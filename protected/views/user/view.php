<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('User'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List User','url'=>array('index')),
array('label'=>'Tambah User','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit User','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data User','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View User</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nama_pengguna',
		'nip',
		'email',
		'no_telp',
		'username',
		//'password',
		//'password_md5',
		'level',
		'status',
),
)); ?>
</section>