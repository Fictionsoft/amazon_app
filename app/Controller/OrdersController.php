<?php
App::uses('AppController', 'Controller');

class OrdersController extends AppController {
    var $name = 'Orders';
    public $helpers = array('Html', 'Form');
    public $uses = array('Order');
    public $components = array( 'Common', 'Auth', 'Session', 'Cookie', 'RequestHandler', 'Email','ApiMws','EmailHandler' );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->autoRender = false;
        $this->Auth->allow(array('index','create') );
    }

    public function index(){

        $vars = array(
            '[[buyer-name]]',
            '[[first-name]]',
            '[[buyer-email]]',
            '[[product-name]]',
            '[[order-id]]',
            '[[msku]]',
            '[[asin]]',
            '[[quantity]]',
            '[[price-item]]',
            '[[price-shipping]]',
            //'[[condition-note]]',
            '[[recipient]]',
            '[[purchase-date]]',
            '[[ship-address1]]',
            '[[ship-address2]]',
            '[[ship-city]]',
            '[[ship-state]]',
            '[[ship-zip]]',
            '[[ship-country]]',
            //'[[carrier]]',
            //'[[tracking-number]]',
            '[[estimated-arrival]]',
            '[[feedback-link]]',
            '[[contact-link]]',
            '[[order-link]]',
            '[[product-link]]',
            '[[product-review-link]]',
            //'[[tracking-link]]',
            '[[store-link]]',
            '[[store-link-alt]]',
            //'[[unsubscribe-link]]'
        );


        $seller = $this->Session->read('Auth.User.Seller');
        $email_counter = 0;
        $orders = $this->Order->find('all');
        if($orders){
            $this->loadModel('EmailTemplate');
            $email_templates = $this->EmailTemplate->find('all', array('conditions' => array('status' => 1 ) ) );
            if($email_templates){
                foreach($email_templates as $email_template){
                    foreach($orders as $order){
                        $order_and_item = json_decode($order['Order']['order'], true);

                        pr($order_and_item);

                        if(isset($order_and_item['order']['BuyerEmail'])){
                            $order_array = $this->__createOrderArray($order_and_item['order']);
                            $items_array = $this->__createItemsArray($order_and_item['items']);
                            $all_values = array_merge($order_array, $items_array);

                            if($email_template){
                                $is_email_sandable = $this->__isEmailSendible($all_values, $email_template['EmailTemplate']);
                                if(!$is_email_sandable) continue;


                                $order_id = $all_values['AmazonOrderId'];
                                $asin = $all_values['ASIN'];

                                $links = array(
                                    'feedback_link'                 => 'http://www.amazon.com/gp/feedback/leave-customer-feedback.html/?order='.$order_id.'&pageSize=1',
                                    'contact_link'                  => 'http://www.amazon.com/gp/help/contact/contact.html?marketplaceID='.$seller['marketplace_id'].'&orderID='.$order_id.'&sellerID='.$seller['seller_id'],
                                    'order_link'                    => 'http://www.amazon.com/gp/css/summary/edit.html?orderID='.$order_id,
                                    'product_link'                  => '',
                                    'product_review_link'           => 'http://www.amazon.com/review/create-review?&asin='.$asin,
                                    'tracking_link'                 => 'http://wwwapps.ups.com/WebTracking/track?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&WBPM_lid=homepage%2Fct1.html_pnl_trk&trackNums=1Z1234567890ABCDEFG&track.x=Track',
                                    'store_link'                    => 'http://www.amazon.com/gp/aag/main?marketplaceID='.$seller['marketplace_id'].'&seller='.$seller['seller_id'],
                                    'store_link_alt'                => 'http://www.amazon.com/gp/node/index.html?marketplaceID='.$seller['marketplace_id'].'&me='.$seller['seller_id'].'&merchant='.$seller['seller_id'].'&redirect=true',
                                    'unsubscribe_link'              => 'https://www.fbgtk.com/unsubscribe/IugXvnaYdWrWwXNv/83J5GQlGtmrrto3'
                                );

                                $values = array(
                                    '[[buyer-name]]'                => $all_values['BuyerName'],
                                    '[[first-name]]'                => $all_values['BuyerName'],
                                    '[[buyer-email]]'               => $all_values['BuyerEmail'],
                                    '[[product-name]]'              => $all_values['Title'],
                                    '[[order-id]]'                  => $order_id,
                                    '[[msku]]'                      => $all_values['SellerSKU'],
                                    '[[asin]]'                      => $asin,
                                    '[[quantity]]'                  => $all_values['QuantityOrdered'],
                                    '[[price-item]]'                => $all_values['ItemPrice-Amount'],
                                    '[[price-shipping]]'            => (isset($all_values['ShippingPrice-Amount']))?$all_values['ShippingPrice-Amount']:'',
                                    //'[[condition-note]]'            => '',
                                    '[[recipient]]'                 => $all_values['BuyerEmail'],
                                    '[[purchase-date]]'             => $all_values['PurchaseDate'],
                                    '[[ship-address1]]'             => $all_values['ShippingAddress-AddressLine1'],
                                    '[[ship-address2]]'             => (isset($all_values['ShippingAddress-AddressLine2']))?$all_values['ShippingAddress-AddressLine2']:'',
                                    '[[ship-city]]'                 => $all_values['ShippingAddress-City'],
                                    '[[ship-state]]'                => $all_values['ShippingAddress-StateOrRegion'],
                                    '[[ship-zip]]'                  => $all_values['ShippingAddress-PostalCode'],
                                    '[[ship-country]]'              => $all_values['ShippingAddress-CountryCode'],
                                    //'[[carrier]]'                   => '',
                                    //'[[tracking-number]]'           => '',
                                    '[[estimated-arrival]]'         => $all_values['LatestShipDate'],
                                    '[[feedback-link]]'             => $links['feedback_link'],
                                    '[[contact-link]]'              => $links['contact_link'],
                                    '[[order-link]]'                => $links['order_link'],
                                    '[[product-link]]'              => $links['product_link'],
                                    '[[product-review-link]]'       => $links['product_review_link'],
                                    //'[[tracking-link]]'             => $links['tracking_link'],
                                    '[[store-link]]'                => $links['store_link'],
                                    '[[store-link-alt]]'            => $links['store_link_alt'],
                                    //'[[unsubscribe-link]]'          => $links['unsubscribe_link']
                                );

                                // message
                                $message = $email_template['EmailTemplate']['message'];
                                $link_vars_message = $this->__linkVars($message, $links);

                                if($link_vars_message) {
                                    $vars_message = array_merge($vars, $link_vars_message['variable_links']);
                                    $values_message = array_merge($values, $link_vars_message['value_links']);
                                    $message = str_replace($vars_message, $values_message, $message);
                                }

                                // subject
                                $subject = $email_template['EmailTemplate']['subject'];
                                $link_vars_subject = $this->__linkVars($subject, $links);

                                if($link_vars_subject) {
                                    $vars_subject = array_merge($vars, $link_vars_subject['variable_links']);
                                    $values_subject = array_merge($values, $link_vars_subject['value_links']);
                                    $subject = str_replace($vars_subject, $values_subject, $subject);
                                }

                                $view_var = array('message' => $message);

                                $info = array(
                                    'to'            =>$values['[[buyer-email]]'],
                                    //'to'            =>'mizan92cse@gmail.com',
                                    //'to'            =>'lb9t18j0l95l2lm@marketplace.amazon.com',
                                    'subject'       =>$subject,
                                    'email_template'=>'order_message',
                                    'view_var'      =>$view_var
                                );

                                //pr($info);die;
                                //$this->EmailHandler->submit($info);
                                $email_counter++;
                            }

                        }else{
                            $msg = 'Buyer email could not found';
                        }
                    }
                }

            }else{
                $msg = 'No message found!';
            }

        }else{
            $msg = 'No order found!';
        }

        /*if($email_counter==0){
            $this->Session->setFlash($email_counter.' Email has been sent.','default',array('class'=>'alert alert-danger'));
        }else{
            $this->Session->setFlash($email_counter.' Email(s) has been sent.','default',array('class'=>'alert alert-success'));
        }

        $this->redirect(array('controller'=>'EmailTemplates'));*/
    }

    public function create(){
        $this->Order->deleteAll(array('1 = 1'));
        $orders = $this->ApiMws->getListOrders($this->request->data['EmailTemplate']['date_from'], $this->request->data['EmailTemplate']['date_to']);
        $this->Order->saveAll($orders);
        $this->redirect(array('controller'=>'EmailTemplates'));
    }

    function __createOrderArray($order){
        $order_array = array();
        foreach($order as $key=>$value){

            if(is_array($value)){
                foreach($value as $k=>$v){
                    $order_array[$key.'-'.$k] = $v;
                }

            }else{
                $order_array[$key] = $value;
            }
        }

        return $order_array;
    }

    function __createItemsArray($items){
        $item_array = array();
        foreach($items[0] as $key=>$value){

            if(is_array($value)){
                foreach($value as $k=>$v){
                    $item_array[$key.'-'.$k] = $v;
                }

            }else{
                $item_array[$key] = $value;
            }
        }

        return $item_array;
    }

    function __linkVars($message, $links){
        preg_match_all("/\[[^\]]*\]*\]/", $message, $message_links);

        if($message_links[0]){
            $variable_links = $value_links = array();
            foreach($message_links[0] as $k => $v){
                $link_vars = explode(':', $v );
                if(count($link_vars) > 1) {
                    $variable_links[] = $v;

                    $link = substr($link_vars[0], 2);

                    switch($link){
                        case 'feedback-link':
                            $link = $links['feedback_link'];
                            break;

                        case 'contact-link':
                            $link = $links['contact_link'];
                            break;

                        case 'order-link':
                            $link = $links['order_link'];
                            break;

                        case 'product-link':
                            $link = $links['product_link'];
                            break;

                        case 'product-review-link':
                            $link = $links['product_review_link'];
                            break;

                        case 'tracking-link':
                            $link = $links['tracking_link'];
                            break;

                        case 'store-link':
                            $link = $links['store_link'];
                            break;

                        case 'store-link-alt':
                            $link = $links['store_link_alt'];
                            break;

                        case 'unsubscribe-link':
                            $link = $links['unsubscribe_link'];
                            break;

                        default:
                            $link = '#';

                    }

                    $link_text = substr($link_vars[1], 0, -2);
                    $value_links[] = '<a href="'.$link.'">'.$link_text.'</a>';
                }
            }

            return array('value_links' => $value_links, 'variable_links' => $variable_links);
        }
    }

    function __totalDays($date){
        $differ = strtotime('now') - strtotime($date);
        return floor($differ / (60 * 60 * 24));
    }

    function __isEmailSendible($all_values, $email_template){
        $purchase_date = substr($all_values['PurchaseDate'], 0, 10);
        $total_days = $this->__totalDays($purchase_date);
        $immediately  = $email_template['immediately'];
        $asins = explode(',', $email_template['asin']);

        if($total_days == $immediately and in_array($all_values['ASIN'], $asins) and  $email_template['delivered'] == $all_values['OrderStatus'] ) {
            return true;
        }
    }


}
?>