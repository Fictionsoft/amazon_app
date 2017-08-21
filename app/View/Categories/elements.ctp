<div class="form-group"><?php echo $this->Form->input('main_category_id',array('options'=>$main_categories,'empty'=>'--SELECT--','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('name',array('class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('slug',array('class'=>'form-control')) ?></div>
<?php if(!empty($this->request->data['Category']['id'])){ ?>
    <div class="form-group"><?php echo $this->Html->image($this->element( 'default_photo_selector', array( 'photo'=>$this->data['Category']['photo'],'dir'=>'categories' ) ), array('alt' => 'Product','width'=>'150')) ?></div>
<?php } ?>
<div class="form-group"><?php echo $this->Form->input('photo',array('type'=>'file')) ?></div>
<div class="form-group"><?php echo $this->Form->input('order',array('class'=>'form-control')) ?></div>
<div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>



<?php if(!empty($sizes)){ ?>
    <hr/>
    <h4>Assign Sizes</h4>
    <?php
    $i=0;
    foreach($sizes as $size) {

        $checked=false;

        $size_id = $size['Size']['id'];
        if(!empty($existing_sizes) ) {
            foreach( $existing_sizes as $existing_size) {
                if ($size_id == $existing_size['CategorySize']['size_id']){
                    $checked=true;
                    break;
                }
            }
        }
        ?>

            <?php echo $this->Form->input('task_id',array('name'=>'data[CategorySize]['.$i.'][size_id]','label'=>false,'type'=>'checkbox','value'=>$size['Size']['id'],'hiddenField'=>false,'div'=>false,'checked'=>$checked)) ?>
            <?php echo $size['Size']['size'] ?> &nbsp;&nbsp;

        <?php $i++; } ?>

<?php }else{ ?>
    <div class="alert alert-warning">Size is not available! </div>
<?php } ?>

