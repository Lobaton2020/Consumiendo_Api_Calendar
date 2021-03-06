<?php
// Hola soy des futuro
require_once "models/Agend.php";
class AgendController
{

    private $model;

    public function __construct()
    {
        $this->model = new Agend();
    }

    public function index()
    {
        $data = $this->model->all();
        return view("agend/list", $data);
    }

    public function getToken()
    {
        setCookie("tokenCalendarGoogle", $_GET["code_key"], time() + 60 * 60 * 60);
        return redirect("https://text-google-calendar.herokuapp.com/");
        // return view("agend/getToken");
    }

    public function create()
    {
        return view("agend/create");
    }

    public function validateToken()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            setCookie("tokenCalendarGoogle", $_POST["token"], time() + 60 * 60 * 60);
            return redirect("https://text-google-calendar.herokuapp.com/");

        } else {
            echo "Method Invalid";
        }

    }

    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $emails = isset($_POST["emails"]) ? $_POST["emails"] : array();
            if (!empty($emails)) {
                $data = array();
                foreach ($emails as $email) {
                    $email = array("email" => $email);
                    array_push($data, $email);
                }
                $emails = $data;
            }
            $fechainicio = $_POST["fechainicio"] . 'T' . $_POST["horainicio"] . ':00-05:00';
            $fechafin = $_POST["fechafin"] . 'T' . $_POST["horafin"] . ':00-05:00';
            $datos = [
                'titulo' => $_POST["titulo"],
                'descripcion' => $_POST["descripcion"],
                'emails' => $emails,
                'fechainicio' => $fechainicio,
                'fechafin' => $fechafin,
            ];
            // exit(var_dump($datos));
            $url = $this->model->save($datos);
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $_SESSION["ok"] = "Evento agregado exitosamente!";
                $_SESSION["url"] = "<a href='{$url}'>Ver Anotacion</a>";
            } else {
                $_SESSION["error"] = $url;
            }
            return view("agend/create");
        } else {
            echo "Method Invalid";
        }

    }
}
