<?php
$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-grid', {
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
		<div class="muted pull-left"><h4>Manage Admins</h4></div>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->theme->baseUrl . "/css/gridview.css",
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'id', 'filter'=>false)
,		'username',
		'name',
		'email',
		'phone',
		/*
		'address',
		*/
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