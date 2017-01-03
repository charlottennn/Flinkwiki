<?php
/* @var $this FlinkerInternController */
/* @var $model FlinkerIntern */

$this->breadcrumbs=array(
	'Flinker Interns'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FlinkerIntern', 'url'=>array('index')),
	array('label'=>'Create FlinkerIntern', 'url'=>array('create')),
	array('label'=>'Update FlinkerIntern', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FlinkerIntern', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlinkerIntern', 'url'=>array('admin')),
);
?>

<h1>View FlinkerIntern #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'description',
		'section',
	),
)); ?>
