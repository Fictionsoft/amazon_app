<h3>Update Slider</h3>
<?php
    echo $this->Form->create('Slider',array('type' => 'file'));
    echo $this->element('../Sliders/elements');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end(array('label'=>'Update','class'=>'btn btn-primary'));
?>