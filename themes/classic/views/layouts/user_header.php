<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>

            </div>
        </div>
    </header>
<div class="navbar navbar-inverse set-radius-zero header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="<?php echo Yii::app()->baseUrl?>/themes/classic/assets/img/logo.png" width=100 />
                </a>
				
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
				
                    <ul class="nav">
	
                        <li class="dropdown">
						<h5 class='title_header'><?php echo Yii::app()->name?></h5>
							
                            <a class="pull-left dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
							<?php 
							
							if(!Yii::app()->user->isGuest)
							{
							?>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    
                                    <div class="media-body">
                                        <h4 class="media-heading">
										<?php echo Yii::app()->user->name?></h4>
                                       

                                    </div>
                                </div>
                                
								
								<a href="index.php?r=site/logout" class="col-md-12 btn btn-danger btn-sm">Logout</a>
                            </div>
							<?php }?>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>