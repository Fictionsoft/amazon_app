<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        text-align: left;
        padding: 10px;
    }

    thead {
        background-color: #f0f0f0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.13);
    }

    tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.13);
    }
    tr:last-child {
        border-bottom: none;
    }

    tr:hover {
        background-color: #f0f0f0;
    }

    tr td:nth-child(3){
        width: 100px;
    }
    tr td:nth-child(3), tr th:nth-child(3),
    tr td:nth-child(4), tr th:nth-child(4){
        text-align: center;
    }
    tr td a{
        display: inline-block;
        margin: 0 5px;
    }
    .btn-attachment{
        display: inline-block;
        color: #000;
        margin: 20px 0;
    }

</style>
<div class="page page-ui-tables">
    <div class="page-wrap">
        <div class="row">

            <!--				<div class="col-md-12">-->
            <!--					--><?php //echo $this->Flash->render('admin_success'); ?>
            <!--					--><?php //echo $this->Flash->render('admin_error'); ?>
            <!--				</div>-->

            <!-- Basic Table -->
            <div class="col-md-12">
                <div class="panel panel-lined panel-hovered mb20 table-responsive basic-table">
                    <div class="panel-heading">
                        <div class="col-md-5">
                            <div class="btn-group btn-group-sm right">
                                <th class="actions">
                                    <p>
                                        <?php
                                        echo $this->Html->link('Add Attachment', array('action' => 'add'));
                                        ?>
                                    </p>
                                </th>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Insert</th>

                                <th class="actions"><?php echo __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($attachments)){ foreach ($attachments as $attachment){
                                ?>
                                <tr>
                                    <td><?php echo $attachment['Attachment']['name']; ?></td>
                                    <td>
                                        <?php
                                        echo $this->Html->image('/uploads/attachments/'.$attachment['Attachment']['path'],array('height'=>75,'width' => 75));
                                        //echo $this->Html->image('../'.$attachment['Attachment']['path'], array('height'=>75,'width' => 75));
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $return_url = Router::url('/',true).'uploads/attachments/' . $attachment['Attachment']['path'];
                                        ?>
                                        <a href="#" onclick="returnFileUrl('<?php echo $return_url; ?>')">Insert</a>
                                        <?php
                                        //$icon_img = '<i class="fa fa-file-image-o"></i>';
                                        //echo $this->Html->link('Insert', '#', array('onclick' => "returnFileUrl('/" . $attachment['Attachment']['path'] . "');"),array('escape'=>true));
                                        ?>
                                    </td>

                                    <td class="actions" style="width: 204px;">
                                        <?php
                                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $attachment['Attachment']['id']), array('style'=>'margin:0 10px 0 70px'));
                                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attachment['Attachment']['id']), array(), __('Are you sure you want to delete # %s?', $attachment['Attachment']['name']));

                                        ?>
                                    </td>
                                </tr>
                            <?php }}; ?>


                            </tbody>
                        </table>

                        <!--							<div class="paginator">-->
                        <!--								<ul class="pagination">-->
                        <!--									--><?php //echo $this->Paginator->prev('< ' . __('previous')) ?>
                        <!--									--><?php //echo $this->Paginator->numbers() ?>
                        <!--									--><?php //echo $this->Paginator->next(__('next') . ' >') ?>
                        <!--								</ul>-->
                        <!--								<p>--><?php //echo $this->Paginator->counter() ?><!--</p>-->
                        <!--							</div>-->

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script>
    // Helper function to get parameters from the query string.
    function getUrlParam( paramName ) {
        var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
        var match = window.location.search.match( reParam );

        return ( match && match.length > 1 ) ? match[1] : null;
    }
    // Simulate user action of selecting a file to be returned to CKEditor.
    function returnFileUrl(path) {

        var funcNum = 1;
        //var funcNum = getUrlParam( 'CKEditorFuncNum' );
        var fileUrl = path;
        window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
            // Get the reference to a dialog window.
            var dialog = this.getDialog();
            // Check if this is the Image Properties dialog window.
            if ( dialog.getName() == 'image' ) {
                // Get the reference to a text field that stores the "alt" attribute.
                var element = dialog.getContentElement( 'info', 'txtAlt' );
                // Assign the new value.
                if ( element )
                    element.setValue( 'alt text' );
            }
            // Return "false" to stop further execution. In such case CKEditor will ignore the second argument ("fileUrl")
            // and the "onSelect" function assigned to the button that called the file manager (if defined).
            // return false;
        } );
        window.close();
    }
</script>