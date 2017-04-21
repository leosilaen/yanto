<section class="content-header">
<h1>Cari Posisi Dokumen </h1>
</section>
<section class="content">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'berkas-masuk-form',
	'enableAjaxValidation'=>false,
	'method'=>'get',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	
	<div class="col-md-4">
		<?php echo $form->textFieldGroup($model,'nomor_berkas',array('widgetOptions'=>array('htmlOptions'=>array('required'=>'required','class'=>'span5','maxlength'=>20)))); ?>
	</div>
	<!--<div class='col-md-5'>
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
	-->
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Cari',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</section>