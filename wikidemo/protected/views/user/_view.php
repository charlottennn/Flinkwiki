<?php
///* @var $this UserController */
///* @var $data User */
//?>
<!---->
<!--<div class="view">-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('guid')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::link(CHtml::encode($data->guid), array('view', 'id'=>$data->guid)); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('first_name')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->first_name); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('last_name')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->last_name); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('email')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->email); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('password')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->password); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('code_role')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->code_role); ?>
<!--	<br />-->
<!---->
<!---->
<!--</div>-->

<tr class="odd">

    <td><?php echo CHtml::encode($data->guid); ?></td>
    <td><?php echo CHtml::encode($data->first_name); ?></td>
    <td><?php echo CHtml::encode($data->last_name); ?></td>
    <td><?php echo CHtml::encode($data->code_role); ?></td>

    <td class="center">
        <ul id="icons" class="ui-widget ui-helper-clearfix">
            <li class="ui-state-default ui-corner-all " title="Redigera">
                <a class="new_user" href="#" id="<?php echo $data->guid; ?>">
                    <span class="ui-icon ui-icon-pencil"></span></a>
            </li>
        </ul>
    </td>
</tr>