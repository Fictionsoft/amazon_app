<?php
App::uses('AppModel', 'Model');

class ProductRank extends AppModel {

    public $hasMany = array(
        'ProductKeyword' => array(
            'className'  => 'ProductKeyword',
            'foreignKey' => 'product_rank_id'
        )
    );

    public $validate = array(
        /*'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        )*/



    );


}

