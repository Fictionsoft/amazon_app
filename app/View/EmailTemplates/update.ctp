<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <h3>Update Message</h3>
                <?php
                    echo $this->Form->create('EmailTemplate',array('type' => 'file'));
                    echo $this->element('../EmailTemplates/elements');
                    echo $this->Form->input('id', array('type' => 'hidden'));
                    echo '<div id="emailTemEdit" class="submit_button" style="display: none" >
                        <a href="javascript:void(0)" id="emailTemFormPrev" class="btn btn-primary">Previous</a> &nbsp; &nbsp;';
                    echo $this->Form->end(array('label'=>'Update','class'=>'btn btn-primary','div'=>false)).'</div>';
                ?>
            </div>
        </div>
    </div>
</div>