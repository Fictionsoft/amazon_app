<?php
App::uses('AppModel', 'Model');

class Role extends AppModel{

    /*public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        )
    );*/

    public function getRoles(){
        $roles = $this->find('list',array('conditions'=>array('status'=>1),'order'=>'name'));
        return $roles;
    }
}

