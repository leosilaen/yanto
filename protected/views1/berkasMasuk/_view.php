<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penerima')); ?>:</b>
	<?php echo CHtml::encode($data->penerima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_berkas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('riwayat_berkas_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->riwayat_berkas_terakhir); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_berkas')); ?>:</b>
	<?php echo CHtml::encode($data->status_berkas); ?>
	<br />

	*/ ?>

</div>