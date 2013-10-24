<div class="row-fluid">
<!-- block -->
	<div class="block">
<?php
$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	$model->name,
);

?>

	<div class="navbar navbar-inner block-header">
		<div class="muted pull-left"><h4>View LeftMenu #<?php echo $model->id; ?></h4></div>
	</div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class'=>'table table-striped table-bordered table-view',
	),	
	'attributes'=>array(
		'id',
		'name',
		'url',
		'sort',
		array('value'=>$model->topMenu?$model->topMenu->name:'','name'=>'topMenu'),
		'controller',
	),
)); ?>

	<div class="form-actions">
	<a href="<?php echo $this->createUrl('update',array('id'=>$model->id ))?>" class="btn btn-primary">Update</a>
	<a href="<?php echo $this->createUrl('delete',array('id'=>$model->id ))?>" onclick="return confirm('Are you sure you want to Delete this?')" class="btn btn-primary">Delete</a>
	<a href="<?php echo $this->createUrl('index')?>" class="btn btn-primary">Back</a>
	</div>
	</div>
</div>