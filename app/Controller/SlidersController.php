<?php
App::uses('AppController', 'Controller');


class SlidersController extends AppController {
    public $uses = array('Slider');
    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(
            'slider'
        );
    }

    /**
     * Feature items
     * @param null
     * @return null
     */
    public function admin_index() {

        $sliders = $this->paginate('Slider');
        $this->set('sliders',  $sliders);
    }



    /**
     * @param null
     * @return null
     */
    public function admin_create() {

        if($this->request->is('post')) {

            // START : cover photo upload
            $cover_photo = $this->request->data['Slider']['cover_photo'];
            if ($cover_photo['name']) {
                $result = $this->FileHandler->uploadImage($cover_photo);
                if ($result) {
                    $this->request->data['Slider']["cover_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Slider']["cover_photo"] = '';
                }
            }else{
                $this->request->data['Slider']["cover_photo"] = '';
            }
            //END: cover photo upload


            $this->Slider->create();
            if($this->Slider->save($this->request->data)){

            $this->Session->setFlash("Slider has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect('index');
            }else{
                $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));
            }
        }

    }

    /**
     * @param null $id
     * @return null
     */
    public function admin_update($id = null) {

        if(!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $slider= $this->Slider->findById($id);
        if (!$slider) {
            throw new NotFoundException(__('Invalid request !'));
        }


        if($this->request->is(array('Slider', 'put'))) {

            // start cover photo up
            $cover_photo = $this->request->data['Slider']['cover_photo'];
            if ($cover_photo['name']) {
                $result = $this->FileHandler->uploadImage($cover_photo);
                if ($result) {
                    $this->request->data['Slider']["cover_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Slider']["cover_photo"] = '';
                }
            }else{
                $this->request->data['Slider']["cover_photo"] = $slider['Slider']['cover_photo'];
            }
            // end cover photo up

            $this->Slider->id = $id;

            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash("Slider has been updated.",'default',array('class'=>'alert alert-success'));
                //$this->redirect('file_manager/'.$id);
                $this->redirect('index');
            }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }else{
            $this->request->data = $slider;
        }

    }




    /**
     * @param null $id
     * @return redirect to index
     */
    public function admin_delete($id = null) {
        /*if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }*/

        if ($this->Slider->delete($id)) {
            $this->Session->setFlash("Slider #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'admin_index'));
        }
    }




    // home page slider select
    public function slider() {
        $sliders = $this->Slider->find('all',array('conditions'=>array('status'=>1)));
        return $sliders;
    }


}
