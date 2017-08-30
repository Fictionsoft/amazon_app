<?php
App::uses('AppModel', 'Model');

class JobLink extends AppModel{

    public $belongsTo = array(
        'WorkerJob' => array(
            'className' => 'WorkerJob',
            'foreignKey' => 'worker_job_id'
        )
    );

    function linksByJob($job_id){
        $job_links = $this->find('all', array('conditions' => array('WorkerJob.job_id' => $job_id ) ) );
        $total = $this->countLinks($job_links);
        return $total;
    }

    function countLinks($job_links){
        $total = 0;
        foreach($job_links as $job_link){
            $total += $this->linkCounter($job_link['JobLink']['links']);
        }
        return $total;
    }

    function linkCounter($string){
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

