<?php
    use TECWEB\MYAPI\CREATE\Create as Create;
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new Create('marketzone');
    $productos->add( json_decode( json_encode($_POST) ) );
    echo $productos->getData();
?>