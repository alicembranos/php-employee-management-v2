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
        if (count($sessionNumber) > 0) {
            echo json_encode($sessionNumber);
        } else {
            echo json_encode(false);
        }
    }

    public function getCountSummary()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $summary = $this->model->getCountSummary($data["a"], $data["b"]);
        echo $summary;
    }

    public function getRanking()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $ranking = $this->model->getRanking($data["a"], $data["b"]);
        echo json_encode($ranking);
    }

    public function updateGoal()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $goal = $this->model->updateGoal($data["a"], $data["b"], $data["c"]);
        echo json_encode($goal);
    }
}
