<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('File Masuk'=> array('admin'),
        'Tambah Data',
),
		
    )
);

$this->menu=array(
//array('label'=>'List FileMasuk','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data File Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form File Masuk</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>