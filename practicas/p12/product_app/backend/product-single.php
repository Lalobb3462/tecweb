<?php
    use tecweb\myapi\read\Read as Read;
    require_once __DIR__.'/myapi/Read/Read.php';
    
    $prodObj = new Read('marketzone');
    $prodObj->single($_POST['id']);

    echo $prodObj->getData();
?>
