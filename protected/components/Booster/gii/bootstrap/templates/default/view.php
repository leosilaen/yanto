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
        'Lihat Data',),		
    )
);\n";
?>

$this->menu=array(
//array('label'=>'List <?php echo $this->class2name($this->modelClass); ?>','url'=>array('index')),
array('label'=>'Tambah <?php echo $this->class2name($this->modelClass); ?>','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit <?php echo $this->class2name($this->modelClass); ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus <?php echo $this->class2name($this->modelClass); ?>','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data <?php echo $this->class2name($this->modelClass); ?>','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View <?php echo $this->class2name($this->modelClass) ; ?></h1>
</section>
<section class="content">
<?php echo "<?php"; ?> $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
	echo "\t\t'" . $column->name . "',\n";
}
?>
),
)); ?>
</section>