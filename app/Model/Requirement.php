<?php
App::uses('AppModel', 'Model');

class Requirement extends AppModel{

    /*public $validate = array(
        'reference_code' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        )
    );*/

    /*public function getBrands(){
        $brands = $this->find('list',array('conditions'=>array('status'=>1),'order'=>'name'));
        return $brands;
    }*/

    public function requirements(){
        $requriements = $this->find('all',array('conditions'=>array('Requirement.status'=>1)));
        return $requriements;
    }
}

