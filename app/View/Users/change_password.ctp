
<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2> Change Password</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User');
                            echo '<div class="form-group">'.$this->Form->input('current_password',array('type'=>'password','class'=>'form-control','minlength'=>'6','label'=>'Current Password<em class="mandatory">*</em>')).'</div>';
                            echo '<div class="form-group">'.$this->Form->input('password',array('type'=>'password','minlength'=>'6','class'=>'form-control','label'=>'Password<em class="mandatory">*</em>')).'</div>';
                            echo '<div class="form-group">'.$this->Form->input('confirm_password',array('type'=>'password','minlength'=>'6','class'=>'form-control','label'=>'Confirm Password<em class="mandatory">*</em>')).'</div>';

                            echo '<div class="btn_content">';
                            echo $this->Html->link('Click here to login','/users/login');
                            echo '<button type="submit" class="custom_btn pull-right">Submit</button>';
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

        jQuery('#UserChangePasswordForm').validate({

            rules:{
                'data[User][confirm_password]': {
                    equalTo: "#UserConfirmPassword"
                }
            },
            messages:{
                'data[User][confirm_password]':'Password did not match with confirm password'
            }

        });
    });
</script>

