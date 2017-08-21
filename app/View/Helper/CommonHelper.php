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









}

