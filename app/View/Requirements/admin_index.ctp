<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"><h3>Requirements</h3></div>

        <div class="col-md-6 top_space">
            <?php echo $this->Form->create('Requirement') ?>
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo $this->Form->input('user_id',array('options'=>$client_list,'empty'=>'Select Client','class'=>'form-control','label'=>false));?>
                    </div>

                    <div class="col-sm-8">
                        <div class="input-group custom-search-form">
                            <?php echo $this->Form->input('filter',array('placeholder'=>'Search...','class'=>'form-control radius_left','label'=>false) ) ?>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            <?php echo $this->Form->end() ?>
        </div>
        <div class="col-md-2 top_space">
            <?php
            echo '<div class="reset-button">'.$this->Html->link('Reset',array('controller' => 'requirements', 'action' => 'reset', 'admin' =>true),array('class'=>'btn btn-primary')).'</div>';
            ?>
        </div>
        <div class="col-md-2 top_space">
            <?php
            echo $this->Html->link(
                'Add new',
                '/admin/requirements/create',
                array('class' => 'btn btn-primary')
            );
            ?>
        </div>
    </div>
    <br/>
</div>



<?php
$paginator = $this->Paginator;
if($requirements){
?>
    <table class="table table-hover">
    <tr>
        <th>#Id</th>
        <th><?php echo $paginator->sort('requirement_type_id','Requirement Type')?></th>
        <th><?php echo $paginator->sort('reference_code', 'Reference Code')?></th>
        <th><?php echo $paginator->sort('asin')?></th>
        <th><?php echo $paginator->sort('keyword')?></th>
        <th><?php echo $paginator->sort('required_status','Required Status')?></th>
        <th><?php echo $paginator->sort('present_status')?></th>
        <th><?php echo $paginator->sort('status') ?></th>
        <th>Action</th>
    </tr>
    <?php
    $i=1;
    foreach( $requirements as $requirement ) {
    ?>
        <tr>
            <td><?php echo $i ?> </td>
            <td><?php echo $requirement['RequirementType']['name'] ?></td>
            <td><?php echo $requirement['Requirement']['reference_code'] ?></td>
            <td><?php echo $requirement['Requirement']['asin'] ?></td>
            <td><?php echo $requirement['Requirement']['keyword'] ?></td>
            <td><?php echo $requirement['Requirement']['required_status'] ?></td>
            <td><?php echo $requirement['Requirement']['present_status'] ?></td>
            <td class="center"><?php echo $this->element('admin/toggle', array('status' => $requirement['Requirement']['status'] )) ?>&nbsp;</td>
            <td>
                <?php
                    // View link
                    echo $this->Html->link("View", array('action' => 'details', $requirement['Requirement']['id'])).'&nbsp;&nbsp;';
                    // Edit link
                    echo $this->Html->link("Edit", array('action' => 'update', $requirement['Requirement']['id'])).'&nbsp;&nbsp;';
                    //delete link
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $requirement['Requirement']['id']),array('confirm' => 'Are you sure you want to delete this Requirement?'));
                ?>
            </td>
       </tr>
    <?php
        $i++;
    }
        unset($requirement);
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
    echo '<div class="alert alert-danger" role="alert">Requirement is not available !</div>';
}
?>



