<?php
App::uses('AppController', 'Controller');


class ProductKeywordsController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common');
    public $uses = array();

    public function beforeFilter() {
       parent::beforeFilter();
       $this->Auth->allow(array(''));

    }

    /*
     * Add keyword product tracker
     */
    public function add_keyword(){
        $this->autoRender = false;
        if( $this->request->is('post')){
            if( !empty( $this->request->data ) ){

                //pr( $this->request->data ); die;
                //$this->loadModel('ProductKeyword');
                if( $this->ProductKeyword->save($this->request->data)){
                    $this->Session->setFlash('Keyword has been successfully saved!', 'default', array('class' => 'alert alert-success'));
                }
            }else{
                $this->Session->setFlash('Please enter valid information!', 'default', array('class' => 'alert alert-danger'));
            }
            $this->redirect( array('controller' =>'productranks', 'action' => 'ranking_tracker') );

        }

    }

    /**
     * @param null $id
     * @return redirect to index
     */
    public function delete($id = null) {

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        //$this->loadModel('ProductKeyword');
        if ($this->ProductKeyword->delete($id)) {
            $this->Session->setFlash("Product #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('controller' => 'productranks', 'action' => 'ranking_tracker'));
        }
    }


}