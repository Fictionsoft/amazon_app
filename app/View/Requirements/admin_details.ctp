<div class="container-fluid"><p>
    <h3>Requirement Details</h3>

   <div class="table-responsive">

       <table class="table">
           <tr>
               <td class="details_title">Requirement Type</td>
               <td>:</td>
               <td><?php echo $requirement['RequirementType']['name']?></td>
           </tr>

           <tr>
               <td class="details_title">Reference Code</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['reference_code']?></td>

           </tr>

           <tr>
               <td class="details_title">Asin</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['asin']?></td>

           </tr>
           <tr>
               <td class="details_title">Amount</td>
               <td>:</td>
               <td>$<?php echo $requirement['Requirement']['amount']?></td>
           </tr>
           <tr>
               <td class="details_title">Present Ranking</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['present_ranking']?></td>
           </tr>

           <tr>
               <td class="details_title">Keyword</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['keyword']?></td>

           </tr>

           <tr>
               <td class="details_title">Present Status</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['present_status']?></td>
           </tr>
           <tr>
               <td class="details_title">Is Assign</td>
               <td>:</td>
               <td>
                   <div><?php echo $this->element('admin/toggle', array('status' => $requirement['Requirement']['is_assign'] )) ?></div>
                   <div>
                       <?php
                       if($requirement['Requirement']['is_assign']==1){
                           echo $this->Common->getJobWorker($requirement['Requirement']['id']);
                       }
                       ?>
                   </div>
               </td>
           </tr>

           <tr>
               <td class="details_title">Required Status</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['required_status']?></td>

           </tr>

           <tr>
               <td class="details_title">Created</td>
               <td>:</td>
               <td><?php echo $this->Common->getDate($requirement['Requirement']['created'])?></td>

           </tr>

           <tr>
               <td class="details_title">Start Date</td>
               <td>:</td>
               <td><?php echo $this->Common->getDate($requirement['Requirement']['start_date'])?></td>

           </tr>

           <tr>
               <td class="details_title">Target Date</td>
               <td>:</td>
               <td><?php echo $this->Common->getDate($requirement['Requirement']['target_date'])?></td>

           </tr>

           <tr>
               <td class="details_title">Description</td>
               <td>:</td>
               <td><?php echo $requirement['Requirement']['description']?></td>

           </tr>

           <tr>
               <td class="details_title">Links</td>
               <td>:</td>
               <td><?php echo nl2br($requirement['Requirement']['links'])?></td>

           </tr>

       </table>
   </div>
</div>


