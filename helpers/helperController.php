<?php

function view($path, $data = [])
{
    require_once "views/template/header.php";
    require_once "views/template/navbar.php";
    require_once "views/{$path}.php";
    require_once "views/template/footer.php";
}

function showMessage($message, $type)
{
    if (isset($_SESSION[$message])):
        echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">';
        echo $_SESSION[$message];
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';

        unset($_SESSION[$message]);
    endif;
}

function redirect($url)
{
    echo "<script> window.location.href= '" . $url . "'; </script>";
}
