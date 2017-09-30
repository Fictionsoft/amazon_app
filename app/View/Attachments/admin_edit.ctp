<?php echo $this->Form->create('Attachment', array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Attachment'); ?> <a href="<?php echo Router::url('/admin/Attachments') ?>" class="btn btn-primary">Back</a> </legend>
	<?php
		echo $this->Form->input('id');
		include('_entry.ctp');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>

<?php
echo $this->Html->link('Back', array('action' => 'browse'));
?>

