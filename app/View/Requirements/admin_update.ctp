<h3>Update Requirement</h3>
<?php
    echo $this->Form->create('Requirement',array('type' => 'file'));
    echo $this->element('../Requirements/elements');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
?>