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
        return view("agend/list",$data);
    }
}