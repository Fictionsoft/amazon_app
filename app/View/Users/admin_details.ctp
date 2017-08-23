<div class="col-md-12">
    <h3>User Details </h3>
    <div class="row">
        <div class="col-md-12">

            <div><b>Name:</b><?php echo $user['User']['first_name'].' '.$user['User']['last_name'] ?></div>
            <div><b>Email:</b> <?php echo $user['User']['email'] ?></div>
            <div><b>Phone:</b> <?php echo $user['User']['phone'] ?></div>
            <div><b>Address:</b> <?php echo $user['User']['address_line1'] ?></div><br>

            <h4>Jobs</h4>

            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>job Status</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    $i=1;
                    foreach( $jobs as $job ) {
                        ?>
                        <tr>
                            <td><?php echo $i ?> </td>
                            <td><?php echo $job['Job']['name'] ?></td>
                            <td><?php echo $this->Common->readMore($job['Job']['job_description'], 5) ?></td>

                            <td><?php echo $job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>
                            <td><?php echo $this->Common->getDate($job['Job']['created']) ?></td>
                            <td>
                                <?php
                                // Details Link
                                echo $this->Html->link("View", array('controller'=>'jobs','action' => 'details', $job['Job']['id'])).'&nbsp;&nbsp;';
                                ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    unset($job);
                    ?>
                </table>
            </div>

        </div>

    </div>
</div>




