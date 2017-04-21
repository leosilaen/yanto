<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('durasi_urgent')); ?>:</b>
	<?php echo CHtml::encode($data->durasi_urgent); ?>
	<br />


</div>