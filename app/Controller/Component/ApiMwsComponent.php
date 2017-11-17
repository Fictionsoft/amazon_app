<?php
/**
 * Created by PhpStorm.
 * User: mizan
 * Date: 22/10/14
 * Time: 16:53
 */

App::import('Vendor', 'mws', array('file' => 'amazon-mws-master/vendor/autoload.php' ));


App::uses('Component', 'Controller');
class ApiMwsComponent extends Component {

    public $components = array('Session');

    var $controller;

    public function __construct() {

    }


    function startup(Controller $controller){
        $this->controller = $controller;
    }

    function getListOrders($from_date = '2017-10-10', $to_date = '2017-10-13'){
        $seller = $this->controller->Session->read('Auth.User.Seller');
        $client = new MCS\MWSClient([
            'Marketplace_Id'            => $seller['marketplace_id'],
            'Seller_Id'                 => $seller['seller_id'],
            'Access_Key_ID'             => $seller['access_key_id'],
            'Secret_Access_Key'         => $seller['secret_access_key'],
            'MWSAuthToken' => '' // Optional. Only use this key if you are a third party user/developer
        ]);

        // Optionally check if the supplied credentials are valid
        if ($client->validateCredentials()) {
            // Credentials are valid
        } else {
            // Credentials are not valid
        }


        //$t1 = date("c", time()-1*24*60*60);
        $fromDate = new DateTime($from_date);
        $toDate = new DateTime($to_date);
        $orders = $client->ListOrders($fromDate, $toDate, true);


        $orders_new = array();
        foreach ($orders as $key => $order) {
            $items = $client->ListOrderItems($order['AmazonOrderId']);
            $orders_new[$key]['order'] = json_encode(array('order' => $order, 'items' => $items));
            $orders_new[$key]['order_id'] = $order['AmazonOrderId'];
            $orders_new[$key]['purchase_date'] = $order['PurchaseDate'];
            $orders_new[$key]['order_status'] = $order['OrderStatus'];
        }
        return $orders_new;
    }
}

