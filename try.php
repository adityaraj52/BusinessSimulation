//Use this to upload recent posts


<?php
if ($formvars['role'] == 'Administrator' || $formvars['role'] == 'Professor') {
    ?>
    <div class="col-lg-6" style="margin-top: 1cm">

        <div class="row offset-2">
            <h3>Post Events</h3>
        </div>

        <form id='updateEvents' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post'>
            <?php
            $formvars = $fgmembersite->CollectProfileData();
            ?>
            <input type='hidden' name='submitted_event_upload' id='submitted_event_upload' value='1'/>

            <?php if ($formvars['team'] != 'Public') { ?>
                <div class="form-control row">
                    <label for="example-text-input" class="col-3 col-form-label">Upload for Team</label>
                    <div class="col-5">
                        <select class="form-control input-block-level" id="upload_team"
                                name='upload_team'>
                            <option value="<?php echo($formvars['team']) ?>"> <?php echo($formvars['team']) ?>
                            </option>
                            <option value="Public">Public
                            </option>
                        </select>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="form-control row">
                <label class="col-3 col-form-label">Message</label>
                <div class="col-5">
                    <input type='text' class="input-large" name='events' id='events' placeholder="Your posts here" maxlength="500" required/>

                </div>
            </div>


            <div class="form-control row">
                <div class="col-6"></div>
                <div><h5><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></h5>
                </div>
            </div>


            <div class="form-control row">
                <div class="col-6 offset-2">
                    <button type="submit" name="submit_event" class="btn btn-primary" style="width:80%;">Upload
                    </button>

                    <div><h5><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></h5>
                    </div>
                </div>
        </form>
    </div>
    <?php
}
?>