<?php echo $this->Html->script('/ckeditor/ckeditor') ?>
    <div id="emailTemFormStp-1">
        <?php /*echo $this->Form->input('file_name',array('type'=>'hidden','value'=>$name))*/?>
        <div class="form-group"><?php echo $this->Form->input('template_name',array('class'=>'form-control','required'=>'required')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('subject',array('class'=>'form-control','required'=>'required')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('message',array('class'=>'form-control','required'=>'required', 'id'=>'editor1' ) ) ?></div>
        <!--
        <?php /*if(!empty($this->request->data['EmailTemplate']['id'])){ */?>
            <div class="form-group"><?php /*echo $this->Html->image($this->element( 'default_photo_selector', array( 'photo'=>$this->data['EmailTemplate']['image'],'dir'=>'emailtemplates' ) ), array('alt' => 'Email template image','width'=>'150')) */?></div>
        <?php /*} */?>

        <div class="form-group"><?php /*echo $this->Form->input('image',array('type'=>'file')) */?></div>
        <div class="form-group"><?php /*echo $this->Form->input('url',array('class'=>'form-control','required'=>'required')) */?></div>-->

        <div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>

        <a href="javascript:void(0)" id="emailTemFormNext" class="btn btn-primary">Next</a><br><br><br>

    </div>


    <div id="emailTemFormStp-2" style="display:none">

        <a href="javascript:void(0)" id="emailTemFormPrev" class="btn btn-primary">Previous</a><br><br>
        <h4>Second Step</h4>

        <?php
            $options_imd = array(
                '1 days' => '1 days',
                '2 days' => '2 days',
                '3 days' => '3 days',
                '4 days' => '4 days',
                '5 days' => '5 days',
                '6 days' => '6 days',
                '7 days' => '7 days',
                '8 days' => '8 days',
                '9 days' => '9 days',
                '10 days' => '10 days',
                '11 days' => '11 days',
                '12days' => '12 days',
                '13 days' => '13 days',
                '14 days' => '14 days',
                '15 days' => '15 days',
                '16 days' => '16 days',
                '17 days' => '17 days',
                '18 days' => '18 days',
                '19 days' => '19 days',
                '20 days' => '20 days',
                '21 days' => '21 days',
                '4 weeks' => '4 weeks',
                '5 weeks' => '5 weeks',
                '6 weeks' => '6 weeks',
                '7 weeks' => '7 weeks',
                '8 weeks' => '8 weeks',
                '9 weeks' => '9 weeks',
                '10 weeks' => '10 weeks'

            );

        $options_day = array(
            '1 days' => '1 days',
            '2 days' => '2 days',
            '3 days' => '3 days',
            '4 days' => '4 days',
            '5 days' => '5 days',
            '6 days' => '6 days',
            '7 days' => '7 days',
            '8 days' => '8 days',
            '9 days' => '9 days',
            '10 days' => '10 days',
            '11 days' => '11 days',
            '12 days' => '12 days',
            '13 days' => '13 days',
            '14 days' => '14 days',
            '15 days' => '15 days',
            '16 days' => '16 days',
            '17 days' => '17 days',
            '18 days' => '18 days',
            '19 days' => '19 days',
            '20 days' => '20 days',
            '21 days' => '21 days'

        );

        $options_del = array(
            'confirmed' => 'confirmed',
            'shipped' => 'shipped',
            "marked 'Out For Delivery" => "marked 'Out For Delivery",
            'delivered' => 'delivered',
            'positive feedback is left' => 'positive feedback is left',
            'returned' => 'returned'


        );

        ?>
        <div class="form-group"><?php echo $this->Form->input('immediately',array('options'=> $options_imd,'empty'=>'immediately','class'=>'form-control')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('delivered',array('options'=>$options_del,'empty'=>'delivered','class'=>'form-control')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('day',array('options'=>$options_day,'label'=>'only if the delivery takes less than','class'=>'form-control' ) ) ?></div>
        <div class="form-group"><?php echo $this->Form->input('asin',array('class'=>'form-control' ) ) ?></div>
    </div>


<script>

    // Email template form step next < id = "email-tem-next" >
    $(document).ready(function(){
        $("#emailTemFormNext").click(function(){
            $("#emailTemFormStp-2").show("slow");
            $("#emailTemFormStp-1").hide("slow");
        });

        $("#emailTemFormPrev").click(function(){
            $("#emailTemFormStp-1").show("slow");
            $("#emailTemFormStp-2").hide("slow");

        });

    });


    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' , {
        filebrowserBrowseUrl: BASE_URL+'admin/Attachments/browse',
        image_previewText : '&nbsp;',
        toolbar: [
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline','Source'] },
            { name: 'paragraph', groups: [ 'list', 'indent',  'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'PageBreak', 'Iframe' ] },
            { name: 'insert', items: [ 'Table', 'PageBreak', 'Iframe' ] },
            { name: 'colors', items: [ 'TextColor'] },
            { name: 'tools', items: [ 'Maximize' ] },
            { name: 'others', items: [ '-' ] },

        ]
    } );
</script>

