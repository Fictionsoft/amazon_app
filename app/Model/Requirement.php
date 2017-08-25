<?php
App::uses('AppModel', 'Model');

class Requirement extends AppModel{

    /*public $validate = array(
        'reference_code' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        )
    );*/

    public $belongsTo = array(
        'RequirementType' => array(
            'className' => 'RequirementType',
            'foreignKey' => 'requirement_type_id'
        )
    );
    public function requirements(){
        $requriements = $this->find('all',array('conditions'=>array('Requirement.status'=>1)));
        return $requriements;
    }
}

