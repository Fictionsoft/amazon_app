<?php
App::uses('AppController', 'Controller');


class JobsController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    public $uses = array('Job','User','Requirement','AssignJob','WorkerJob');

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
            $this->Session->write('JobFilter', $this->request->data['Job']);
        }
        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $this->Job->recursive = 2;
        $jobs = $this->paginate('Job');
        $this->loadModel('Job');
        $this->set('jobs',$jobs);
    }

    /**
     * @param null
     * @return null
     */
    public function admin_create() {
        if ($this->request->is('post')) {

            //pr($this->request->data);die;

            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $job_id = $this->Job->getLastInsertId();
                // Save assign jobs
                $this->create_assign_job($job_id);

                // Save worker jobs
                $this->create_worker_job($job_id);

                $this->Session->setFlash("Job has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));
        }

        $get_workers = $this->User->getWorkers();
        $requirements = $this->Requirement->requirements();

        $this->set('get_workers',$get_workers);
        $this->set('requirements',$requirements);
    }


    /**
     * @param null $id
     * @return null
     */
    public function admin_update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $job= $this->Job->findById($id);

        if (!$job) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('Job', 'put'))) {

           $this->Job->id = $id;
           if ($this->Job->save($this->request->data)) {
               $job_id = $id;
               // delete assign jobs
               $prefix = $this->Job->tablePrefix;
               $this->AssignJob->query('DELETE FROM '.$prefix.'assign_jobs WHERE job_id = '.$job_id);

               // Save assign jobs
               $this->create_assign_job($job_id);

               // delete worker jobs
               $prefix = $this->WorkerJob->tablePrefix;
               $this->WorkerJob->query('DELETE FROM '.$prefix.'worker_jobs WHERE job_id = '.$job_id);

               // Save worker jobs
               $this->create_worker_job($job_id);

               $this->Session->setFlash("Job has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {
            $get_workers = $this->User->getWorkers();
            $requirements = $this->Requirement->requirements();
            $get_job_requirements = $this->get_job_requirements($id);
            $get_job_workers = $this->get_job_workers($id);

            //pr($get_job_workers);

            $this->set('get_workers',$get_workers);
            $this->set('requirements',$requirements);
            $this->set('get_job_requirements',$get_job_requirements);
            $this->set('get_job_workers',$get_job_workers);
            $this->request->data = $job;
        }
    }


    public function create_assign_job($job_id){

        foreach($this->request->data['Requirement']['id'] as $requirement_id ){
            $assign_jobs = array('AssignJob'=>array('job_id'=>$job_id, 'requirement_id'=>$requirement_id));
            $this->AssignJob->create();
            $this->AssignJob->save($assign_jobs);
        }

    }

    public function create_worker_job($job_id){
        foreach($this->request->data['Job']['user_id'] as $worker_id ){
            $worker_jobs = array('WorkerJob'=>array('job_id'=>$job_id, 'user_id'=>$worker_id));
            $this->WorkerJob->create();
            $this->WorkerJob->save($worker_jobs);
        }

    }


    public function get_job_requirements($job_id){
        $get_job_requirements = $this->AssignJob->find('all', array('conditions'=>array('AssignJob.job_id' => $job_id)));
        return $get_job_requirements;

    }

    public function get_job_workers($job_id){
        $get_job_workers = $this->WorkerJob->find('all', array('conditions'=>array('WorkerJob.job_id' => $job_id),'fields'=>array('user_id') ) );
        $job_workers = array();
        foreach($get_job_workers as $get_job_worker){
            $job_workers[] = $get_job_worker['WorkerJob']['user_id'];
        }
        return $job_workers;

    }

    /**
     * @param null $id
     * @return redirect to index
     */
    public function admin_delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Job->delete($id)) {
            $this->Session->setFlash("Job #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'admin_index'));
        }
    }

    public function admin_reset(){
        if($this->Session->check('JobFilter')){
            $this->Session->delete('JobFilter');
        }
        $this->redirect('index');
    }

    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('JobFilter')){
           $filter = $this->Session->read('JobFilter.filter');
        }
        if(!empty($filter)){
            $conditions = array('OR' => array(
                array('Job.name LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }

    public function admin_details($id){
        $this->Job->recursive = 2;
        $job = $this->Job->findById($id);
        $this->set('job',$job);

    }

    public function my_jobs($job_status = null){
        $this->Job->recursive = 0;
        $user_id = $this->Session->read('Auth.User.id');
        $my_jobs = $this->Job->find('all',array('conditions'=>array('Job.user_id'=>$user_id, 'Job.status'=>1,'Job.job_status'=>$job_status)));
        if(!$my_jobs){
            $this->Session->setFlash("Job not found!",'default',array('class'=>'alert alert-warning'));
        }
        $this->set('my_jobs',$my_jobs);

    }

    // Job details
    public function details($id){
        $this->Job->recursive = 2;
        $job = $this->Job->findById($id);
        $this->set('job',$job);

        // Put job status information
        $this->request->data = $job;
    }


    public function update_status(){
        $this->autoRender = false;
        $id = $this->request->data['Job']['id'];
        $job_status = $this->request->data['Job']['job_status'];

        $this->Job->id = $id;

        if($this->Job->save( $this->request->data)){
            $this->Session->setFlash("Job status has been successfully updated !",'default',array('class'=>'alert alert-success'));
            $this->redirect(array('action' => 'my_jobs',$job_status));
        }


    }



}