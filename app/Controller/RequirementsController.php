<?php
App::uses('AppController', 'Controller');


class RequirementsController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    public $uses = array('Requirement','User');

    /*public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array(''));
    }*/

    /**
     * @param null
     * @return null
     */
    public function admin_index() {
        //$this->autoRender = false;
        if(!empty($this->data)){
            $this->Session->write('RequirementFilter', $this->request->data['Requirement']);
        }
        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $requirements = $this->paginate('Requirement');
        $this->loadModel('Requirement');
        //$requirements = $this->Requirement->find('all');die;

        $this->set('requirements',$requirements);
    }

    /**
     * @param null
     * @return null
     */
    public function admin_create() {
        if ($this->request->is('post')) {
            $this->Requirement->create();
            if ($this->Requirement->save($this->request->data)) {
                $this->Session->setFlash("Requirement has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));

            // populate Requirement_package table

        }


        $this->loadModel('RequirementType');
        $get_re_types = $this->RequirementType->find('list');
        $get_client = $this->User->getClient();
        $this->set(compact('get_client','get_re_types'));


    }

    /**
     * @param null $id
     * @return null
     */
    public function admin_update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $requirement= $this->Requirement->findById($id);

        if (!$requirement) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('Requirement', 'put'))) {
           $this->Requirement->id = $id;
           if ($this->Requirement->save($this->request->data)) {
                $this->Session->setFlash("Requirement has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {

            $this->loadModel('RequirementType');
            $get_re_types = $this->RequirementType->find('list');

            $get_client = $this->User->getClient();
            $this->set(compact('get_client','get_re_types'));
            $this->request->data = $requirement;
        }
    }


    /**
     * @param null $id
     * @return redirect to index
     */
    public function admin_delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Requirement->delete($id)) {
            $this->Session->setFlash("Requirement #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'admin_index'));
        }
    }

    public function admin_reset(){
        if($this->Session->check('RequirementFilter')){
            $this->Session->delete('RequirementFilter');
        }
        $this->redirect('index');
    }

    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('RequirementFilter')){
           $filter = $this->Session->read('RequirementFilter.filter');
        }
        if(!empty($filter)){
            $conditions = array('OR' => array(
                array('Requirement.reference_code LIKE' => '%' . $filter . '%'),
                array('Requirement.asin LIKE' => '%' . $filter . '%'),
                array('Requirement.keyword LIKE' => '%' . $filter . '%'),
                array('Requirement.required_status LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }



}