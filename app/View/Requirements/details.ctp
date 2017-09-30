<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <h3>Requirement Details</h3>

                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <td class="details_title">Requirement Type</td>
                            <td>:</td>
                            <td><?php echo $requirement['RequirementType']['name']?></td>
                        </tr>

                        <tr>
                            <td class="details_title">Reference Code</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['reference_code']?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Asin</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['asin']?></td>

                        </tr>
                        <tr>
                            <td class="details_title">Keyword</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['keyword']?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Present Status</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['present_status']?></td>
                        </tr>

                        <tr>
                            <td class="details_title">Required Status</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['required_status']?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Created</td>
                            <td>:</td>
                            <td><?php echo $this->Common->getDate($requirement['Requirement']['created'])?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Start Date</td>
                            <td>:</td>
                            <td><?php echo $this->Common->getDate($requirement['Requirement']['start_date'])?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Target Date</td>
                            <td>:</td>
                            <td><?php echo $this->Common->getDate($requirement['Requirement']['target_date'])?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Description</td>
                            <td>:</td>
                            <td><?php echo $requirement['Requirement']['description']?></td>

                        </tr>

                        <tr>
                            <td class="details_title">Links</td>
                            <td>:</td>
                            <td><?php echo nl2br($requirement['Requirement']['links'])?></td>

                        </tr>

                    </table>

                    <br><br>

                    <h3>Updated</h3>
                    <div class="form-group">
                        <?php
                        echo $this->Form->create('Requirement');
                        echo '<div class="form-group">'. $this->Form->input('present_ranking', array('class'=>'form-control','value' => $requirement['Requirement']['present_ranking'], 'required'=>'required')).'</div>';
                        echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
                        ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


