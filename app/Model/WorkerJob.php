<?php
App::uses('AppModel', 'Model');

class WorkerJob extends AppModel{
    public $belongsTo       = array(
        'User'              => array(
            'className'     => 'User',
            'foreingKey'    => 'user_id'
        )
    );

}

