<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php

echo "<?php\n";
$label = $this->class2name($this->modelClass);
echo "\$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('$label'=> array('admin'),
        'Tambah Data',
),
		
    )
);\n";
?>

$this->menu=array(
//array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data <?php echo $this->class2name($this->modelClass); ?>','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form <?php echo $this->class2name($this->modelClass); ?></h1>
</section>
<section class="content">
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</section>