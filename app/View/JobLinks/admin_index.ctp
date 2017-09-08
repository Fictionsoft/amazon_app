<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"><h3>Job Links</h3></div>
        <div class="col-md-10 top_space">
            <?php echo $this->Form->create('JobLink') ?>
            <div class="row">
                <div class="col-sm-3">
                    <?php echo $this->Form->input('user_id',array('options'=>$worker_list,'empty'=>'Select Worker','class'=>'form-control','label'=>false ) );?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('start_date',array('type'=>'text','class'=>'date_picker form-control','label'=>false, 'placeholder'=>'From')) ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('end_date',array('type'=>'text','class'=>'date_picker form-control','label'=>false, 'placeholder'=>'To')) ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->submit('Search', array('class'=>'btn btn-success') ) ?>
                </div>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
    <br/>
</div>


<?php echo $this->Session->flash();?>
<table class="table table-hover">
    <?php $total_links = 0;
        if($job_links){
            foreach($job_links as $job_link){
                $total_links += $this->Common->linkCount($job_link['JobLink']['links'] );
            }
        }
    ?>

    <tr>
        <th>Job Name</th>
        <th>Worker</th>
        <th>Links</th>
        <th>Total Links(<?php echo $total_links ?>)</th>
        <th>Create Date</th>
    </tr>
    <?php if($job_links){ ?>
        <?php foreach($job_links as $job_link){ ?>
            <tr>
                <td>
                    <?php
                    echo $this->Html->link($job_link['WorkerJob']['Job']['name'], array('controller'=>'jobs','action' => 'details', $job_link['WorkerJob']['Job']['id'] ), array('target'=>'_blank') );
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link($job_link['WorkerJob']['User']['first_name'].' '.$job_link['WorkerJob']['User']['last_name'], array('controller'=>'users','action' => 'details', $job_link['WorkerJob']['User']['role_id'], $job_link['WorkerJob']['User']['id'] ), array('target'=>'_blank') );
                    ?>
                </td>
                <td><?php echo nl2br($job_link['JobLink']['links'] ) ?></td>
                <td><?php echo $this->Common->linkCount($job_link['JobLink']['links'] ) ?></td>
                <td><?php echo $this->Common->getDate( $job_link['JobLink']['created']) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>

