<div class="container-fluid"><p>
    <h3>Job Details</h3>

    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <td class="details_title">Job Name</td>
                <td>:</td>
                <td><?php echo $job['Job']['name'] ?></td>

            </tr>

            <tr>
                <td class="details_title">Job Worker</td>
                <td>:</td>
                <td>
                    <?php

                    $count = count($job['WorkerJob']);
                    $i = 1;
                    foreach($job['WorkerJob'] as $job_worker){
                        if($count > $i){
                            echo $job_worker['User']['first_name'].' '.$job_worker['User']['last_name'].', ';
                        }else{
                            echo $job_worker['User']['first_name'].' '.$job_worker['User']['last_name'];
                        }
                        $i++;
                    }
                    ?>
                </td>

            </tr>

            <tr>
                <td class="details_title">Create Date</td>
                <td>:</td>
                <td> <?php echo $this->Common->getDate($job['Job']['created']) ?></td>

            </tr>

            <tr>
                <td class="details_title">Job Status</td>
                <td>:</td>
                <td><?php echo $job['Job']['job_status'] == 0 ? 'Pending': 'Completed'; ?></td>

            </tr>

            <tr>
                <td class="details_title">Job Description</td>
                <td>:</td>
                <td><?php echo $job['Job']['job_description'] ?></td>

            </tr>

            <tr>
                <td class="details_title">Links</td>
                <td>:</td>
                <td><?php echo $job['Job']['links'] ?></td>

            </tr>




        </table>
    </div>

   <br><br>
   <h3>Requirements</h3>
   <div class="table-responsive">

       <table class="table">
           <tr>
               <th>#id</th>
               <th>Reference Code</th>
               <th>Asin</th>
               <th>Keyword</th>
               <th>Required Status</th>
           </tr>

           <?php foreach($job['AssignJob'] as  $requirement){ ?>
           <tr>
               <td><?php echo $requirement['Requirement']['id']?></td>
               <td><?php echo $requirement['Requirement']['reference_code'] ?></td>
               <td><?php echo $requirement['Requirement']['asin']?></td>
               <td><?php echo $requirement['Requirement']['keyword']?></td>
               <td><?php echo $requirement['Requirement']['required_status']?></td>
           </tr>
           <?php } ?>

       </table>
   </div>
</div>


