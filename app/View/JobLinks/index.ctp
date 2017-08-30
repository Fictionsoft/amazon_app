<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>
            <div class="col-sm-9">
                <h3>Job Links
                    <?php
                    echo $this->Html->link(
                        'Add new',
                        '/JobLinks/create',
                        array('class' => 'btn btn-primary')
                    );
                    ?>
                </h3>


                <?php echo $this->Session->flash();?>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Job Name</th>
                                <th>Links</th>
                                <th>Total Links</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                            <?php if($job_links){ ?>
                            <?php foreach($job_links as $job_link){ ?>
                                <tr>
                                    <td><?php echo $job_link['WorkerJob']['Job']['name'] ?></td>
                                    <td><?php echo nl2br($job_link['JobLink']['links'] ) ?></td>
                                    <td><?php echo $this->Common->linkCount($job_link['JobLink']['links'] ) ?></td>
                                    <td><?php echo $this->Common->getDate( $job_link['JobLink']['created']) ?></td>
                                    <td>
                                        <?php
                                        echo $this->Html->link("Edit", array('action' => 'update', $job_link['JobLink']['id'] ) ).'&nbsp;&nbsp;';
                                        echo $this->Form->postLink('Delete', array('action' => 'delete', $job_link['JobLink']['id'] ),array('confirm' => 'Are you sure you want to delete this Job Link?')).'&nbsp;&nbsp';
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>