<?php
/* @var $this LeasingTermController */
/* @var $model LeasingTerm */

$this->breadcrumbs=array(
	'Leasingtermer'=>array('index'),
	$model->title=>array('view','id'=>$model->guid),
	'Uppdatera',
);

$this->menu=array(
	array('label'=>'Lista Termer', 'url'=>array('index')),
	array('label'=>'Skapa Termer', 'url'=>array('create')),
	array('label'=>'Se Term', 'url'=>array('view', 'id'=>$model->guid)),
	array('label'=>'Hantera Ordlista', 'url'=>array('admin')),
);
?>

<h1>Update LeasingTerm <?php echo $model->guid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>