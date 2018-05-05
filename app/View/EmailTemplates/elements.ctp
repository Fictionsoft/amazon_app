<?php echo $this->Html->script('/ckeditor/ckeditor') ?>
    <div id="emailTemFormStp-1">

        <div class="form-group"><?php echo $this->Form->input('template_name',array('class'=>'form-control','required'=>'required', 'label' => 'Title')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('subject',array('class'=>'form-control','required'=>'required')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('message',array('class'=>'form-control cke_contents','required'=>'required', 'id'=>'editor1' ) ) ?></div>

        <div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>

        <a href="javascript:void(0)" id="emailTemFormNext" class="btn btn-primary">Next</a><br><br><br>

    </div>

    <div id="emailTemFormStp-2" style="display:none">
        <?php
            $options_imd = array(
                '1' => '1 days',
                '2' => '2 days',
                '3' => '3 days',
                '4' => '4 days',
                '5' => '5 days',
                '6' => '6 days',
                '7' => '7 days',
                '8' => '8 days',
                '9' => '9 days',
                '10' => '10 days',
                '11' => '11 days',
                '12' => '12 days',
                '13' => '13 days',
                '14' => '14 days',
                '15' => '15 days',
                '16' => '16 days',
                '17' => '17 days',
                '18' => '18 days',
                '19' => '19 days',
                '20' => '20 days',
                '21' => '21 days',
                "28" => "4 weeks",
                "35" => "5 weeks",
                "42" => "6 weeks",
                "49" => "7 weeks",
                "56" => "8 weeks",
                "63" => "9 weeks",
                "70" => "10 weeks"

            );

            $options_day = array(
            '1' => '1 days',
            '2' => '2 days',
            '3' => '3 days',
            '4' => '4 days',
            '5' => '5 days',
            '6' => '6 days',
            '7' => '7 days',
            '8' => '8 days',
            '9' => '9 days',
            '10' => '10 days',
            '11' => '11 days',
            '12' => '12 days',
            '13' => '13 days',
            '14' => '14 days',
            '15' => '15 days',
            '16' => '16 days',
            '17' => '17 days',
            '18' => '18 days',
            '19' => '19 days',
            '20' => '20 days',
            '21' => '21 days'
        );

        $options_del = array(
            'Pending'                   => 'Pending',
            'Shipped'                   => 'Shipped',
            'Confirmed'                 => 'Confirmed',
            'Cancelled'                 => 'Cancelled',
            'marked Out For Delivery'   => 'marked Out For Delivery',
            'Delivered'                 => 'Delivered',
            'Positive feedback is left' => 'Positive feedback is left',
            'Returned'                  => 'Returned'
        );
        ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo $this->Form->input('immediately',array('options'=> $options_imd,'empty'=>'Select','class'=>'form-control', 'required' => true )) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo $this->Form->input('delivered',array('options'=>$options_del,'empty'=>'Select', 'class'=>'form-control', 'required' => true )) ?>
                </div>
            </div>

            <!--<div class="col-sm-4">
                <div class="form-group">
                    <?php /*echo $this->Form->input('day',array('options'=>$options_day,'label'=>'Only if the delivery takes less than', 'empty'=>'Select', 'class'=>'form-control' ) ) */?>
                </div>
            </div>-->
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control date" name="start_date" placeholder="DD/MM/YY" required="required" value="<?php echo '' ?>">
                    <span class="input-group-addon">
                        <?php echo $this->Html->image('/css/admin_styles/images/icon-calender.png') ?>
                    </span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo $this->Form->input('asin',array('label'=>'ASIN(s)', 'placeholder' => 'B01NBOUNHD,B01NBOUNHD', 'class'=>'form-control' ) ) ?>
                </div>
            </div>
        </div>

    </div>
<script>

    // Email template form step next < id = "email-tem-next" >
    $(document).ready(function(){
        $("#emailTemFormNext").click(function(){
            $("#emailTemFormStp-2").show("slow");
            $("#emailTemFormStp-1").hide("slow");
            $("#emailTemEdit").show();
            $("#emailTemplateAdd").show();
            $('html, body').animate({scrollTop: '0px'}, 300);
        });

        $("#emailTemFormPrev").click(function(){
            $("#emailTemFormStp-1").show("slow");
            $("#emailTemFormStp-2").hide("slow");
            $("#emailTemEdit").hide();
            $("#emailTemplateAdd").hide();

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

