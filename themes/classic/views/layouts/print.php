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
    <link href="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/css/print.css" rel="stylesheet" />

</head>
<body>
   <?php echo $content; ?>
    
</body>
</html>
