<?php
App::uses('AppController', 'Controller');


class JobLinksController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    public $uses = array('JobLink','User','Requirement','AssignJob','WorkerJob');

    public function index() {
        $this->getJobLinks();
    }

    public function admin_index() {
        $this->getJobLinks();

        $worker_list = $this->User->getWorkers();
        $this->set('worker_list',$worker_list);
    }

    function getJobLinks(){
        if($this->params['prefix'] == 'admin'){

            if ($this->request->is('post')) {
                $conditions = '1=1';
                if(!empty($this->request->data['JobLink']['user_id'] ) ) {
                    $conditions .= ' AND JobLink.user_id = '.$this->request->data['JobLink']['user_id'];
                }

                if(!empty($this->request->data['JobLink']['start_date'] ) and !empty($this->request->data['JobLink']['end_date'] )) {
                    $start_date = $this->dateFormat($this->request->data['JobLink']['start_date']);
                    $end_date = $this->dateFormat($this->request->data['JobLink']['end_date']);
                    $conditions .= ' AND JobLink.created BETWEEN "'.$start_date.'" AND "'.$end_date.'"';
                }

                $conditions = array($conditions);
            }else{
                $conditions = array('1=1');
            }

        }else{
            $conditions = array('JobLink.user_id' => $this->Session->read('Auth.User.id') );
        }

        $this->JobLink->recursive = 2;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 30,
            'order' => array('JobLink.id' => 'desc')
        );

        $job_links = $this->paginate('JobLink');

        $this->set('job_links', $job_links);
    }

    function dateFormat($date){
        $start_date = explode('/',$date);
        return $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
    }


    public function create() {
        if ($this->request->is('post')) {
            $this->request->data['JobLink']['user_id'] = $this->Session->read('Auth.User.id');
            $this->JobLink->create();
            if ($this->JobLink->save($this->request->data)) {
                $this->Session->setFlash("Job links has been added successfully",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));
        }

        $this->set('worker_pending_jobs', $this->workerPendingJobs() );
    }

    function workerPendingJobs(){
        $user_id = $this->Session->read('Auth.User.id');

        $this->loadModel('WorkerJob');
        $pending_jobs = $this->WorkerJob->find('all',array(
            'conditions'=>array('WorkerJob.user_id'=>$user_id, 'Job.status'=>1,'Job.job_status'=>0 ),
            'fields' => array('WorkerJob.id','Job.id','Job.name','Job.created')
        ));

        $worker_pending_jobs = array();
        if($pending_jobs){
            foreach($pending_jobs as $pending_job){
                $worker_pending_jobs[$pending_job['WorkerJob']['id']] = $pending_job['Job']['name'];
            }
        }

        return $worker_pending_jobs;
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $job_link= $this->JobLink->findById($id);

        if (!$job_link) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('post', 'put'))) {

           $this->JobLink->id = $id;
           if ($this->JobLink->save($this->request->data)) {

               $this->Session->setFlash("Job link has been updated.",'default',array('class'=>'alert alert-success'));
               $this->redirect(array('action' => 'index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {
            $this->request->data = $job_link;
            $this->set('worker_pending_jobs', $this->workerPendingJobs() );
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->JobLink->delete($id)) {
            $this->Session->setFlash("Job link #$id has been deleted successfully!",'default',array('class'=>'alert alert-success'));
            $this->redirect($this->referer());
        }
    }

}