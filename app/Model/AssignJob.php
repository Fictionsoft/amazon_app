<?php
App::uses('AppModel', 'Model');

class AssignJob extends AppModel{

    /*public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        )
    );*/

    public $belongsTo       = array(
        'Requirement'       =>array(
            'className'     =>'Requirement',
            'foreingKey'    =>'requirement_id'
        )

    );


}

