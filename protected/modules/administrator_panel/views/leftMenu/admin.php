<?php
$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('left-menu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row-fluid">
<!-- block -->
	<div class="block">
	<div class="navbar navbar-inner block-header">
		<div class="muted pull-left"><h4>Manage Left Menus</h4></div>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'left-menu-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->theme->baseUrl . "/css/gridview.css",
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'id', 'filter'=>false)
,		'name',
		'url',
		'sort',
		array('name'=>'top_menu_id','value'=>'$data->topMenu?$data->topMenu->name:""','filter'=>CHtml::listData(TopMenu::model()->findAll(), 'id', 'name')),
		'controller',
		array(
			'class'=>'CButtonColumn',
		),
		/*
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{email}{down}{delete}',
		    'buttons'=>array
		    (
		        'email' => array
		        (
		            'label'=>'Send an e-mail to this user',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),
		        'down' => array
		        (
		            'label'=>'[-]',
		            'url'=>'"#"',
		            'visible'=>'$data->score > 0',
		            'click'=>'function(){alert("Going down!");}',
		        ),
		    ),
		),		
		*/
	),
)); ?>
	<div class="form-actions">	
		<a href="<?php echo $this->createUrl('create')?>" class="btn btn-danger">Create</a>	
	</div>
	</div>
</div>