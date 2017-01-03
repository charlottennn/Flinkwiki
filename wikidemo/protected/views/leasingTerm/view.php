<?php
/* @var $this LeasingTermController */
/* @var $model LeasingTerm */

$this->breadcrumbs=array(
	'Leasingtermer'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Lista Termer', 'url'=>array('index')),
	array('label'=>'Skapa Termer', 'url'=>array('create')),
	array('label'=>'Uppdatera Term', 'url'=>array('update', 'id'=>$model->guid)),
	array('label'=>'Ta bort Termer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->guid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Hantera Ordlista', 'url'=>array('admin')),
);
?>

<h1>View LeasingTerm #<?php echo $model->guid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'guid',
		'title',
		'description',
        'tag',
	),
)); ?>
