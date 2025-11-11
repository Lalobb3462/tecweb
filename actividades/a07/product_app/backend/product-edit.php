<?php
    use tecweb\myapi\Products as Products;
    require_once __DIR__.'/myapi/Products.php';

    $prodObj = new Products('marketzone');
    $prodObj->edit($_POST);

    echo $prodObj->getData();
?>
