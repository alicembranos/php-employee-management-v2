<?php

class EmployeesController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //render dashboard page
    public function dashboard()
    {
        $this->view->renderView('employees/dashboard');
    }

    public function showEmployees()
    {
        echo json_encode($this->model->getEmployees());
    }




}