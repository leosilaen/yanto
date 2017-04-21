<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->class2name($this->modelClass);
echo "\$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('$label'=> array('admin'),
        'Edit Data',
),
		
    )
);\n";
?>

	$this->menu=array(
	//array('label'=>'List <?php echo $this->class2name($this->modelClass); ?>','url'=>array('index')),
	array('label'=>'Tambah <?php echo $this->class2name($this->modelClass); ?>','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View <?php echo $this->class2name($this->modelClass); ?>','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data <?php echo $this->class2name($this->modelClass); ?>','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit <?php echo $this->class2name($this->modelClass); ?></h1>
</section>
<section class="content">
<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>
</section>