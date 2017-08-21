<div class="container-fluid"><p>
    <h3>Job Details</h3>
    <p><b>Job Name: </b> <?php echo $job['Job']['name'] ?></p>
    <p><b>Create Date: </b> <?php echo $this->Common->getDate($job['Job']['created']) ?></p>
    <p><b>Job Description: </b> <?php echo $job['Job']['job_description'] ?></p>
    <p>
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


