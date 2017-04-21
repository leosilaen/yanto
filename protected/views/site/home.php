
<!-- Right side column. Contains the navbar and content of the page -->
<div class="col-md-12">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php //echo Yii::app()->name?>
        </h1>
        
    </section>
    
    <section class="content">
      
        <div class="clear"></div>
       <div class="dashboard">
          <h2 class="dashboard-heading">Selamat Datang di <br><strong><?php echo Yii::app()->name?></strong><br><small><?php echo Yii::app()->params->company?></small></h2>
          <p>

          </p>
        </div>
<div  style='border:1px solid #eee !important;padding: 10px !important'>
<section class="content-header">
<h4>Cari Posisi Dokumen </h4>
</section>
<section class="content">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
  'id'=>'berkas-masuk-form',
  'enableAjaxValidation'=>false,
  'method'=>'get',
)); ?>


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
    </section><!-- /.content -->
</div>
</div><!-- /.right-side -->

<!-- <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>    -->
