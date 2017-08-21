<h3>Update Job</h3>
<?php
    echo $this->Form->create('Job',array('type' => 'file'));
    echo $this->element('../Jobs/elements');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
?>