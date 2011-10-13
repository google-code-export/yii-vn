<?php
$this->breadcrumbs=array(
	'Persons',
);

$this->menu=array(
	array('label'=>'Create Person', 'url'=>array('create')),
	array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<h1>Persons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
