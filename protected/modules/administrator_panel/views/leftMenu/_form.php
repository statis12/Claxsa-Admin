<div class="block-content collapse in">
    <div class="span12">
		 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'left-menu-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
)); ?>
<fieldset>
<legend>Fields with <span class="required">*</span> are required.</legend>

		<div class="control-group">
			<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'name'); ?>
</span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'url', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>150)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'url'); ?></span>
		</div>
		</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'sort', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'sort'); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'sort'); ?>
</span>
		</div>
		</div>

<div class="control-group">
<?php echo $form->labelEx($model,'top_menu_id', array('class'=>'control-label')); ?>
<div class="controls">
<?php echo $form->dropDownlist($model,'top_menu_id', 

			(CHtml::listData(TopMenu::model()->findAll(),'id','name')),
			array(
			'empty'=>'--Choose one--',
			'class'=>'chzn-select',
			//'ajax' => array(
			//	'type'=>'POST', 
			///	'url'=>CController::createUrl('dataPokok/ambilkotan'), 
			//	'data' => 'js:{nasabah:$(this).val()}',
			//	'update'=>'#DataPokok_id_city', 
			//	),
			)); ?>
</div>
</div>
		<div class="control-group">
			<?php echo $form->labelEx($model,'controller', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'controller',array('size'=>60,'maxlength'=>100)); ?>
			<span class="help-inline text-error"><?php echo $form->error($model,'controller'); ?>
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
