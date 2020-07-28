<?php
require_once "models/Agend.php";
class AgendController {

    private $model;

    public function __construct()
    {
        $this->model = new Agend();
    }

    public function index()
    {
        $data = $this->model->all();
        // $data = [];
        return view("agend/list",$data);
    }

    public function getToken()
    {
        return view("agend/getToken");
    }

    public function create()
    {
        return view("agend/create");
    }

    public function validateToken()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            setCookie("tokenCalendarGoogle",$_POST["token"],time()+60*60*60);
            $data = $this->model->all();
            
            return view("agend/list",$data);
        }else {
            echo "Method Invalid";
        }

    }

    public function save()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            var_dump($_POST);
            echo "Guardar evento";
        }else {
            echo "Method Invalid";
        }

    }
}