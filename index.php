<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

function dd($array){
    echo "<pre>";
    print_r($array);
//    var_dump($array);
    exit;
}
require_once 'Routes.php';

function __autoload($class_name) {
    if(file_exists('./classes/'.$class_name.'.php')) {
        require_once './classes/'.$class_name.'.php';
    } elseif((file_exists('./Controllers/'.$class_name.'.php'))) {
        require_once './Controllers/'.$class_name.'.php';
    }
}
