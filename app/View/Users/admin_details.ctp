<div class="col-md-12">
    <h3><?php echo "$page_title Details" ?> </h3>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <td class="details_title">Name</td>
                        <td>:</td>
                        <td><?php echo $user['User']['first_name'].' '.$user['User']['last_name'] ?></td>

                    </tr>

                    <tr>
                        <td class="details_title">Email</td>
                        <td>:</td>
                        <td><?php echo $user['User']['email'] ?></td>

                    </tr>

                    <tr>
                        <td class="details_title">Phone</td>
                        <td>:</td>
                        <td><?php echo $user['User']['phone'] ?></td>

                    </tr>

                    <tr>
                        <td class="details_title">Address 1</td>
                        <td>:</td>
                        <td><?php echo $user['User']['address_line1'] ?></td>

                    </tr>

                    <tr>
                        <td class="details_title">Address 2</td>
                        <td>:</td>
                        <td><?php echo $user['User']['address_line1'] ?></td>

                    </tr>

                </table>
            </div>



            <?php if($user['User']['role_id'] == 2 ){ // Worker id 2 ?>
            <br><br>
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
            <?php } ?>

        </div>

    </div>
</div>




