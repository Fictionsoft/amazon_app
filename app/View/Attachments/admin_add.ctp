<style>
    fieldset{
        margin-bottom: 10px;
    }
    .input{
        margin: 7px 0;
    }
    .input label{
        margin-right: 5px;
    }
</style>
<?php  echo $this->Form->create('Attachment',array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Add Attachment'); ?> <a href="<?php echo Router::url('/admin/Attachment') ?>" class="btn btn-primary">Back</a></legend>
        <?php include('_entry.ctp');?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

<?php
echo $this->Html->link(
    '<span class="fa fa-pencil-square"> Back</span>',
    array(
        'action' => 'browse',
        'escapeTitle' => false,
        'title' => 'Edit Image'
    )
);
?>
