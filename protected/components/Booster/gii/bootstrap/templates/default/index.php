<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah <?php echo $this->class2name($this->modelClass); ?>','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage <?php echo $this->class2name($this->modelClass); ?>','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1><?php echo $label; ?></h1>
</section>
<section class="content">
<?php echo "<?php"; ?> $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>