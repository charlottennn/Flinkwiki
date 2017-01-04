<tr class="odd">

    <td><?php echo CHtml::encode($data->guid); ?></td>
    <td><?php echo CHtml::encode($data->first_name); ?></td>
    <td><?php echo CHtml::encode($data->last_name); ?></td>
    <td><?php echo CHtml::encode($data->email); ?></td>
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