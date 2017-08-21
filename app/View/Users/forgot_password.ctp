<section class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">

                <div class="form_content">
                    <div class="form_title">
                        <h2> Forgot your password </h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                        echo $this->Form->create('User');
                        echo '<div class="form-group">'.$this->Form->input('email',array('class'=>'form-control', 'type'=>'email','placeholder'=>'Email Address','label'=>'Email Address<em class="mandatory">*</em>')).'</div>';
                        echo '<div class="btn_content">';
                        echo '<button type="submit" class="custom_btn pull-right">Submit</button>';

                        echo '</div>';
                        echo $this->Form->end();

                        ?>
                    </div>
                </div>



            </div>


        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#UserForgotPasswordForm').validate({
            rules:{
                'data[User][email]': {
                    email:true,
                    remote: {
                        url: BASE_URL+'users/is_invalid_email',
                        type: "post",
                        data: {
                            email: function(){ return jQuery("#UserEmail").val(); }
                        }
                    }
                }
            },
            messages: {
                'data[User][email]': {
                    remote: 'Email could not found'
                }
            }
        });
    });
</script>
