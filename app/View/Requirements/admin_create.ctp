<h3>Create Requirement</h3>
<?php
echo $this->Form->create('Requirement',array('type' =>'file'));
echo $this->element('../Requirements/elements');

echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Save','class'=>'btn btn-primary')).'</div>';
?>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#RequirementAdminCreateForm').validate({

        });
    });
</script>
