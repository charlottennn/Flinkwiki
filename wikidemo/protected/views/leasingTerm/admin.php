<?php
/* @var $this LeasingTermController */
/* @var $model LeasingTerm */

$this->breadcrumbs=array(
	'Ordlista'=>array('index'),
	'Hantera',
);

$this->menu=array(
	array('label'=>'Lista Termer', 'url'=>array('index')),
	array('label'=>'Skapa Termer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#leasing-term-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Hantera Ordlista</h1>


<?php echo CHtml::link('Avancerad Sökning','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'leasing-term-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'guid',
		'title',
		'idUserAdd',
        'tag',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
