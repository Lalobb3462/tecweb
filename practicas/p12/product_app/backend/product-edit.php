<?php
    use tecweb\myapi\Products as Products;
    require_once __DIR__.'/myapi/Products.php';

    $json = json_decode(file_get_contents("php://input"), true);
    $prodObj = new Products('marketzone');
    $prodObj->edit($json);

    echo $prodObj->getData();
?>
