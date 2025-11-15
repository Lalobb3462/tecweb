<?php
    use tecweb\myapi\create\create as Create;
    require_once __DIR__.'/myapi/Create/Create.php';

    $prodObj = new Create('marketzone');
    $input = json_decode(file_get_contents("php://input"), true);
    $prodObj->add($input);

    echo $prodObj->getData();
?>