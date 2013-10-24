<?php
$this->breadcrumbs=array(
	'Left Menus',
);

$this->menu=array(
	array('label'=>'Create LeftMenu', 'url'=>array('create')),
	//array('label'=>'Manage LeftMenu', 'url'=>array('admin')),
);
?>

<h1>Left Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
