<?php
echo '<div class="form-group">'. $this->Form->input('worker_job_id', array('class'=>'form-control', 'label'=>'Job', 'required'=>'required', 'options'=>$worker_pending_jobs, 'empty'=>'Select')).'</div>';
echo '<div class="form-group">'. $this->Form->input('links', array('class'=>'form-control', 'required'=>true)).'</div>';
?>