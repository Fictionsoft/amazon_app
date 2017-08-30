<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <h3>Add Links</h3>
                <div class="form-group">
                    <?php
                        echo $this->Form->create('JobLink');
                        include('elements.ctp');
                        echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Save','class'=>'btn btn-primary')).'</div>';
                        echo $this->Form->end();
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>