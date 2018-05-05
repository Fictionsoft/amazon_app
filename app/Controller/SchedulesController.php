<?php
App::uses('AppController', 'Controller');


class SchedulesController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    //public $uses = array('Brand');

    /*public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array(''));
    }*/

    /**
     * @param null
     * @return null
     */
    public function index() {
        //$this->autoRender = false;

        if(!empty($this->data)){
            $this->Session->write('ScheduleFilter', $this->request->data['Schedule']['filter']);
        }
        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('name' => 'desc')
        );

        $schedules = $this->paginate('Schedule');
        //$brands = $this->Brand->find('all');die;

        $this->set('schedules',$schedules);
    }

    /**
     * @param null
     * @return null
     */
    public function create() {
        if ($this->request->is('post')) {
            $this->Schedule->create();
            $this->request->data['Schedule']['date_created'] = date("Y-m-d H:i:s");

            if ($this->Schedule->save($this->request->data)) {
                $this->Session->setFlash("Schedule has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));

            // populate Brand_package table

        }
    }

    /**
     * @param null $id
     * @return null
     */
    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $schedule = $this->Schedule->findById($id);

        if (!$schedule) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('Schedule', 'put'))) {
           $this->Schedule->id = $id;
           $this->request->data['Schedule']['date_updated'] = date("Y-m-d H:i:s");
           if ($this->Schedule->save($this->request->data)) {
                $this->Session->setFlash("Schedule has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {
            $this->request->data = $schedule;
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

        if ($this->Schedule->delete($id)) {
            $this->Session->setFlash("Schedule #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'index'));
        }
    }

    public function reset(){
        if($this->Session->check('ScheduleFilter')){
            $this->Session->delete('ScheduleFilter');
        }
        $this->redirect('index');
    }

    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('ScheduleFilter')){
           $filter = $this->Session->read('ScheduleFilter');
        }
        if(!empty($filter)){
            $conditions = array('OR' => array(
                array('Schedule.name LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }



}