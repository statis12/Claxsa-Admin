<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
	</div>

<div class="row">
<?php echo $form->labelEx($model,'top_menu_id', array('class'=>'control-label')); ?>
<?php /*echo $form->dropDownlist($model,'top_menu_id', 

			(CHtml::listData(Top_menu::model()->findAll(),'id','name')),
			array(
			'empty'=>'--Choose one--',
			//'ajax' => array(
			//	'type'=>'POST', 
			///	'url'=>CController::createUrl('dataPokok/ambilkotan'), 
			//	'data' => 'js:{nasabah:$(this).val()}',
			//	'update'=>'#DataPokok_id_city', 
			//	)
			));*/ ?>
</div>
	<div class="row">
	<?php echo $form->hiddenField($model,'top_menu_id'); ?>
	<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'LeftMenu_top_menu',
		'source'=>'js: function( request, response ) {
				$.getJSON( "/ehelp/top_menu/autocomplete", {
					term: request.term,
				}, response );
			}',
		'value'=>$model->topMenu->name,	
		'options'=>array(
	        'max'=>10,
			'minChars'=>2, 
			'delay'=>300,
			'matchCase'=>true,
	        'minLength'=>'2',
			'search'=>"js: function(event, ui) {
				$('#LeftMenu_top_menu_id').val('');
			}",		        
			'select'=>"js: function(event, ui) {
				$('#LeftMenu_top_menu_id').val(ui.item.id);
			}"
		),
		'htmlOptions'=>array('size'=>'60')
		));
		?>
	<?php echo $form->error($model,'top_menu_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'controller'); ?>
		<?php echo $form->textField($model,'controller',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->