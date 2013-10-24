<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
       <title><?php echo ucwords(Yii::app()->name);?> - Administator Login</title>
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/html5.js"></script>
        <![endif]-->
    </head>
    <body>
    
	<noscript>
	<style type="text/css">
	    .container {display:none;}
	</style>
	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/nojavascript.jpg" alt="Javascript not enabled" />
	</noscript>
	
   <div class="container login"> 
    <div class="span3">     
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
	  	 <!-- Username -->
		<?php
			echo $content
		?>
        	
 	
		</div>     
    </div>     
	<footer>
        <p><?php echo Yii::app()->params["copyright"]?></p>
    </footer>
		<?php
			$cs = Yii::app()->clientScript;
			$cs->scriptMap = array(
			'jquery.js' => Yii::app()->theme->baseUrl.'/vendors/jquery-1.9.1.js',
			);
			$cs->registerCoreScript('jquery');
		?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery.uniform.min.js"></script>
	
		<script>
		$(function() {
			
			$('input').popover({
				 trigger : 'hover'
			});
		});
	    </script>
    </body>
</html>