<?php
App::uses('AppModel', 'Model');

class Slider extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter name field'
        ),

         'cover_photo' => array(
            'rule' => 'notEmpty',
            'message' => 'Please select any photo field'
        )


        /*'slug' => array(
            'slug' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter slug field'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Please chose another slug'
            ),
        )*/
    );
}

