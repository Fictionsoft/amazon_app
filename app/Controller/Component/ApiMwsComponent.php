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

    function getListOrders(){
        /*$client = new MCS\MWSClient([
            'Marketplace_Id' => 'ATVPDKIKX0DER',
            'Seller_Id' => 'A10YV6NTBY6VOS',
            'Access_Key_ID' => 'AKIAJIEKAODR7KSYYMXQ',
            'Secret_Access_Key' => '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',
            'MWSAuthToken' => '' // Optional. Only use this key if you are a third party user/developer
        ]);

        // Optionally check if the supplied credentials are valid
        if ($client->validateCredentials()) {
            // Credentials are valid
        } else {
            // Credentials are not valid
        }


        //$t1 = date("c", time()-1*24*60*60);
        $fromDate = new DateTime('2017-09-06');
        $orders = $client->ListOrders($fromDate, true);
        echo '<pre>';
        foreach ($orders as $order) {
            $items = $client->ListOrderItems($order['AmazonOrderId']);
            print_r($order);
            print_r($items);
        }*/

    }



}

