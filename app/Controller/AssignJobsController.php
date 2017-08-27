<?php
App::uses('AppController', 'Controller');


class AssignJobsController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    public $uses = array('AssignJob');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('get_jobs_and_workers'));
    }

    /**
     * @param null
     * @return null
     */
    public function admin_index() {
        //$this->autoRender = false;
        if(!empty($this->data)){
            $this->Session->write('AssignJobFilter', $this->request->data['filter']);
        }
        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('name' => 'asc')
        );

        $assign_jobs = $this->paginate('AssignJob');
        $this->loadModel('AssignJob');
        //$assign_jobs = $this->AssignJob->find('all');die;

        $this->set('assign_jobs',$assign_jobs);
    }

    /**
     * @param null
     * @return null
     */
    public function admin_create() {
        if ($this->request->is('post')) {
            $this->AssignJob->create();
            $this->request->data['AssignJob']['date_created'] = date("Y-m-d H:i:s");

            if ($this->AssignJob->save($this->request->data)) {
                $this->Session->setFlash("AssignJob has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));

            // populate AssignJob_package table

        }
    }

    /**
     * @param null $id
     * @return null
     */
    public function admin_update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $brand= $this->AssignJob->findById($id);

        if (!$brand) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('AssignJob', 'put'))) {
           $this->AssignJob->id = $id;
           $this->request->data['AssignJob']['date_updated'] = date("Y-m-d H:i:s");
           if ($this->AssignJob->save($this->request->data)) {
                $this->Session->setFlash("AssignJob has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {
            $this->request->data = $brand;
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

        if ($this->AssignJob->delete($id)) {
            $this->Session->setFlash("AssignJob #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'admin_index'));
        }
    }

    public function admin_reset(){
        if($this->Session->check('AssignJobFilter')){
            $this->Session->delete('AssignJobFilter');
        }
        $this->redirect('index');
    }

    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('AssignJobFilter')){
           $filter = $this->Session->read('AssignJobFilter.filter');
        }
        if(!empty($filter)){
            $conditions = array('OR' => array(
                array('AssignJob.name LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }

    function get_jobs_and_workers($requirement_id){
        $this->loadModel('WorkerJob');

        $assign_jobs = $this->AssignJob->find('all', array('conditions' => array('AssignJob.requirement_id' => $requirement_id ),
            'fields' => array('Job.id', 'Job.name')
        ));

        if($assign_jobs){
            foreach($assign_jobs as $key => $assign_job){
                $job_id = $assign_job['Job']['id'];
                $worker_job = $this->WorkerJob->find('all', array('conditions' => array('WorkerJob.job_id' => $job_id ),
                    'fields' => array('User.id, User.first_name, User.last_name, User.email')
                ));

                if($worker_job){
                    $assign_job['WorkerJob'] = $worker_job;
                    $assign_jobs[$key] = $assign_job;
                }
            }
        }

        return $assign_jobs;

    }

}