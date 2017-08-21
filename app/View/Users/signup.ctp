<div class="front_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form_content">
                    <div class="form_title">
                        <h2>Signup</h2>
                        <?php echo $this->Session->flash() ?>
                    </div>
                    <div class="form_inner">
                        <?php
                            echo $this->Form->create('User',array('url'=>'signup','type'=>'file'));
                            echo $this->element('../Users/front_elements');
                            echo '<div class="btn_content">';
                            echo '<br>';
                            echo $this->Html->link('Click here to Login','/Users/login');
                            echo '<button type="submit" class="custom_btn pull-right">Signup</button>';

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
