<?php
     use TECWEB\MYAPI\READ\Read as Read;
     require_once __DIR__ . '/vendor/autoload.php';

    $productos = new Read('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>