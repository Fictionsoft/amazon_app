<h3>Create Slider</h3>
<?php
echo $this->Form->create('Slider',array('type' =>'file'));
echo $this->element('../Sliders/elements');
echo$this->Form->end(array('label'=>'Save','class'=>'btn btn-primary'));
