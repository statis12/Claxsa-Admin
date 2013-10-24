<div class="row-fluid">
<!-- block -->
	<div class="block">
<?php
$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->name,
);

?>

	<div class="navbar navbar-inner block-header">
		<div class="muted pull-left"><h4>View Admin # <?php echo $model->username; ?></h4></div>
	</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class'=>'table table-striped table-bordered table-view',
	),
	'attributes'=>array(
		'username',
		'password',
		'name',
		'email',
		'phone',
		'address',
		'created_date',
		'modified_date',
	),
)); ?>

	<div class="form-actions">
	<a href="<?php echo $this->createUrl('update',array('id'=>$model->id ))?>" class="btn btn-primary">Update</a>
	<a href="<?php echo $this->createUrl('index')?>" class="btn btn-primary">Back</a>
	</div>
	</div>
</div>