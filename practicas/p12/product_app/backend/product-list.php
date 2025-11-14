<?php
    use tecweb\myapi\Products as Products;
    require_once __DIR__.'/myapi/Products.php';
    
    $prodObj = new Products('marketzone');
    $prodObj->list();

    echo $prodObj->getData();
?>