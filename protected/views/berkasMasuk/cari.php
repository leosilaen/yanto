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
		<?php echo $form->textFieldGroup($model,'nomor_spm',array('widgetOptions'=>array('htmlOptions'=>array('required'=>'required','class'=>'span5','maxlength'=>250)))); ?>
	</div>
	
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Cari',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</section>