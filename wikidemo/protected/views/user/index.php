<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Användare',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>


<div class="heading">
    <div class="holder">
        <div class="frame">
            <div class="add-box-options">
            </div>
            <h2>Användare</h2>
        </div>
    </div>
</div>

<div id="button-div">
    <a href="#" id="dialog_link" class="btn new_user">Lägg till användare</a>
</div>

<div class="add-box object">
    <div class="add-box-holder">
        <div class="button_meny">
            <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="userList">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Namn</th>
                    <th>Efternamn</th>
                    <th>Mail</th>
                    <th>Roll</th>
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