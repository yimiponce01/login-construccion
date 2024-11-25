<?php

define('URL_BASE', "http://login-construccion.test/");
define ('DB_HOST','localhost');
define ('DB_NAME','dblogin-construccion');
define ('DB_USER','root');
define ('DB_PASS','');

//funcion generica para obtener paths
function get_path($type,$arg1){
            $basePaths = ['base'=>URL_BASE,
            'views'=>URL_BASE.'views/',
            'models'=>URL_BASE.'models/',
            'controllers'=>URL_BASE.'controllers/'];
            return $basePaths[$type].$arg1;
}

function get_UrlBase($arg1){
    return get_path('base',$arg1);
}

function get_views($arg1){
    return get_path('views',$arg1);
}

function get_models($arg1){
    return get_path('models',$arg1);
}

function get_controllers($arg1){
    return get_path('controllers',$arg1);

}

    //echo 'hola';
    //echo URL_BASE;
    //echo get_UrlBase('');
    //echo get_models('modelousuario.php');
?>