<?php
    use tecweb\myapi\update\Update as Update;
    require_once __DIR__.'/myapi/Update/Update.php';

    $json = json_decode(file_get_contents("php://input"), true);
    $prodObj = new Update('marketzone');
    $prodObj->edit($json);

    echo $prodObj->getData();
?>
