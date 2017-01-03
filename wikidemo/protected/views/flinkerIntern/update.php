<?php
/* @var $this FlinkerInternController */
/* @var $model FlinkerIntern */

$this->breadcrumbs=array(
	'Flinker Interns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlinkerIntern', 'url'=>array('index')),
	array('label'=>'Create FlinkerIntern', 'url'=>array('create')),
	array('label'=>'View FlinkerIntern', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FlinkerIntern', 'url'=>array('admin')),
);
?>

<h1>Update FlinkerIntern <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>