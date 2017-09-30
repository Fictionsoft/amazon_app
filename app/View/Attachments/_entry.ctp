<style>
    .thumb_view{
        max-width: 100px;
    }
</style>
<?php
echo $this->Form->input('name', array('class' => 'form-control'));
echo $this->Form->input('image', array('class' => 'form-control', 'label' => false, 'type' => 'file') );
if (!empty($this->request->data['Attachment']['path'])) {
    ?>
    <div class="form-group">
        <label class="col-md-2 control-label">Image Preview<span class="required"></span> </label>
        <div class="col-md-10">
            <?php
            echo $this->Html->image('/uploads/attachments/' . $this->request->data['Attachment']['path'], array('height' => 75, 'width' => 75));
            ?>
        </div>
    </div>
    <?php
} ?>

