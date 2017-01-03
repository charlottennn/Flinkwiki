<?php
/* @var $this FlinkerInternController */
/* @var $model FlinkerIntern */

$this->breadcrumbs=array(
	'Flinker Interns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlinkerIntern', 'url'=>array('index')),
	array('label'=>'Manage FlinkerIntern', 'url'=>array('admin')),
);
?>

<h1>Create FlinkerIntern</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>