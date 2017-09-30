<?php echo $this->Html->script('/ckeditor/ckeditor') ?>
<?php /*echo $this->Form->input('file_name',array('type'=>'hidden','value'=>$name))*/?>
<div class="form-group"><?php echo $this->Form->input('template_name',array('class'=>'form-control','required'=>'required')) ?></div>
<div class="form-group"><?php echo $this->Form->input('subject',array('class'=>'form-control','required'=>'required')) ?></div>
<div class="form-group"><?php echo $this->Form->input('message',array('class'=>'form-control','required'=>'required', 'value' => $message, 'id'=>'editor1' ) ) ?></div>
<!--
<?php /*if(!empty($this->request->data['EmailTemplate']['id'])){ */?>
    <div class="form-group"><?php /*echo $this->Html->image($this->element( 'default_photo_selector', array( 'photo'=>$this->data['EmailTemplate']['image'],'dir'=>'emailtemplates' ) ), array('alt' => 'Email template image','width'=>'150')) */?></div>
<?php /*} */?>

<div class="form-group"><?php /*echo $this->Form->input('image',array('type'=>'file')) */?></div>
<div class="form-group"><?php /*echo $this->Form->input('url',array('class'=>'form-control','required'=>'required')) */?></div>-->

<div class="form-group is-publish"><?php echo $this->Form->input('status') ?></div>


<script>
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

