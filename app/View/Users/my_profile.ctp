<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2> Update My Profile</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User',array('url'=>'my_profile','type'=>'file'));
                            echo $this->element('../Users/front_elements');
                            echo '<div class="btn_content">';
                            echo $this->Html->link( "Change password?", array('action'=>'change_password') );
                            echo '<button type="submit" class="custom_btn pull-right">Update</button>';
                            echo $this->Form->input('id', array('type' => 'hidden'));

                            echo '</div>';
                            echo $this->Form->end();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#UserMyProfileForm').validate();
    });
</script>

