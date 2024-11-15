<?php

$_urlBase = "http://login-construccion.test/";
$host = 'localhost';
$namedb = 'dblogin-construccion';
$userdb = 'root';
$paswordb = '';

function get_UrlBase($arg1){
    return $GLOBALS['_urlBase'].$arg1;
}

function get_views($arg1){
    return $GLOBALS['_urlBase'].'views/'.$arg1;
}

function get_models($arg1){
    return $GLOBALS['_urlBase'].'models/'.$arg1;
}

function get_controllers($arg1){
    return $GLOBALS['_urlBase'].'/controllers/'.$arg1;
}

?>