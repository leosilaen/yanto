<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->id_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->nama_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_file')); ?>:</b>
	<?php echo CHtml::encode($data->nama_file); ?>
	<br />


</div>