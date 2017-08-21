<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>
                <?php if($my_jobs){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Job Name</th>
                                <th>Status</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Action</th>
                            </tr>

                            <?php foreach($my_jobs as $my_job){ ?>
                                <tr>
                                    <td><?php echo $my_job['Job']['name'] ?></td>
                                    <td><?php echo $my_job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>
                                    <td><?php echo $this->Common->getDate( $my_job['Job']['created']) ?></td>
                                    <td><?php echo $this->Common->getDate($my_job['Job']['updated']) ?></td>
                                    <td><?php echo $this->Html->link("Details", array('action' => 'details', $my_job['Job']['id']),array('class'=>'btn btn-default')); ?></td>
                                </tr>

                            <?php } ?>

                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>