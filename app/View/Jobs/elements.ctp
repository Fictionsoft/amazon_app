<?php
    if(empty($get_job_workers)){
        $get_job_workers = null;
    }

?>


<div class="form-group"><?php echo $this->Form->input('user_id',array('multiple' => true, 'selected' => $get_job_workers, 'options'=> $get_workers,'empty'=>'-- Select Worker --', 'required'=>'required','label'=>'Worker <span>*</span>', 'class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('name',array('required'=>'required','label'=>'Job Name','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('job_status', array('class'=>'form-control', 'required'=>'required', 'options'=>array(0=>'Pending',1=>'Completed'), 'empty'=>'Select Status')) ?></div>
<div class="form-group"><?php echo $this->Form->input('job_description',array('label'=>'Job Description','class'=>'form-control')) ?></div>
    <div class="job_requirements">
        <label>Requirements</label>

        <table class="table">
            <tr>
                <th>Select</th>
                <th>Reference Type</th>
                <th>Reference Code</th>
                <th>ASIN</th>
                <th>Amount</th>
                <th>Keyword</th>
                <th>Required Status</th>
                <th>Present Status</th>
                <th>Present Ranking</th>
                <th>Is Assign</th>
            </tr>
            <?php
                foreach($requirements as $requirement){
                    $checked = '';
                    if(isset($get_job_requirements)){
                        $checked = $this->Common->isChecked($get_job_requirements, $requirement['Requirement']['id']);

                        if($checked){
                            $checked = 'checked';
                        }
                    }
            ?>

            <tr>
                <td>
                    <?php echo $this->Form->input('requirement_id', array('type' =>'checkbox', 'checked'=>$checked, 'hiddenField' => false, 'name'=>'data[Requirement][id][]','value'=>$requirement['Requirement']['id'], 'label' => false) ); ?>
                </td>
                <td><?php echo $this->Common->getRequirementType($requirement['Requirement']['requirement_type_id']); ?></td>
                <td><?php echo $requirement['Requirement']['reference_code'] ?></td>
                <td><?php echo $requirement['Requirement']['asin']?></td>
                <td>$<?php echo $requirement['Requirement']['amount']?></td>
                <td><?php echo $requirement['Requirement']['keyword']?></td>
                <td><?php echo $requirement['Requirement']['required_status']?></td>
                <td><?php echo $requirement['Requirement']['present_status']?></td>
                <td><?php echo $requirement['Requirement']['present_ranking']?></td>
                <td width="300">
                    <div><?php echo $this->element('admin/toggle', array('status' => $requirement['Requirement']['is_assign'] )) ?>&nbsp;</div>
                    <?php
                    if($requirement['Requirement']['is_assign']==1){
                        echo $this->Common->getJobWorker($requirement['Requirement']['id']);
                    }
                    ?>
                </td>

            </tr>
            <?php } ?>
        </table>
    </div>

<div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>




