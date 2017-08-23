

<div class="form-group"><?php echo $this->Form->input('user_id',array('options'=>$get_client,'required'=>'required','label'=>'Client <span>*</span>','empty'=>'--Select Client--','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('requirement_type_id',array('options'=>$get_re_types,'required'=>'required','label'=>'Requirement Type <span>*</span>','empty'=>'-- Select Requirement Type --','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('present_status',array('options'=>array('Pending'=>'Pending','Completed'=>'Completed'),'required'=>'required','label'=>'Present Status <span>*</span>','empty'=>'-- Select Present Status --','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('required_status',array('required'=>'required', 'class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('start_date',array('type'=>'text','class'=>'date_picker form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('target_date',array('type'=>'text','class'=>'date_picker form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('reference_code',array('required'=>'required','label'=>'Reference Code <span>*</span>','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('asin',array('required'=>'required','label'=>'Asin <span>*</span>','class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('keyword',array('required'=>'required', 'label'=>'Keyword <span>*</span>', 'class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('links',array('class'=>'form-control')) ?></div>
<div class="form-group"><?php echo $this->Form->input('description',array('class'=>'form-control')) ?></div>

<div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>


<script>
    // Date picker
    $(document).ready( function(){
        // Use date picker
        $(function() {
            $( "date_picker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });

        });

    } );

</script>