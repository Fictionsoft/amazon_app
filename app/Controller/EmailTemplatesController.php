<?php
App::uses('AppController', 'Controller');

class EmailTemplatesController extends AppController {


    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');
    //public $uses = array('EmailTemplate');

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
            $this->Session->write('EmailTemplateFilter', $this->request->data['EmailTemplate']);
        }
        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $email_templates = $this->paginate('EmailTemplate');
        $this->loadModel('EmailTemplate');
        //$email_templates = $this->EmailTemplate->find('all');die;

        $this->set('email_templates',$email_templates);
    }

    /**
     * @param null
     * @return null
     */
    public function create() {

        if ($this->request->is('post')) {

            $this->EmailTemplate->create();

            if ($this->EmailTemplate->save($this->request->data)) {
                $id = $this->EmailTemplate->getInsertID();

                //$this->getEmailContent($id);

                $this->Session->setFlash("Email template has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));

            // populate EmailTemplate_package table

        }

        $this->set('message', null);
    }

    /**
     * @param null $id
     * @return null
     */
    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        //$message = $this->getEmailContent($id);

        $email_template= $this->EmailTemplate->findById($id);

        //pr($email_template); die;

        if (!$email_template) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if ($this->request->is(array('EmailTemplate', 'put'))) {
           $this->EmailTemplate->id = $id;

           if ($this->EmailTemplate->save($this->request->data)) {
                $this->Session->setFlash("Email template has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
           }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }

        if (!$this->request->data) {
            $this->request->data = $email_template;
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

        if ($this->EmailTemplate->delete($id)) {
            $this->Session->setFlash("Email Template #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_reset(){
        if($this->Session->check('EmailTemplateFilter')){
            $this->Session->delete('EmailTemplateFilter');
        }
        $this->redirect('index');
    }

    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('EmailTemplateFilter')){
           $filter = $this->Session->read('EmailTemplateFilter.filter');
        }
        if(!empty($filter)){
            $conditions = array('OR' => array(
                array('EmailTemplate.name LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }

    public function admin_details($id = null){
        $template  = $this->EmailTemplate->findById($id);
        $this->set('template', $template);

    }

    // CK Editor: Start
    function getEmailContent($id = null){

        $filepath = WWW_ROOT.'uploads'.DS.'emailtemplates';

        if (!is_dir($filepath) && !is_file($filepath)) {
            $this->FileHandler->createFolder($filepath, '0777');
        }

        $path = $filepath.DS.$id.'.txt';

        if(is_file($path)) {
            $this->file = new File($path, true);
            $content = $this->file->read();

        }else{
            $create_file = fopen($path,"wb");
            fclose($create_file);
            $content = '';
        }

        if (!empty($this->request->data) ) {
            $this->file->write($this->request->data['EmailTemplate']['message']);
        }

        return $content;
    }
    // CK Editor: End


    function test(){

    }
}