<?php
/* @var $this LeasingTermController */
/* @var $model LeasingTerm */

$this->breadcrumbs=array(
	'Leasingtermer'=>array('index'),
	'Skapa',
);

$this->menu=array(
	array('label'=>'Lista Termer', 'url'=>array('index')),
	array('label'=>'Hantera Ordlista', 'url'=>array('admin')),
);
?>

<h1>Skapa Leasingterm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>