<?php
    use tecweb\myapi\Products as Products;
    require_once __DIR__.'/myapi/Products.php';

   $prodObj = new Products('marketzone');
   $input = json_decode(file_get_contents("php://input"), true);
    $prodObj->add($input);

   echo $prodObj->getData();
?>