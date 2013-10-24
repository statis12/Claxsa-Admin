
	<h3><?php echo ucwords(Yii::app()->name);?> - Login</h3>
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions' => array(
					'class' => 'niceform'
			), 
	)); ?>
			
			<?php echo $form->textField($model,'username',
					array(
						'size'=>'54',
						'maxlength'=>'30',
						'class'=>'span3',
						'data-toggle'=>"popover",
						'data-placement'=>"top",
						'data-content'=>"Please Input Username",
						'placeholder'=>"username",
					)
			); ?>
			<span class="errorMessage"><?php echo $form->error($model,'username'); ?><br/></span>
			
			<?php echo $form->passwordField($model,'password',
					array(
						'size'=>'54',
						'maxlength'=>'30',
						'class'=>'span3',
						'data-toggle'=>"popover",
						'data-placement'=>"top",
						'data-content'=>"Please Input Password",
						'placeholder'=>"password",					
					)
			); ?>
			<span class="errorMessage"><?php echo $form->error($model,'password'); ?><br/></span>
			<?php echo CHtml::submitButton('Login', array('id'=>'login', 'class'=>'btn btn-primary btn-block')); ?>


	<?php $this->endWidget(); ?>
	<?php echo CHtml::link('Forgot password', array('default/forgot'), array('class'=>'forgot_pass', 'style'=>'font-weight:bold')); ?> 
          