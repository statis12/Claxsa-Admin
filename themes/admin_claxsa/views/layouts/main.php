<!DOCTYPE html>
<html>
    
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" rel="stylesheet" media="screen">
		 <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5.js"></script>
        <![endif]-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo ucwords(Yii::app()->name);?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords(Admin::model()->findByPk(Yii::app()->getModule('administrator_panel')->user->id)->name);?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo Yii::app()->createUrl("administrator_panel/admin/profile")?>">Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl("administrator_panel/default/logout")?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="<?php echo Yii::app()->controller->id=="default"?"active":""?>">
                                <a href="<?php echo Yii::app()->createUrl("administrator_panel/default")?>">Home</a>
                            </li>
							<?php 
								$criteria=new CDbCriteria();
								$criteria->order='sort ASC';
								$TopMenus = TopMenu::model()->findAll($criteria);
								
								foreach($TopMenus as $TopMenu):
								$url = $TopMenu->getFirstParentUrl();
								if(!empty($url))
									$firstUrl = Yii::app()->createurl('administrator_panel/'.$url);
								else
									$firstUrl = "#";
							?>
                            <li <?php echo $TopMenu->getParentIsActive(Yii::app()->controller->id);?>>
                                <a href="<?php echo $firstUrl?>"><?php echo $TopMenu->name;?></a>
                            </li>							
							<?php endforeach;?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php
					$span = true;
					if(Yii::app()->controller->id!="default"):
					$span = false;
				?>
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
						<?php echo LeftMenu::model()->getLeftMenu(Yii::app()->controller->id);?>
                    </ul>
                </div>
				<?php endif;?>
				
                <!--/span-->
                <div class="<?php echo $span?"span12":"span9"?>" id="content">
	
				<?php if(Yii::app()->user->hasFlash('info')):?>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo Yii::app()->user->getFlash('info'); ?>
					</div>
					<?php
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".alert-info").animate({opacity: 1.0}, 10000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
					?>
				<?php endif; ?>
				<?php if(Yii::app()->user->hasFlash('error')):?>
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo Yii::app()->user->getFlash('error'); ?>
					</div>
					<?php
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".alert-error").animate({opacity: 1.0}, 10000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
					?>
				<?php endif; ?>
				<?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo Yii::app()->user->getFlash('success'); ?>
					</div>
					<?php
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".alert-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
					?>
				<?php endif; ?>

							
				<div class="navbar">
					<div class="navbar-inner">
					<?php if(isset($this->breadcrumbs)):
					 
						if ( Yii::app()->controller->route !== 'site/index' )
							$this->breadcrumbs = array_merge(array (Yii::t('zii','Home')=>Yii::app()->homeUrl), $this->breadcrumbs);
					 
						$this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
							'homeLink'=>false,
							'tagName'=>'ul',
							'separator'=>'',
							'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
							'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
							'htmlOptions'=>array ('class'=>'breadcrumb')
						)); ?><!-- breadcrumbs -->
						<?php endif; ?>
					</div>
				</div>
				
				<?php echo $content; ?>

                </div>
            </div>
            <hr>
            <footer>
                <p><?php echo Yii::app()->params["copyright"]?></p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
		<?php
			$cs = Yii::app()->clientScript;
			$cs->scriptMap = array(
			'jquery.js' => Yii::app()->theme->baseUrl.'/vendors/jquery-1.9.1.js',
			);
			$cs->registerCoreScript('jquery');
		?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery.uniform.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/chosen.jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>
        <script>
        $(function() {
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();
			$('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>