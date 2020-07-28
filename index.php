
<?php
require_once "helpers/helperController.php";
require_once "config/config.php";


$controller = "Agend";
$method = "index";

if(!isset($_REQUEST["c"])){
    require_once "controllers/{$controller}Controller.php";
    $controller = ucwords($controller)."Controller";
    $controller = new $controller();
    call_user_func([$controller,$method]);
}else{

    $controller = ucwords($controller)."Controller";
    $method = isset($_REQUEST["m"]) ? $_REQUEST["m"] : $method;

    if(file_exists("controllers/{$controller}.php")){
        require_once "controllers/{$controller}.php";
        
        if(class_exists($controller)){
            $controller = new $controller();

            if(method_exists($controller,$method)){
                call_user_func([$controller,$method]);
            }else{
                echo "Pagina inexistente";
            }
        }else{
            echo "Controlador no encontradp";
        }
    }else{
        echo "El archivo no existe";
    }



}