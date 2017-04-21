<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'berkas-masuk-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'nomor_berkas'); ?>
	<div class="col-md-6">
	<?php echo $form->datePickerGroup($model,'tanggal_masuk',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?> 
	</div>
	<?php //echo $form->textFieldGroup($model,'tanggal_masuk',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<div class="col-md-6">
		<?php echo $form->textFieldGroup($model,'jam_masuk',array('widgetOptions'=>array('htmlOptions'=>array('required'=>'required','name'=>'jam_masuk','placeholder'=>'HH:MM','class'=>'span5','maxlength'=>20)))); ?>
	</div>
	<div class="clear"></div>
	<div class='col-md-6'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'jenis_berkas'); ?> 
		<?php echo $form->dropdownList($model,'jenis_berkas',CHtml::listData(JenisBerkas::model()->findAll(array('order'=>'jenis_berkas')),
								'id','jenis_berkas'),
								
								array(
								'id'=>'jenis_berkas',
								'class'=>'form-control',
								'prompt'=>'---Pilih ---',
								)); 
		 ?> 
		</div>
	</div>
	
		<?php //echo $form->textFieldGroup($model,'penerima',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
	

	<div class='col-md-6'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'skpd')),
								'id','skpd'),
								
								array(
								'id'=>'skpd',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
	</div>
	<div class="clear"></div>
	<div class="col-md-6">
		<?php echo $form->textFieldGroup($model,'nomor_spm',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	</div>
	<div class="col-md-6">
		<?php echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	

	<?php //echo $form->textFieldGroup($model,'riwayat_berkas_terakhir',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

	<?php //echo $form->textFieldGroup($model,'status_berkas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
