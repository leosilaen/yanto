<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->id_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_dibatalkan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_dibatalkan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pemeriksa')); ?>:</b>
	<?php echo CHtml::encode($data->pemeriksa); ?>
	<br />


</div>