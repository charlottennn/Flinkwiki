<?php
/* @var $this FlinkerInternController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Flinker Intern',
);

//$this->menu=array(
//	array('label'=>'Create FlinkerIntern', 'url'=>array('create')),
//	array('label'=>'Manage FlinkerIntern', 'url'=>array('admin')),
//);
//?>
<div class="heading">
    <div class="holder">
        <div class="frame">
            <div class="add-box-options">
            </div>
            <h2>Flinker Intern</h2>
        </div>
    </div>
</div>

<div id="button-div">
    <a href="#" id="dialog_link" class="btn new_flinkerintern">Lägg till index</a>
</div>

<div class="add-box object">
    <div class="add-box-holder">
        <div class="button_meny">
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="flinkerinternList">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Typ</th>
                    <th>Beskrivning</th>
                    <th>Avdelning</th>
                    <th width="5%">Editera</th>
                </tr>
                </thead>

                <tbody>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'summaryText' => '',
                    'itemsCssClass' => 'none',
                    'cssFile' => 'false',
                    'enablePagination' => 'false',
                )); ?>

                </tbody>
            </table>
        </div>
    </div>