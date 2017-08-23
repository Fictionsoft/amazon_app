<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"><h3>Job List</h3></div>

        <div class="col-md-3 top_space">
            <?php echo $this->Form->create('Job') ?>
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

                echo '<div class="reset-button">'.$this->Html->link('Reset',array('controller' => 'jobs', 'action' => 'reset', 'admin' =>true),array('class'=>'btn btn-primary')).'</div>';
            ?>
        </div>
        <div class="col-md-2 top_space">
            <?php
            echo $this->Html->link(
                'Add new',
                '/admin/jobs/create',
                array('class' => 'btn btn-primary')
            );
            ?>
        </div>
    </div>
    <br/>
</div>



<?php
$paginator = $this->Paginator;
if($jobs){
?>
    <table class="table table-hover">
    <tr>
        <th>#Id</th>
        <th><?php echo $paginator->sort('name')?></th>
        <th><?php echo $paginator->sort('job_description','Description')?></th>
        <th><?php echo $paginator->sort('','Worker')?></th>
        <th><?php echo $paginator->sort('job_status')?></th>
        <th><?php echo $paginator->sort('created','Create Date')?></th>

        <th>Action</th>
    </tr>
    <?php
    //pr($jobs); die;

    $i=1;
    foreach( $jobs as $job ) {
    ?>
        <tr>
            <td><?php echo $i ?> </td>
            <td><?php echo $job['Job']['name'] ?></td>
            <td><?php echo $this->Common->readMore($job['Job']['job_description'], 5) ?></td>
            <td>
                <?php
                    $count = count($job['WorkerJob']);
                    $i = 1;
                    foreach($job['WorkerJob'] as $job_worker){
                        if($count > $i){
                            echo $job_worker['User']['first_name'].' '.$job_worker['User']['last_name'].', ';
                        }else{
                            echo $job_worker['User']['first_name'].' '.$job_worker['User']['last_name'].' ';
                        }
                        $i++;
                    }
                ?>
            </td>
            <td><?php echo $job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>
            <td><?php echo $this->Common->getDate($job['Job']['created']) ?></td>
            <td>
                <?php

                //delete link
                echo $this->Form->postLink('Delete', array('action' => 'delete', $job['Job']['id']),array('confirm' => 'Are you sure you want to delete this Job?')).'&nbsp;&nbsp';
                // edit link
                echo $this->Html->link("Edit", array('action' => 'update', $job['Job']['id'])).'&nbsp;&nbsp;';
                echo $this->Html->link("Details", array('action' => 'details', $job['Job']['id'])).'&nbsp;&nbsp;';

                ?>
            </td>
       </tr>
    <?php
        $i++;
    }
        unset($job);
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
    echo '<div class="alert alert-danger" role="alert">Job is not available !</div>';
}
?>



