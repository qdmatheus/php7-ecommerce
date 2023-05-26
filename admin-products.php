<?php

use \Hcode\PageAdmin;
use \Hcode\Models\User;
use \Hcode\Models\Product;

$app->get("/admin/products", function(){

    User::verifyLogin();

    $products = Product::listAll();

    $page = new PageAdmin();

    $page->setTpl("products", [
        "products"=>$products
    ]);

});

?>