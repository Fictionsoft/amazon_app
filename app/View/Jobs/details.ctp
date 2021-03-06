<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <h3>Job Details</h3>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td class="details_title">Name</td>
                            <td>:</td>
                            <td><?php echo $job['Job']['name'];?></td>
                        </tr>

                        <tr>
                            <td class="details_title">Description </td>
                            <td>:</td>
                            <td><?php echo $job['Job']['job_description'];?></td>
                        </tr>

                        <tr>
                            <td class="details_title">Create Date</td>
                            <td>:</td>
                            <td><?php echo $this->Common->getDate($job['Job']['updated']) ?></td>
                        </tr>

                        <tr>
                            <td class="details_title">Status</td>
                            <td>:</td>
                            <td><?php echo $job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>
                        </tr>
                    </table>
                </div>
                <br><br>

                <h3>Requirements</h3>
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>#Id</th>
                            <th>Requirement Type</th>
                            <th>Reference Code</th>
                            <th>ASIN</th>
                            <th>Keyword</th>
                            <th>Required Status</th>
                            <th>Present Status</th>
                            <th>Present Ranking</th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1; foreach($job['AssignJob'] as  $requirement){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $this->Common->getRequirementType($requirement['Requirement']['requirement_type_id']); ?></td>
                                <td><?php echo $requirement['Requirement']['reference_code'] ?></td>
                                <td><?php echo $requirement['Requirement']['asin']?></td>
                                <td><?php echo $requirement['Requirement']['keyword']?></td>
                                <td><?php echo $requirement['Requirement']['required_status']?></td>
                                <td><?php echo $requirement['Requirement']['present_status']?></td>
                                <td><?php echo $requirement['Requirement']['present_ranking']?></td>
                                <td>
                                    <?php
                                    echo $this->Html->link("View", array('controller'=>'Requirements','action' => 'details', $requirement['Requirement']['id'], $job['Job']['id'] ) ).'&nbsp;&nbsp;';
                                    ?>
                                </td>
                            </tr>
                            <?php $i++; } ?>

                    </table>
                </div>
                <br><br>

                <h3>Updated</h3>
                <div class="form-group">
                    <?php
                        echo $this->Form->create('Job',array('url'=>'/jobs/update_status','type' =>'file'));
                        echo '<div class="form-group">'. $this->Form->input('job_status', array('class'=>'form-control', 'required'=>'required', 'options'=>array(0=>'Pending',1=>'Completed'), 'empty'=>'Select Status')).'</div>';
                        /*echo '<div class="form-group">'. $this->Form->input('links',array('class'=>'form-control')).'</div>';*/
                        echo '<div class="form-group">'. $this->Form->input('id',array('type'=>'hidden', 'value'=> $job['Job']['id'])).'</div>';
                        echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
                    ?>
                </div>
                <br>

            </div>
        </div>
    </div>
</div>