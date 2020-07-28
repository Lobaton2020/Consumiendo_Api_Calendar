<?php

function view($path,$data = []){
    require_once "views/template/header.php";
    require_once "views/template/navbar.php";
    require_once "views/{$path}.php";
    require_once "views/template/footer.php";
}