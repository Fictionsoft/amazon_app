<?php
App::uses('AppController', 'Controller');

class OrdersController extends AppController {
    var $name = 'Orders';
    public $helpers = array('Html', 'Form');
    public $uses = array('Order');
    public $components = array( 'Common', 'Auth', 'Session', 'Cookie', 'RequestHandler', 'Email','ApiMws' );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->autoRender = false;
        $this->Auth->allow(array('index','create') );
    }

    public function index(){
       $orders = $this->Order->find('all');

        if($orders){

            $this->loadModel('EmailTemplate');
            $email_templates = $this->EmailTemplate->find('first');

            foreach($orders as $order){
                $order_and_item = json_decode($order['Order']['order'], true);
                if(isset($order_and_item['order']['BuyerEmail'])){
                    $order_array = $this->__createOrderArray($order_and_item['order']);
                    $items_array = $this->__createItemsArray($order_and_item['items']);
                    $all_values = array_merge($order_array, $items_array);

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
                        '[[condition-note]]',
                        '[[recipient]]',
                        '[[purchase-date]]',
                        '[[ship-address1]]',
                        '[[ship-address2]]',
                        '[[ship-city]]',
                        '[[ship-state]]',
                        '[[ship-zip]]',
                        '[[ship-country]]',
                        '[[carrier]]',
                        '[[tracking-number]]',
                        '[[estimated-arrival]]',
                        '[[feedback-link]]',
                        '[[contact-link]]',
                        '[[order-link]]',
                        '[[product-link]]',
                        '[[product-review-link]]',
                        '[[tracking-link]]',
                        '[[store-link]]',
                        '[[store-link-alt]]',
                        '[[unsubscribe-link]]'
                    );
                    $values = array(
                        '[[buyer-name]]'                => $all_values['BuyerName'],
                        '[[first-name]]'                => $all_values['BuyerName'],
                        '[[buyer-email]]'               => $all_values['BuyerEmail'],
                        '[[product-name]]'              => $all_values['Title'],
                        '[[order-id]]'                  => $all_values['AmazonOrderId'],
                        '[[msku]]'                      => $all_values['SellerSKU'],
                        '[[asin]]'                      => $all_values['ASIN'],
                        '[[quantity]]'                  => $all_values['QuantityOrdered'],
                        '[[price-item]]'                => $all_values['ItemPrice-Amount'],
                        '[[price-shipping]]'            => (isset($all_values['ShippingPrice-Amount']))?$all_values['ShippingPrice-Amount']:'',
                        '[[condition-note]]'            => '',
                        '[[recipient]]'                 => '',
                        '[[purchase-date]]'             => $all_values['PurchaseDate'],
                        '[[ship-address1]]'             => $all_values['ShippingAddress-AddressLine1'],
                        '[[ship-address2]]'             => (isset($all_values['ShippingAddress-AddressLine2']))?$all_values['ShippingAddress-AddressLine2']:'',
                        '[[ship-city]]'                 => $all_values['ShippingAddress-City'],
                        '[[ship-state]]'                => $all_values['ShippingAddress-StateOrRegion'],
                        '[[ship-zip]]'                  => $all_values['ShippingAddress-PostalCode'],
                        '[[ship-country]]'              => $all_values['ShippingAddress-CountryCode'],
                        '[[carrier]]'                   => '',
                        '[[tracking-number]]'           => '',
                        '[[estimated-arrival]]'         => $all_values['LatestShipDate'],
                        '[[feedback-link]]'             => '',
                        '[[contact-link]]'              => '',
                        '[[order-link]]'                => '',
                        '[[product-link]]'              => '',
                        '[[product-review-link]]'       => '',
                        '[[tracking-link]]'             => '',
                        '[[store-link]]'                => '',
                        '[[store-link-alt]]'            => '',
                        '[[unsubscribe-link]]'          => ''
                    );

                    if($email_templates){
                        $message = $email_templates['EmailTemplate']['message'];
                        $message = str_replace($vars, $values, $message);

                        echo "<div>$message</div><hr><br/>";
                    }
                }
            }

        }
    }

    public function create(){
        $orders = $this->ApiMws->getListOrders();
        $this->Order->saveAll($orders);
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
}
?>