

<div class="form-group"><?php echo $this->Form->input('name',array('class'=>'form-control')) ?></div>
<?php if(!empty($this->request->data['Slider']['id'])){ ?>
    <div class="form-group"><?php echo $this->Html->image($this->element( 'default_photo_selector', array( 'photo'=>$this->data['Slider']['cover_photo'],'dir'=>'sliders' ) ), array('alt' => 'Product','width'=>'150')) ?></div>
<?php } ?>
<div class="form-group"><?php echo $this->Form->input('cover_photo',array('label'=>'Photo','type'=>'file')) ?></div>
<div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>



















