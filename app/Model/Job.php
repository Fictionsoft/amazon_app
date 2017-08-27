<?php
App::uses('AppModel', 'Model');

class Job extends AppModel{

    public $hasMany = array(
        'AssignJob'     =>array(
            'className'     => 'AssignJob',
            'foreignKey'    =>'job_id'
        ),
        'WorkerJob' => array(
            'className' => 'WorkerJob',
            'foreignKey' => 'job_id'
        )
    );
}

