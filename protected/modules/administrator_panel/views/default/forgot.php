<h3><?php echo ucwords(Yii::app()->name);?> - Forgot Password</h3>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgot-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class' => 'niceform'
	), 
)); ?>

		<?php echo $form->textField($model,'email',
			array(
				'size'=>'54',
				'maxlength'=>'30',
				'class'=>'span3',
				'data-toggle'=>"popover",
				'data-placement'=>"top",
				'data-content'=>"Please Input Email",
				'placeholder'=>"email",	
			)
		); ?>

		<?php echo CHtml::submitButton('Enter', array('id'=>'login', 'class'=>'btn btn-primary btn-block')); ?>


<?php $this->endWidget(); ?>
