<?php
App::uses('AppController', 'Controller');


class ProductsController extends AppController {
    public $uses = array('Product','Category','Brand');
    public $helpers = array('Html', 'Form', 'Currency');
    public $components = array('Auth','Session','Common', 'FileHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * Feature items
     * @param null
     * @return null
     */
    public function admin_index() {

        if(!empty($this->data)){
            $this->Session->write('ProductFilter', $this->request->data['Product']);
        }

        $where = $this->__builtContentWhere();
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $products = $this->paginate('Product');
        $this->set('products',  $products);
    }



    /**
     * @param null
     * @return null
     */
    public function admin_create() {

        if($this->request->is('post')) {

            // START : cover photo upload
            $cover_photo = $this->request->data['Product']['cover_photo'];
            if ($cover_photo['name']) {
                $result = $this->FileHandler->uploadImage($cover_photo);
                if ($result) {
                    $this->request->data['Product']["cover_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Product']["cover_photo"] = '';
                }
            }else{
                $this->request->data['Product']["cover_photo"] = '';
            }
            //END: cover photo upload


            // START : Product size photo upload
            $product_size_photo = $this->request->data['Product']['product_size_photo'];

            if ($product_size_photo['name']) {
                $result = $this->FileHandler->uploadImage($product_size_photo);
                if ($result) {
                    $this->request->data['Product']["product_size_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Product']["product_size_photo"] = '';
                }
            }else{
                $this->request->data['Product']["product_size_photo"] = '';
            }
            //END: product size photo upload



            //pr($this->data);die;
            $this->Product->create();
            $this->request->data['Product']['created'] = date("Y-m-d H:i:s");

            //pr($this->data);die;

            if($this->Product->save($this->request->data)){


            $this->Session->setFlash("Product has been successfully added",'default',array('class'=>'alert alert-success'));
                $this->redirect('file_manager/'.$this->Product->getInsertID());
            }else{
                $this->Session->setFlash("Unable to save !",'default',array('class'=>'alert alert-danger'));
            }
        }

        $this->set('categories',$this->Category->getCategories());
        $this->set('brands',$this->Brand->getBrands());
    }

    /**
     * @param null $id
     * @return null
     */
    public function admin_update($id = null) {

        if(!$id) {
            throw new NotFoundException(__('Invalid request !'));
        }

        $product= $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid request !'));
        }


        if($this->request->is(array('Product', 'put'))) {

            // start cover photo up
            $cover_photo = $this->request->data['Product']['cover_photo'];
            if ($cover_photo['name']) {
                $result = $this->FileHandler->uploadImage($cover_photo);
                if ($result) {
                    $this->request->data['Product']["cover_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Product']["cover_photo"] = '';
                }
            }else{
                $this->request->data['Product']["cover_photo"] = $product['Product']['cover_photo'];
            }
            // end cover photo up



            // start product size photo up
            $product_size_photo = $this->request->data['Product']['product_size_photo'];
            if ($product_size_photo['name']) {
                $result = $this->FileHandler->uploadImage($product_size_photo);
                if ($result) {
                    $this->request->data['Product']["product_size_photo"] = $this->FileHandler->_uploadimgname;
                }else {
                    $this->request->data['Product']["product_size_photo"] = '';
                }
            }else{
                $this->request->data['Product']["product_size_photo"] = $product['Product']['product_size_photo'];
            }
            // end product size photo up


            $this->Product->id = $id;
            $this->request->data['Product']['modified'] = date("Y-m-d H:i:s");
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash("Product has been updated.",'default',array('class'=>'alert alert-success'));
                $this->redirect('file_manager/'.$id);
            }

            $this->Session->setFlash("Unable to update !",'default',array('class'=>'alert alert-danger'));
        }else{
            $this->request->data = $product;
        }

        $this->set('categories',$this->Category->getCategories());
        $this->set('brands',$this->Brand->getBrands());

    }

    public function admin_file_manager($product_id){

        if($this->request->is('post')){
            $file_type = $this->request->data['file_type'];

            if($file_type == 'Photo'){
                $this->request->data['Photo']['product_id'] = $product_id;
                // START : photo
                $photo = $this->request->data['Photo']['name'];
                if ($photo['name']) {
                    $result = $this->FileHandler->uploadImage($photo);
                    if ($result) {
                        $this->request->data['Photo']['name'] = $this->FileHandler->_uploadimgname;
                        $this->Product->Photo->save($this->request->data);
                        $product_photos = $this->Common->getUploadedPhotos($product_id,$this->webroot);
                        echo $product_photos;die;
                    }
                }
                //END: photo upload
            }
        }else{
            $product_photos = $this->Common->getUploadedPhotos($product_id,$this->webroot);
            $this->set(array(
                'photo_html'=>$product_photos
                )
            );
        }
    }

    function delete_photo($id,$product_id){
        $this->Product->Photo->delete($id);
        $product_photos = $this->Common->getUploadedPhotos($product_id,$this->webroot);
        echo json_encode(array('status'=>true,'photos'=>$product_photos));die;
    }
    /**
     * @param null $id
     * @return redirect to index
     */
    public function admin_delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->delete($id)) {
            $this->Session->setFlash("Product #$id has been successfully deleted !",'default',array('class'=>'alert alert-success'));

            $this->redirect(array('action' => 'admin_index'));
        }
    }

    public function admin_reset(){
        if($this->Session->check('ProductFilter')){
            $this->Session->delete('ProductFilter');
        }
        $this->redirect('index');
    }


    public function __builtContentWhere(){
        $filter = null;
        $conditions = array();

        if($this->Session->check('ProductFilter')){
           $filter = $this->Session->read('ProductFilter.filter');
           $category_id = $this->Session->read('ProductFilter.category_id');
        }
        if(!empty($filter) or !empty($category_id)){
            $conditions = array(
                'OR' => array(
                array('Product.name LIKE' => '%' . $filter . '%'),
                array('Product.slug LIKE' => '%' . $filter . '%'),
                array('Product.price LIKE' => '%' . $filter . '%'),
                array('Category.name LIKE' => '%' . $filter . '%')
                )
            );
            if(!empty($category_id)){
                $conditions['AND'] = array('Product.category_id'=>$category_id);
            }

            $this->log($conditions);
        }

        return $conditions;
    }


    /*
     * Product list
     */
    public function category($slug){

        $category = $this->Product->Category->findBySlug($slug);

        $where = array('Product.status'=>1,'Product.category_id'=>$category['Category']['id']);
        $this->paginate = array(
            'conditions' => $where,
            'limit' => 30,
            'order' => array('id' => 'desc')
        );

        $products = $this->paginate('Product');

        if(!empty($products)){
            $this->set('products',  $products);
            $this->set('category',  $category['Category']['name']);
        }else{
            $this->Session->setFlash("Product could not found !",'default',array('class'=>'alert alert-warning'));
        }
    }


    public function product_finder(){

        if( $this->request->is('post')){

            $api_params = array(
                'Operation' => 'ItemSearch',
                'SearchIndex' => $this->request->data['ProductFinderSearch']['category'],
                'MinimumPrice'=> $this->request->data['ProductFinderSearch']['min'],
                'MaximumPrice'=> $this->request->data['ProductFinderSearch']['max'],
                'ResponseGroup' => 'Images,ItemAttributes,Offers,SalesRank,Reviews',
                'Keywords' => $this->request->data['ProductFinderSearch']['category'],
                'Sort' => 'salesrank',
            );

            $api_params = array_merge($this->api_params_global,$api_params);
            $response = $this->Common->apiResponse($api_params);

            $this->set('category', $this->request->data['ProductFinderSearch']['category']);

            if(!empty( $response['Items']['Item'])){

                $items = $response['Items']['Item'];
                /*if( !empty($this->request->data['ProductFinderSearch']) ){
                    $product = array(
                        'ProductRank' => array(
                            'asin'    => $items[0]['ASIN'],
                            'title'    => $items[0]['ItemAttributes']['Title'] ,
                            'product'    => json_encode($items[0])

                        )
                    );

                    $this->loadModel('ProductRank');
                    $this->ProductRank->save($product);
                }*/

                $this->set('items', $items);
            }else{
                $this->Session->setFlash("Product could not found !",'default',array('class'=>'alert alert-warning'));
            }


        }

        $get_search_categories = array(
            //'All'               		=> 'All',
            'Apparel'            		=> 'Apparel',
            'Appliances'           		=> 'Appliances' ,
            'Automotive'        		=> 'Automotive',
            'Baby'       				=> 'Baby',
            'Beauty'    				=> 'Beauty',
            'Blended'       			=> 'Blended',
            'Books'           			=> 'Books',
            'Classical'           		=> 'Classical',
            'DVD'           			=> 'DVD',
            'Electronics'        		=> 'Electronics',
            'GiftCards'             	=> 'GiftCards',
            'HealthPersonalCare'       	=> 'Health & Personal Care',
            'Jewelry'        			=> 'Jewelry',
            'KindleStore'            	=> 'Kindle Store',
            'Kitchen'					=> 'Kitchen',
            'outdoorliving'     		=> 'Lighting',
            'Luggage' 					=> 'Luggage',
            'MP3Downloads' 				=> 'MP3Downloads',
            'MobileApps' 				=> 'Mobile Apps',
            'Music' 					=> 'Music',
            'MusicalInstruments' 		=> 'Musical Instruments',
            'OfficeProducts' 			=> 'Office Products',
            'PCHardware' 				=> 'PCHardware',
            'PetSupplies' 				=> 'PetSupplies',
            'Shoes' 					=> 'Shoes',
            'Software' 					=> 'Software',
            'SportingGoods' 			=> 'Sporting Goods',
            'Tools' 					=> 'Tools',
            'Toys' 						=> 'Toys',
            'UnboxVideo' 				=> 'Unbox Video',
            'VHS'                     	=> 'VHS',
            'VideoGames'              	=> 'Video Games',
            'Watches'                 	=> 'Watches'

        );





        $this->set('categories',$get_search_categories);

    }


    public function product_evaluator(){
        if( $this->request->is('post')){

            $api_params = array(
                'Operation' => 'ItemSearch',
                'SearchIndex' =>'All',
                'ResponseGroup' => 'Images,ItemAttributes,Offers,SalesRank,Reviews',
                'Keywords' => $this->request->data['ProductKeywordSearch']['keyword'],
                //'Sort' => 'salesrank',
            );

            $api_params = array_merge($this->api_params_global,$api_params);

            $response = $this->Common->apiResponse($api_params);

            //pr($response);die;

            if( empty($response['Items']['Item']) ){
                $this->Session->setFlash('Sorry, Product is not available!','default',array('class'=>'alert alert-danger'));
            }else{
                $this->set('items', $response['Items']['Item']);
            }

        }

    }

    public function keyword_cloud(){
        if( $this->request->is('post')){
            $keywords = array($this->request->data['KeywordCloudSearch']['product_name'],$this->request->data['KeywordCloudSearch']['product_additional_keyword']);

            if($keywords){

                $all_keywords = $get_keywords = array();

                foreach($keywords as $keyword){
                    $url='http://completion.amazon.com/search/complete?search-alias=aps&client=amazon-search-ui&mkt=1&q='.$keyword;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents

                    $data = curl_exec($ch); // execute curl request
                    curl_close($ch);

                    $keywords = $this->formattedKeywords($data);
                    if($get_keywords){
                        $all_keywords = array_merge($get_keywords,$keywords);
                    }

                    $get_keywords = $keywords;
                }

            }

            if(count($all_keywords)>0){
                $this->set('keywords',$all_keywords);
            }else{
                $this->Session->setFlash('Sorry, no keyword found','default',array('class'=>'alert alert-danger'));
            }
        }

    }

    function formattedKeywords($data){

        $keywords = explode(',',$data);

        if($keywords){
            $formatted_keywords = array();
            foreach($keywords as $key=>$value){
                if($key>=1 and $key<11){
                    if($key==1){
                        $value = substr($value, 2, -1);

                    }elseif($key==10){
                        $value = substr($value, 1, -2);

                    }else{
                        $value = substr($value, 1, -1);

                    }

                    array_push($formatted_keywords,$value);
                }
            }

            return $formatted_keywords;
        }

    }

}



