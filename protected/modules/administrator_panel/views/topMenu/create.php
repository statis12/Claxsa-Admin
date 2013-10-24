<?php
$this->breadcrumbs=array(
	'Top Menus'=>array('index'),
	'Create',
);

?>
<div class="row-fluid">
<!-- block -->
	<div class="block">
	<div class="navbar navbar-inner block-header">
		<div class="muted pull-left"><h4>Create Top Menus</h4></div>
	</div>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>