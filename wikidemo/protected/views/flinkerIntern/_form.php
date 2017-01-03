<div class="add-box object">
    <div class="add-box-holder">
        <div class="sub_info_holder">
            <fieldset class="sub_info_content">
                <legend>Flinker Intern</legend>

                <div class="form">

                    <input id="guid" type="hidden" value="<?php if ($FlinkerIntern) {
                        echo $FlinkerIntern->id;
                    } ?>">

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Typ</label>
                                <input id="type" class="text x-long" type="text"
                                       value="<?php if ($FlinkerIntern) {
                                           echo $FlinkerIntern->type;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Beskrivning</label>
                                <textarea rows="10" id="description" class="text input_textarea" type="text">
                                    <?php if ($FlinkerIntern) {
                                        echo $FlinkerIntern->description;
                                    } ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Avdelning</label>
                                <input id="section" class="text x-long" type="text"
                                       value="<?php if ($FlinkerIntern) {
                                           echo $FlinkerIntern->section;
                                       } ?>">
                            </div>
                        </div>
                    </div>

<!--                    <input id="idUserAdd" type="hidden" value="--><?php //if ($FlinkerIntern) {
//                        echo $FlinkerIntern->idUserAdd;
//                    } ?><!--">-->

                    <div class="row">
                        <div class="pricelist_button_row">
                            <a href="#" id="dialog_link"
                               class="btn cancel_overlay dialogButton">Avbryt</a>
                            <a href="#" id="dialog_link"
                               class="btn saveLeasingTerm dialogButton">Spara</a>

                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>