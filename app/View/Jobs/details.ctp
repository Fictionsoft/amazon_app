<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <h3>Job Details</h3>

                <table class="table">
                    <tr>
                        <th>Job Name</th>
                        <th>Create Date</th>
                        <th>Update Date</th>
                        <th>Job Status</th>

                    </tr>

                    <tr>
                        <td><?php echo $job['Job']['name'];?></td>
                        <td><?php echo $this->Common->getDate($job['Job']['created']) ?></td>
                        <td><?php echo $this->Common->getDate($job['Job']['updated']) ?></td>
                        <td><?php echo $job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>
                    </tr>

                </table>
                <br><br>

                <h3>Requirements</h3>
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>#id</th>
                            <th>Reference Code</th>
                            <th>Asin</th>
                            <th>Keyword</th>
                            <th>Required Status</th>
                        </tr>

                        <?php foreach($job['AssignJob'] as  $requirement){ ?>
                            <tr>
                                <td><?php echo $requirement['Requirement']['id']?></td>
                                <td><?php echo $requirement['Requirement']['reference_code'] ?></td>
                                <td><?php echo $requirement['Requirement']['asin']?></td>
                                <td><?php echo $requirement['Requirement']['keyword']?></td>
                                <td><?php echo $requirement['Requirement']['required_status']?></td>
                            </tr>
                        <?php } ?>


                    </table>
                </div>
                <br><br>

                <h3>Updated</h3>
                <div class="form-group">
                    <?php
                        echo $this->Form->create('Job',array('url'=>'/jobs/update_status','type' =>'file'));
                        echo '<div class="form-group">'. $this->Form->input('job_status', array('class'=>'form-control', 'required'=>'required', 'options'=>array(0=>'Pending',1=>'Completed'), 'empty'=>'Select Status')).'</div>';
                        echo '<div class="form-group">'. $this->Form->input('links',array('class'=>'form-control')).'</div>';
                        echo '<div class="form-group">'. $this->Form->input('id',array('type'=>'hidden', 'value'=> $job['Job']['id'])).'</div>';
                        echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
                    ?>
                </div>
                <br>




            </div>
        </div>
    </div>
</div>