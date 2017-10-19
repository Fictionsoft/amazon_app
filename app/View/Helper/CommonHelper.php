<?php
/**
 * Helper for Common
 *
 *
 */
class CommonHelper extends AppHelper {
/**
 * Included helpers.
 *
 * @var array
 */
	var $helpers = array('Html', 'Form', 'Javascript');

    function generateFaqQuestions($faq_category) {
        $html = '<h3> <a href="#'.$faq_category['FaqCategory']['slug'].'">'.$faq_category['FaqCategory']['name'].'</a></h3>';
        foreach( $faq_category['Faq'] as $faq) {

            if( $faq['status'] == 1 ) {
                $html .='<div><a href="#'.$faq['slug'].'">'.$faq['question'].'</a></div>';
            }
        }

        return $html;
    }

    function generateFaqAnswers($faq_category) {
        $html = '<h3 id="'.$faq_category['FaqCategory']['slug'].'">'.$faq_category['FaqCategory']['name'].'</h3>';
        if(!empty($faq_category['FaqCategory']['note'])){
            $html .= '<p>'.$faq_category['FaqCategory']['note'].'</p>';
        }
        foreach( $faq_category['Faq'] as $faq) {

            if( $faq['status'] == 1 ) {
                $html .='
                        <li id="'.$faq['slug'].'">'.$faq['question'].'</li>
                        <p>'.nl2br($faq['answer']).'</p>
                        ';
            }
        }

        return $html;
    }



    function isChecked($assign_jobs,$requirement_id ){
        foreach($assign_jobs as $assign_job){
            if($assign_job['AssignJob']['requirement_id'] == $requirement_id){
                return true;
            }
        }
    }


    // String decrement or create read more
    function readMore( $description, $word_amount ){
        if( $word_amount > str_word_count( $description )){
            return $description ;
        }else{
            $short_description = implode(' ',array_slice(explode(' ',$description), 0, $word_amount));
            return $short_description .'.....';

        }
    }

    // gate date
    function getDate( $get_date ){
        return date('d/m/Y',strtotime( $get_date ));
    }

    // gate date
    function getDateTime( $get_date_time ){
        return date('d/m/Y h:i:sA',strtotime( $get_date_time ));
    }


    function isAdmin( $user_role ){
        if( $user_role == 1 ){ // Admin id
            return true;
        }
    }

    function isWorker( $user_role ){
        if( $user_role == 2 ){ // Worker id
            return true;
        }
    }

    function isClient( $user_role ){
        if( $user_role == 3 ){ // Client id
            return true;
        }
    }

    function isSeller( $user_role ){
        if( $user_role == 4 ){ // Seller id
            return true;
        }
    }

    function getJobWorker($requirement_id){
        $assign_jobs = $this->requestAction('AssignJobs/get_jobs_and_workers/'.$requirement_id );
        $html = '<div>
                    <table class="table table-hover">';
                        foreach($assign_jobs as $assign_job) {
                            $html.='<tr>
                                <td>
                                '.$this->Html->link($assign_job['Job']['name'], array('controller'=>'Jobs', 'action' => 'details', $assign_job['Job']['id'] ) ).'
                                </td>
                                <td>';
                                    if($assign_job['WorkerJob']){
                                        $workers= '';
                                        foreach($assign_job['WorkerJob'] as $worker_job){
                                            $workers.= $this->Html->link($worker_job['User']['first_name'].' '.$worker_job['User']['last_name'], array('controller'=>'Users', 'action' => 'details', $worker_job['User']['role_id'], $worker_job['User']['id'] ), array('target' => '_blank' ) ).', ';
                                        }
                                        $html .= substr($workers, 0, -2);
                                    }

                                $html.='</td>
                            </tr>';
                        }
                    $html.='</table>
                 </div>';

        return $html;
    }

    function getRequirementType($requirement_type_id){
        $assign_jobs = $this->requestAction('Requirements/get_requirement_type/'.$requirement_type_id );
        return $assign_jobs['RequirementType']['name'];
    }


    function linkCount($string){
        $links_array = explode("\n",$string);
        $counter = 0;
        foreach($links_array as $link){

            if(trim($link)!=''){
                $counter++;
            }
        }
        return $counter;
    }
}

