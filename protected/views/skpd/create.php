<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('User'=> array('admin'),
        'Tambah SKPD',
),
		
    )
);

$this->menu=array(
//array('label'=>'List User','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data SKPD','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form SKPD</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>