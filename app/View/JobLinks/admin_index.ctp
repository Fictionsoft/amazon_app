<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h3>Job Links</h3>
                <?php echo $this->Session->flash();?>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Job Name</th>
                                <th>Links</th>
                                <th>Total Links</th>
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
                                    <td><?php echo nl2br($job_link['JobLink']['links'] ) ?></td>
                                    <td><?php echo $this->Common->linkCount($job_link['JobLink']['links'] ) ?></td>
                                    <td><?php echo $this->Common->getDate( $job_link['JobLink']['created']) ?></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>