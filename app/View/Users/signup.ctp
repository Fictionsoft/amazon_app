<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2>Seller Signup</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User',array('url'=>'signup','type'=>'file'));
                            echo $this->element('../users/front_elements');
                            echo '<div id="singupAddBtn" class="btn_content form-group" style="display:none">
                            <button type="button" id="singupFormPrev" class="custom_btn">Previous</button> &nbsp; &nbsp;
                            <button type="submit" class="custom_btn pull-right">Signup</button>
                            </div>';

                            echo '<div class="text-center">'. $this->Html->link('Click here to Login','/users/login').'</div>';

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

        jQuery('#UserSignupForm').validate({
            rules:{
                'data[User][email]': {
                    remote: {
                        url: BASE_URL+'users/is_user_available',
                        type: "post",
                        data: {
                            email: function(){ return jQuery("#UserEmail").val(); }
                        }
                    }
                },
                'data[User][confirm_password]': {
                    equalTo: "#UserPassword"
                }
            },
            messages: {
                'data[User][email]': {
                    remote: 'Email already used.'
                }
            }
        });
    });
</script>
