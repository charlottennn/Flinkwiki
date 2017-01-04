<div class="add-box object">
    <div class="add-box-holder">
        <div class="sub_info_holder">
            <fieldset class="sub_info_content">
                <legend>Skapa Användare</legend>

                <div class="form">

                    <input id="guid" type="hidden" value="<?php if ($User) {
                        echo $User->guid;
                    } ?>">

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Förnamn</label>
                                <input id="first_name" class="text x-long" type="text"
                                       value="<?php if ($User) {
                                           echo $User->first_name;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Efternamn</label>
                                <input id="last_name" class="text x-long" type="text"
                                       value="<?php if ($User) {
                                           echo $User->last_name;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Email</label>
                                <input id="first_name" class="text x-long" type="text"
                                       value="<?php if ($User) {
                                           echo $User->email;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Password</label>
                                <input id="password" class="text x-long" type="text"
                                       value="<?php if ($User) {
                                           echo $User->password;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_medium">
                            <div class="inv_fee_handling input_large">


                                <label for=
                                       "standard-dropdown">Roll</label>
                                <?php echo CHtml::dropDownList(
                                    'code_role',
                                    $User->code_role,
                                    CHtml::listData(CodeRole::model()->findAll(), 'code_role', 'title'),
                                    array('prompt' => 'Välj Index', 'class' => 'singleSelect')
                                ); ?>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="pricelist_button_row">
                            <a href="#" id="dialog_link"
                               class="btn cancel_overlay dialogButton">Avbryt</a>
                            <a href="#" id="dialog_link"
                               class="btn createUser dialogButton">Spara</a>

                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>