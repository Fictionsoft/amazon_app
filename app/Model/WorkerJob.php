<?php
App::uses('AppModel', 'Model');

class WorkerJob extends AppModel{
    public $belongsTo       = array(
        'User'              => array(
            'className'     => 'User',
            'foreignKey'    => 'user_id'
        ),
        'Job'              => array(
            'className'     => 'Job',
            'foreignKey'    => 'job_id'
        )


    );

}

