<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2> Login to your account</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User');
                            echo '<div class="form-group">'.$this->Form->input('username',array('class'=>'form-control', 'type'=>'email','placeholder'=>'Email Address','label'=>'Email Address<em class="mandatory">*</em>')).'</div>';
                            echo '<div class="form-group">'.$this->Form->input('password',array('class'=>'form-control','minlength'=>'6','placeholder'=>'******','label'=>'Password<em class="mandatory">*</em>')).'</div>';

                            echo '<div class="btn_content">';
                            echo $this->Html->link('Forgot Password','/users/forgot_password');
                            echo '<button type="submit" class="custom_btn pull-right">Login</button>';

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
        jQuery('#UserLoginForm').validate({

        });
    });
</script>