<?php
$this->breadcrumbs=array(
	'Persons'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Person', 'url'=>array('index')),
	array('label'=>'Create Person', 'url'=>array('create')),
	array('label'=>'View Person', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<h1>Update Person <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>