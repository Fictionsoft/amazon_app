<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>

                <div class="email_temp_head form-group">
                    <div class="row">
                        <div class="col-sm-4"><h3>Messages</h3></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <?php
                            echo $this->Html->link(
                                'Add new',
                                '/emailtemplates/create',
                                array('class' => 'btn btn-primary')
                            );
                            ?>

                            <?php
                            echo $this->Html->link(
                                'Send Message',
                                '/Orders',
                                array('class' => 'btn btn-primary')
                            );
                            ?>

                        </div>
                    </div>
                </div>



                <?php
                $paginator = $this->Paginator;
                if($email_templates){
                ?>
                    <table class="table table-hover">
                    <tr>
                        <th>#Id</th>
                        <th><?php echo $paginator->sort('template_name', 'Title')?></th>
                        <th><?php echo $paginator->sort('subject')?></th>
                        <th><?php echo $paginator->sort('status') ?></th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i=1;
                    foreach( $email_templates as $email_template ) {
                    ?>
                        <tr>
                            <td><?php echo $i ?> </td>
                            <td><?php echo $email_template['EmailTemplate']['template_name'] ?></td>
                            <td><?php echo $email_template['EmailTemplate']['subject'] ?></td>
                            <td class="center"><?php echo $this->element('admin/toggle', array('status' => $email_template['EmailTemplate']['status'] )) ?>&nbsp;</td>
                            <td>
                                <?php
                                    // edit link
                                    echo $this->Html->link("Edit", array('action' => 'update', $email_template['EmailTemplate']['id'])).'&nbsp;&nbsp;';
                                    //delete link
                                    echo $this->Form->postLink('Delete', array('action' => 'delete', $email_template['EmailTemplate']['id']),array('confirm' => 'Are you sure you want to delete this EmailTemplate?'))."&nbsp;&nbsp";
                                ?>
                            </td>
                       </tr>
                    <?php
                        $i++;
                    }
                        unset($email_template);
                    ?>
                    </table>

                    <div style="height: 60px;">&nbsp;</div>

                    <h3>Testing</h3>



                    <?php
                        echo $this->Form->create('EmailTemplate',array('type' =>'file', 'url'=>array('controller'=>'orders', 'action'=>'create' ) ) );
                        echo $this->Form->input('date_from',array('class'=>'form-control date','required'=>'required', 'placeholder'=>'2017-11-01' ) );
                        echo $this->Form->input('date_to',array('class'=>'form-control date','required'=>'required', 'placeholder'=>'2017-11-03' ) );
                        echo $this->Form->end(array('label'=>'Set Order','class'=>'btn btn-primary', 'div'=>false));
                    ?>

                    <div style="height: 300px;margin-bottom: 200px;"> </div>


                    <div class="pagination">
                        <ul>
                            <?php
                            if($paginator->hasPrev()){
                                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            }

                            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));

                            if($paginator->hasNext()){
                                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            }

                            echo $paginator->last("Last");
                            ?>
                        </ul>
                    </div>

                <?php
                }else{
                    echo '<div class="alert alert-danger" role="alert">Email template is not available !</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>



