<?php echo $this->Html->script('/ckeditor/ckeditor') ?>
    <div id="email-tem-stp-1">
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

        <a href="javascript:void(0)" id="email-tem-next" class="btn btn-primary">Next</a><br><br><br>

    </div>


    <div id="email-tem-stp-2" style="display:none">

        <a href="javascript:void(0)" id="email-tem-form-prev" class="btn btn-primary">Previous</a><br><br>
        <h4>Second Step</h4>
        <div class="form-group"><?php echo $this->Form->input('template_name',array('class'=>'form-control','required'=>'required')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('subject',array('class'=>'form-control','required'=>'required')) ?></div>
        <div class="form-group"><?php echo $this->Form->input('message',array('class'=>'form-control','required'=>'required', 'id'=>'editor1' ) ) ?></div>
    </div>


<script>

    // Email template form step next < id = "email-tem-next" >
    $(document).ready(function(){
        $("#email-tem-next").click(function(){
            $("#email-tem-stp-2").show("slow");
            $("#email-tem-stp-1").hide("slow");
        });

        $("#email-tem-form-prev").click(function(){
            $("#email-tem-stp-1").show("slow");
            $("#email-tem-stp-2").hide("slow");

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

