<?php
    use tecweb\myapi\delete\Delete as Delete;
    require_once __DIR__.'/myapi/Delete/Delete.php';

    $prodObj = new Delete('marketzone');
    $prodObj->delete($_POST['id']);

    echo $prodObj->getData();
?>