<?php
///* @var $this FlinkerInternController */
///* @var $data FlinkerIntern */
//?>

<tr class="odd">

    <td><?php echo CHtml::encode($data->id); ?></td>
    <td><?php echo CHtml::encode($data->type); ?></td>
    <td><?php echo CHtml::encode($data->description); ?></td>
    <td><?php echo CHtml::encode($data->section); ?></td>

    <td class="center">
        <ul id="icons" class="ui-widget ui-helper-clearfix">
            <li class="ui-state-default ui-corner-all " title="Redigera">
                <a class="new_flinkerintern" href="#" id="<?php echo $data->id; ?>">
                    <span class="ui-icon ui-icon-pencil"></span></a>
            </li>
        </ul>
    </td>
</tr>
