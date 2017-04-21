<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



<div class="form col-md-4 login-page" id="">
<img src="img/logo-kota-pematangsiantar-sumut-768x967.png" class="icon">
	<h1><span class='app_name'><?php echo Yii::app()->params->application_nickname?></span>
<br><span class="dispenda"><?php echo Yii::app()->params->company?></span></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	
	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary')); ?>
		<button class="btn btn-danger" type='reset'>Reset</button>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
