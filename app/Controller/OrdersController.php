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
            $vars = array(
                '[[LatestShipDate]]',
                '[[OrderType]]',
                '[[PurchaseDate]]',
                '[[AmazonOrderId]]',
                '[[BuyerEmail]]',
                '[[IsReplacementOrder]]',
                '[[LastUpdateDate]]',
                '[[ShipServiceLevel]]',
                '[[NumberOfItemsShipped]]',
                '[[OrderStatus]]',
                '[[SalesChannel]]',
                '[[IsBusinessOrder]]',
                '[[NumberOfItemsUnshipped]]',
                '[[PaymentMethodDetails-PaymentMethodDetail]]',
                '[[BuyerName]]',
                '[[OrderTotal-CurrencyCode]]',
                '[[OrderTotal-Amount]]',
                '[[IsPremiumOrder]]',
                '[[EarliestShipDate]]',
                '[[MarketplaceId]]',
                '[[FulfillmentChannel]]',
                '[[PaymentMethod]]',
                '[[ShippingAddress-StateOrRegion]]',
                '[[ShippingAddress-City]]',
                '[[ShippingAddress-CountryCode]]',
                '[[ShippingAddress-PostalCode]]',
                '[[ShippingAddress-Name]]',
                '[[ShippingAddress-AddressLine1]]',
                '[[ShippingAddress-AddressLine2]]',
                '[[IsPrime]]',
                '[[ShipmentServiceLevelCategory]]',
                '[[SellerOrderId]]',
                '[[QuantityOrdered]]',
                '[[Title]]',
                '[[ShippingTax-CurrencyCode]]',
                '[[ShippingTax-Amount]]',
                '[[PromotionDiscount-CurrencyCode]]',
                '[[PromotionDiscount-Amount]]',
                '[[ASIN]]',
                '[[SellerSKU]]',
                '[[OrderItemId]]',
                '[[PromotionIds-PromotionId]]',
                '[[QuantityShipped]]',
                '[[ShippingPrice-CurrencyCode]]',
                '[[ShippingPrice-Amount]]',
                '[[ItemPrice-CurrencyCode]]',
                '[[ItemPrice-Amount]]',
                '[[ItemTax-CurrencyCode]]',
                '[[ItemTax-Amount]]',
                '[[ShippingDiscount-CurrencyCode]]',
                '[[ShippingDiscount-Amount]]'
            );

            foreach($orders as $order){
                $order_and_item = json_decode($order['Order']['order'], true);
                if(isset($order_and_item['order']['BuyerEmail'])){
                    $order_array = $this->__createOrderArray($order_and_item['order']);
                    $items_array = $this->__createItemsArray($order_and_item['items']);

                    if (!array_key_exists('ShippingAddress-AddressLine2', $order_array)) {
                        array_splice( $order_array, 28, 0, array('ShippingAddress-AddressLine2'=>'') );
                    }

                    $values = array_merge($order_array, $items_array);

                    pr($values);
                }
            }
        }

       $this->loadModel('EmailTemplate');
       $email_templates = $this->EmailTemplate->find('first');

       if($email_templates){
           $message = $email_templates['EmailTemplate']['message'];
           $message = str_replace($vars, $values, $message);

           //echo $message;
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