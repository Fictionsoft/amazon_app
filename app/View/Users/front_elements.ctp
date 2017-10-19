<?php
if(empty($this->request->data['User']['id']))
    $readonly = false;
else
    $readonly = true;

echo '<div id="frontSingupPart-1" class="front_singup_part_1">';

    echo '<div class="form-group">'.$this->Form->input('first_name',array('class' => 'form-control','label'=>'First Name<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('last_name',array('class' => 'form-control','label'=>'Last Name<em class="mandatory">*</em>')).'</div>';
    /*echo '<div class="form-group">'.$this->Form->input('phone',array('class' => 'form-control','label'=>'Phone<em class="mandatory">*</em>')).'</div>';*/
    echo '<div class="form-group">'.$this->Form->input('address_line1',array('class' => 'form-control','label'=>'Address line1<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('address_line2',array('class' => 'form-control','label'=>'Address line2<em class="mandatory">*</em>')).'</div>';
    /*echo '<div class="form-group">'.$this->Form->input('city',array('class' => 'form-control','label'=>'City<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('country', array('class' => 'form-control',)).'</div>';
    echo '<div class="form-group">'.$this->Form->input('post',array('class' => 'form-control','label'=>'Post Code')).'</div>';*/

    echo '<div class="form-group">'.$this->Form->input('email',array('class' => 'form-control','readonly'=>$readonly,'label'=>'Email<em class="mandatory">*</em>')).'</div>';

    if(!isset($this->request->data['User']['id'])){
    echo '<div class="form-group">'.$this->Form->input('password',array('class' => 'form-control','minlength'=>'6','label'=>'Password<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('confirm_password',array('class' => 'form-control','minlength'=>'6','type'=>'password','label'=>'Confirm Password<me class="mandatory">*</me>')).'</div>';
    }

    echo '<button type="button" id="singupFormNext" class="custom_btn">Next</button><br><br><br>';

echo '</div>';


echo '<div id="frontSingupPart-2" class="front_singup_part_2" style="display:none">';
    echo '<div class="form-group">'.$this->Form->input('marketplace_id',array('type'=>'text','class' => 'form-control','label'=>'Marketplace id<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('seller_id',array('type'=>'text','class' => 'form-control','label'=>'Seller id<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('access_key_id',array('type'=>'text','class' => 'form-control','label'=>'Access key id<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('secret_access_key',array('class' => 'form-control','label'=>'Secret access key<em class="mandatory">*</em>')).'</div>';
    echo '<div class="form-group">'.$this->Form->input('msw_auth_token',array('class' => 'form-control','label'=>'Msw auth token<em class="mandatory">*</em>')).'</div>';

echo '</div>';
?>

<script>
    // Email template form step next < id = "email-tem-next" >
    $(document).ready(function(){
        $("#singupFormNext").click(function(){
            $("#frontSingupPart-2").show("slow");
            $("#frontSingupPart-1").hide("slow");
            $("#singupAddBtn").show();
            });

            $("#singupFormPrev").click(function(){
            $("#frontSingupPart-1").show("slow");
            $("#frontSingupPart-2").hide("slow");
            $("#singupAddBtn").hide();

        });

    });
</script>

