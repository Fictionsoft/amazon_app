<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>
            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <div class="col-md-3"><h3>Schedule List</h3></div>

                <div class="col-md-5 top_space">
                    <?php echo $this->Form->create('Schedule') ?>

                        <div class="input-group custom-search-form">
                            <?php echo $this->Form->input('filter',array('placeholder'=>'Search...','class'=>'form-control','label'=>false) ) ?>
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>

                    <?php echo $this->Form->end() ?>
                </div>
                <div class="col-md-2 top_space">
                    <?php
                    echo '<div class="reset-button">'.$this->Html->link('Reset',array('controller' => 'schedules', 'action' => 'reset'),array('class'=>'btn btn-primary')).'</div>';
                    ?>
                </div>
                <div class="col-md-2 top_space">
                    <?php
                    echo $this->Html->link(
                        'Add new',
                        '/schedules/create',
                        array('class' => 'btn btn-primary')
                    );
                    ?>
                </div><br/>

                <?php
                    $paginator = $this->Paginator;
                    if($schedules){
                        ?>
                        <table class="table table-hover">
                            <tr>
                                <th>#Id</th>
                                <th><?php echo $paginator->sort('time')?></th>
                                <th><?php echo $paginator->sort('status') ?></th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i=1;
                            foreach( $schedules as $schedule ) {
                                ?>
                                <tr>
                                    <td><?php echo $i ?> </td>
                                    <td><?php echo $schedule['Schedule']['time'] ?></td>
                                    <td class="center"><?php echo $this->element('admin/toggle', array('status' => $schedule['Schedule']['status'] )) ?>&nbsp;</td>
                                    <td>
                                        <?php
                                        // edit link
                                        echo $this->Html->link("Edit", array('action' => 'update', $schedule['Schedule']['id'])).'&nbsp;&nbsp;';
                                        //delete link
                                        echo $this->Form->postLink('Delete', array('action' => 'delete', $schedule['Schedule']['id']),array('confirm' => 'Are you sure you want to delete this Schedule?'));
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            unset($schedule);
                            ?>
                        </table>

                        <p>
                            <?php
                            echo $this->Paginator->counter(array(
                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>
                        </p>

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
                        echo '<div class="alert alert-danger" role="alert">Schedule is not available !</div>';
                    }
                ?>
            </div>

        </div>
    </div>
</div>


