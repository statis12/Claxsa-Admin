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
		<div class="muted pull-left"><h4>View Admin #<?php echo $model->id; ?></h4></div>
	</div>
<br/>
<fieldset>
<legend></legend>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
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

</fieldset>
	<br/>
	<div class="form-actions">
	<a href="<?php echo $this->createUrl('update',array('id'=>$model->id ))?>" class="btn btn-primary">Update</a>
	<a href="<?php echo $this->createUrl('delete',array('id'=>$model->id ))?>" onclick="return confirm('Are you sure you want to Delete this?')" class="btn btn-primary">Delete</a>
	<a href="<?php echo $this->createUrl('index')?>" class="btn btn-primary">Back</a>
	</div>
	</div>
</div>