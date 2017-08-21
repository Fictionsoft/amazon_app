<?php
App::uses('AppController', 'Controller');

class ProductRanksController extends AppController{
    public $uses = array();
    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /*
     * Add Product
     * in product tracker
     */
    public function add_product(){
        $this->autoRender = false;

        if( $this->request->is('post')){

            if( !empty( $this->request->data['ProductRank']['asin'] ) ){
               $product_asin = $this->request->data['ProductRank']['asin'] ;

            }else{
                $this->redirect( array( 'controller' => 'ProductRanks', 'action' => 'ranking_tracker' ) );
                $this->Session->setFlash('Please paste either the ASIN or url of your product, 1 per line !', 'default', array('class' => 'alert alert-warning'));
            }

            $api_params = array(
                'Operation' => 'ItemLookup',
                "ItemId" => $product_asin ,// post value
                "IdType" => "ASIN",
                'ResponseGroup' => 'Images,ItemAttributes,Offers,SalesRank,Reviews',
            );

            $api_params = array_merge($this->api_params_global,$api_params);
            $response = $this->Common->apiResponse($api_params);



            if( !empty($response['Items']['Item']) ){

                $items = $response['Items']['Item'];
                $product = array(
                    'ProductRank' => array(
                        'user_id'           => $this->Session->read('Auth.User.id'),
                        'asin'              => $items['ASIN'],
                        'title'             => $items['ItemAttributes']['Title'] ,
                        'product'           => json_encode($items)

                    )
                );

                $this->loadModel('ProductRank');
                $product_is_exists  = $this->ProductRank->findByAsin( $items['ASIN'] );
                if( empty($product_is_exists) ){
                    if ($this->ProductRank->save($product)){
                        $this->Session->setFlash('Product ('.$items['ASIN'].') has been successfully saved !', 'default', array('class' => 'alert alert-success'));
                    }
                }else{
                    $this->Session->setFlash('This product ('.$items['ASIN'].') already exists !', 'default', array('class' => 'alert alert-warning'));
                }
                $this->redirect( array( 'controller' => 'ProductRanks', 'action' => 'ranking_tracker' ) );
            }

        }
    }

    /*
     * ranking tracker
     * show all product
     */
    public function ranking_tracker(){

        $where = null;

        if( !empty( $this->request->data )){
            $filter = $this->request->data['ProductRank']['filter'];
            $where .= "ProductRank.asin LIKE '%". $filter."%' OR ProductRank.title LIKE '%".$filter."%'";

        }


        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $products = $this->paginate('ProductRank');
        $this->set('products', $products);
    }

    public function update( $id = null ){
        $this->autoRender = false;
        if(!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        if( $this->request->is('post') ){

            $this->ProductRank->id = $id;
            if( $this->ProductRank->save( $this->request->data )){
                $this->Session->setFlash('This product has been successfully updated!', 'default', array('class' => 'alert alert-success'));

            }else{
                $this->Session->setFlash('Unable ot update!', 'default', array('class' => 'alert alert-success'));

            }
            $this->redirect( array('controller' => 'ProductRanks', 'action' => 'ranking_tracker') );

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

        if ($this->ProductRank->delete($id)) {
            $this->Session->setFlash("Product #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('controller' => 'ProductRanks', 'action' => 'ranking_tracker'));
        }
    }






}






































