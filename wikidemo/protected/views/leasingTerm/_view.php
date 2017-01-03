<?php
///* @var $this LeasingTermController */
///* @var $data LeasingTerm */
//?>

<tr class="odd">

    <td><?php echo CHtml::encode($data->guid); ?></td>
    <td><?php echo CHtml::encode($data->title); ?></td>
    <td><?php echo CHtml::encode($data->description); ?></td>
    <td><?php echo CHtml::encode($data->tag); ?></td>

    <td class="center">
        <ul id="icons" class="ui-widget ui-helper-clearfix">
            <li class="ui-state-default ui-corner-all " title="Redigera">
                <a class="new_leasingterm" href="#" id="<?php echo $data->guid; ?>">
                    <span class="ui-icon ui-icon-pencil"></span></a>
            </li>
        </ul>
    </td>
</tr>
