<h3>Create Jobs</h3>
<?php
echo $this->Form->create('Job',array('type' =>'file'));
echo $this->element('../Jobs/elements');
echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Save','class'=>'btn btn-primary')).'</div>';

?>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#JobAdminCreateForm').validate({

        });
    });
</script>