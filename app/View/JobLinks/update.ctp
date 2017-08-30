<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <h3>Update Links</h3>
                <div class="form-group">
                    <?php
                        echo $this->Form->create('JobLink');
                        echo $this->Form->input('id', array('type' => 'hidden'));

                        include('elements.ctp');

                        echo '<div class="submit_button">'.$this->Form->end(array('label'=>'Update','class'=>'btn btn-primary')).'</div>';
                        echo $this->Form->end();
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>