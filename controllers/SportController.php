<?php

class SportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //render dashboard page
    public function sportDashboard()
    {
        $this->view->renderView('sport/dashboard');
    }

    public function getActiveSession()
    {
        $sessionNumber = $this->model->getActiveSession();
        echo json_encode($sessionNumber);
    }

    public function getCountSummary()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $summary = $this->model->getCountSummary($data["a"], $data["b"]);
        echo $summary;
    }

}
