<?php
$this->breadcrumbs=array(
	'Top Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>
<div class="row-fluid">
<!-- block -->
	<div class="block">
	<div class="navbar navbar-inner block-header">
		<div class="muted pull-left"><h4>Update Top Menus #<?php echo $model->id; ?></h4></div>
	</div>
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>