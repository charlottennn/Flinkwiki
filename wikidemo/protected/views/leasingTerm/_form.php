<div class="add-box object">
    <div class="add-box-holder">
        <div class="sub_info_holder">
            <fieldset class="sub_info_content">
                <legend>Ordlista</legend>

                <div class="form">

                    <input id="guid" type="hidden" value="<?php if ($LeasingTerm) {
                        echo $LeasingTerm->guid;
                    } ?>">

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Titel</label>
                                <input id="title" class="text x-long" type="text"
                                       value="<?php if ($LeasingTerm) {
                                           echo $LeasingTerm->title;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Beskrivning</label>
                                <textarea rows="10" id="description" class="text input_textarea" type="text">
                                    <?php if ($LeasingTerm) {
                                        echo $LeasingTerm->description;
                                    } ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input_area_long">

                            <div class="settings">
                                <label>Tagg</label>
                                <input id="tag" class="text x-long" type="text"
                                       value="<?php if ($LeasingTerm) {
                                           echo $LeasingTerm->tag;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                    <input id="idUserAdd" type="hidden" value="<?php if ($LeasingTerm) {
                        echo $LeasingTerm->idUserAdd;
                    } ?>">

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