<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php

echo "<?php\n";
$label =$this->class2name($this->modelClass);
echo "\$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('$label'),
		
    )
);\n";
?>
$this->menu=array(
//array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Tambah <?php echo $this->class2name($this->modelClass); ?>','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data <?php echo $this->class2name($this->modelClass); ?></h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
	echo "<?php\n";
	$label = $this->class2name($this->modelClass);
	echo "\$this->breadcrumbs=array(
		'$label'=>array('index'),
		'Manage',
	);?>\n";
	?>

<div class="search-form" style="display:none">
	<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->
</section>
<section class="content">
<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
	<?php
	$count = 0;
	foreach ($this->tableSchema->columns as $column) {
		if (++$count == 7) {
			echo "\t\t/*\n";
		}
		echo "\t\t'" . $column->name . "',\n";
	}
	if ($count >= 7) {
		echo "\t\t*/\n";
	}
	?>
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
