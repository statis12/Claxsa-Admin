<?php
$this->breadcrumbs=array(
	'Top Menus',
);

$this->menu=array(
	array('label'=>'Create TopMenu', 'url'=>array('create')),
	//array('label'=>'Manage TopMenu', 'url'=>array('admin')),
);
?>

<h1>Top Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
