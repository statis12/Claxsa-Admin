<div class="block-content collapse in">
    <div class="span12">
		 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
)); ?>
<fieldset>
<legend>Fields with <span class="required">*</span> are required.</legend>

		<div class="control-group">
			<?php echo $form->labelEx($model,'username', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>80)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'username'); ?></span>
		</div>
		</div>
		
		<?php if (!$model->isNewRecord) : ?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'current_password', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'current_password',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'current_password'); ?></span>
		</div>
		</div>
        <?php endif; ?>
			
		<div class="control-group">
			<?php echo $form->labelEx($model,'new_password', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'new_password'); ?></span>
		</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'confirm_password', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'confirm_password',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'confirm_password'); ?></span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'name'); ?></span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'email'); ?></span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'phone', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'phone'); ?></span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'address', array('class'=>'control-label', 'for'=>'textarea2')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'address',array('class'=>'input-xlarge textarea', 'style'=>'width: 710px; height: 200px')); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'address'); ?>
</span>
		</div>
		</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
		<button type="reset" class="btn">Cancel</button>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
	</div>
</div>
