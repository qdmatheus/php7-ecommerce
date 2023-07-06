<?php

use \Hcode\PageAdmin;
use \Hcode\Models\User;
use \Hcode\Models\Order;

$app->get("/admin/orders/:idorder/delete", function($idorder){

    User::verifyLogin();

    $order = new Order();

    $order->get((int)$idorder);

    $order->delete();

    header("Location: /php7-ecommerce/index.php/admin/orders");
    exit;

});

$app->get("/admin/orders/:idorder", function($idorder){

    User::verifyLogin();

    $order = new Order();

    $order->get((int)$idorder);

    $cart = $order->getCart();

    $page = new PageAdmin();

    $page->setTpl("order", [
        "order"=>$order->getValues(),
        "cart"=>$cart->getValues(),
        "products"=>$cart->getProducts()
    ]);

});

$app->get("/admin/orders", function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("orders", [
        "orders"=>Order::listAll()
    ]);

});

?>