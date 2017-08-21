<?php
if(empty($this->request->data['User']['id']))
    $readonly = false;
else
    $readonly = true;

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

?>