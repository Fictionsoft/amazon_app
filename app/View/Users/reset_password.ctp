<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2> Reset Password</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User');
                            echo '<div class="from-group">'.$this->Form->input('password',array('minlength'=>'6','class'=>'form-control','label'=>'Password <em>*</em>')).'</div>';
                            echo '<div class="from-group">'.$this->Form->input('confirm_password',array('minlength'=>'6','class'=>'form-control','type'=>'password','required'=>true,'label'=>'Confirm Password <span>*</span>')).'</div>';
                            echo $this->Form->input('token',array('type'=>'hidden','value'=>$token));
                            echo '<div class="btn_content">';
                            echo $this->Html->link('Click here to login','/Users/login');
                            echo '<button type="submit" class="custom_btn pull-right">Submit</button>';

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
        jQuery('#UserResetPasswordForm').validate({
            rules:{
                'data[User][confirm_password]': {
                    equalTo: "#UserPassword"
                }
            },
            messages:{
                'data[User][confirm_password]':'Password did not match with confirm password'
            }
        });
    });
</script>







