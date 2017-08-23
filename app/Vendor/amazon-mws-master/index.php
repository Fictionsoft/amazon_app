<?php
/**
 * Created by PhpStorm.
 * User: Fictionsoft CEO
 * Date: 15/08/17
 * Time: 12:47 AM
 */

require_once 'vendor/autoload.php';

$client = new MCS\MWSClient([
    'Marketplace_Id' => 'ATVPDKIKX0DER',
    'Seller_Id' => 'A10YV6NTBY6VOS',
    'Access_Key_ID' => 'AKIAJIEKAODR7KSYYMXQ',
    'Secret_Access_Key' => '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',
    'MWSAuthToken' => '' // Optional. Only use this key if you are a third party user/developer
]);

// Optionally check if the supplied credentials are valid
if ($client->validateCredentials()) {
    echo 1;
} else {
    echo 0;
    // Credentials are not valid
}


//$t1 = date("c", time()-1*24*60*60);
$fromDate = new DateTime('2017-05-05');
$orders = $client->ListOrders($fromDate, true);

echo '<pre>';
print_r($orders);die;

foreach ($orders as $order) {
    $items = $client->ListOrderItems($order['AmazonOrderId']);
    print_r($order);
    print_r($items);
}