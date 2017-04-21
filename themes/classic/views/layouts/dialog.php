<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title><?php echo Yii::app()->name?></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/css/style.css" rel="stylesheet" />

</head>
<body>
   
    <!-- MENU SECTION END-->
  
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                   
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>
				</div>
				
            </div>
            
           
                </div>
        
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php require_once('footer.php')?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!--<script src="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/js/jquery-1.11.1.js"></script>-->
    <!-- BOOTSTRAP SCRIPTS  -->
   <!-- <script src="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/js/bootstrap.js"></script>-->
</body>
</html>

