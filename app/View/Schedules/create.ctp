<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <h3>Add Schedule</h3>
                <?php
                    echo $this->Form->create('Schedule');
                    echo $this->element('../Schedules/elements');
                    echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Save','class'=>'btn btn-primary')).'</div>';
                ?>
            </div>
        </div>
    </div>
</div>


