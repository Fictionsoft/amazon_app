<?php
App::uses('AppController', 'Controller');

/**
 * Attachments Controller
 *
 * @property Attachments $Airline
 * @property PaginatorComponent $Paginator
 */
class AttachmentsController extends AppController
{

    public $components = array('Paginator', 'FileHandler', 'Common');


    /**
     * admin_browse method
     *
     * @return void
     */

    public function admin_browse(){
        $this->layout = 'admin_popup';
        $this->Attachment->recursive = 0;
        if (!empty($this->data)) {
            $this->Session->write('Attachment.filter', trim($this->data['Attachment']['filter']));
        }
        $where = $this->__builtContentWhere();

        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );
        $this->set('attachments', $this->Paginator->paginate());

    }

    /**
     * admin_add method
     *
     * @return void
     */

    public function admin_add()
    {
        $this->layout = 'admin_popup';
        if ($this->request->is('post')) {
            $this->Attachment->create();

            $result = "";
            //START: File Upload
            $file = $this->request->data['Attachment']['image'];
            if ($file['name']) {
                $result = $this->FileHandler->uploadImage($file);
                if (empty($result)) {
                    $this->Session->setFlash(__('Sample could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
                }
                if ($result) {
                    $this->request->data['Attachment']["image"] = $this->FileHandler->_uploadimgname;
                } else {
                    $this->request->data['Attachment']["image"] = '';
                }
            }

            if (!empty($result) || isset($this->request->data['image']['error']) == 4) {

                $this->request->data['Attachment']['name'] = $this->request->data['Attachment']["name"];

                $this->request->data['Attachment']['path'] = $this->request->data['Attachment']["image"];

                $this->request->data['Attachment']['mime_type'] = $file['type'];
                $this->request->data['Attachment']['created'] = date('Y-m-d H:i:s');
                $this->request->data['Attachment']['ordering'] = 1;


                if ($this->Attachment->save($this->request->data)) {
                    $this->Session->setFlash(__('The attachments has been saved successfully.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'browse'));
                } else {
                    $this->Session->setFlash(__('The attachments could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->layout = 'admin_popup';
        if (!$this->Attachment->exists($id)) {
            throw new NotFoundException(__('Invalid Attachment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $result="";
            $id = $this->request->data['Attachment']['id'];
            $attachment = $this->Attachment->find('first', array('conditions' => array('Attachment.id' => $id)));


            //START: File Upload
            $file = $this->request->data['Attachment']['image'];
            if ($file['name']) {
                $result = $this->FileHandler->uploadImage($file);
                if (empty($result)) {
                    $this->Session->setFlash(__('Sample could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
                }
                if ($result) {
                    $this->request->data['Attachment']["image"] = $this->FileHandler->_uploadimgname;
                    $this->request->data['Attachment']['path'] =  $this->request->data['Attachment']["image"];
                } else {
                    $this->request->data['Attachment']["image"] = '';
                }
            } else {
                if (!empty($attachment)) {
                    $this->request->data['Attachment']['path'] = $attachment['Attachment']['path'];
                } else {
                    $this->request->data['Attachment']["image"] = '';
                }
            }
            //END: File Upload

            if ($this->request->data['Attachment']) {

                $this->request->data['Attachment']['mime_type'] = $file['type'];
                $this->request->data['Attachment']['updated'] = date('Y-m-d H:i:s');
                $this->request->data['Attachment']['ordering'] = 1;

                if ($this->Attachment->save($this->request->data)) {
                    $this->Session->setFlash(__('The attachment has been updated successfully.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'browse'));
                } else {
                    debug('aa'); die;
                    $this->Session->setFlash(__('The attachment could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }else{
                $this->Session->setFlash(__('The attachment could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            } }else {
            $options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
            $this->request->data = $this->Attachment->find('first', $options);
        }
    }


    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Attachment->id = $id;
        if (!$this->Attachment->exists()) {
            throw new NotFoundException(__('Invalid Attachment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Attachment->delete()) {
            $this->Session->setFlash(__('The Attachment has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The Attachment could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => 'Attachments', 'action' => 'browse?CKEditor=editor1&CKEditorFuncNum=1&langCode=en'));
    }

    public function __builtContentWhere()
    {
        $filter = null;
        $conditions = array();

        if ($this->Session->check('Attachment')) {
            $filter = $this->Session->read('Attachment.filter');

        }
        if (!empty($filter)) {
            $conditions = array('OR' => array(
                array('Attachment.name LIKE' => '%' . $filter . '%')
            ));
        }

        return $conditions;
    }

}
