<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->id_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posisi_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->posisi_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_diterima')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_diterima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_dikirimkan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_dikirimkan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penerima')); ?>:</b>
	<?php echo CHtml::encode($data->penerima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengirim')); ?>:</b>
	<?php echo CHtml::encode($data->pengirim); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>