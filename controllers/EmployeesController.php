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

    public function addEmployee()
    {
        $employee = json_decode(file_get_contents('php:://input'), true);
        $error = [];
        $valid = true;

        //validation form inputs

        //Validate username on letters/numbers
        $nameValidation = "/^[a-zA-Z0-9]*$/";
        if (empty($employee['name'])) {
            $error['name'] = 'Please enter a name.';
        } elseif (!preg_match($nameValidation, $employee['name'])) {
            $error['name'] = 'Name can only contain letters and numbers.';
        }

        //Validate email
        if (empty($employee['email'])) {
            $error['email'] = 'Please enter email address.';
        } elseif (!filter_var($employee['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Please enter the correct format.';
        } else {
            //Check if email exists.
            if ($this->model->findUserByEmail($employee['email'])) {
                $error['email'] = 'Email is already taken.';
            }
        }

        //Validate if an adult
        if (empty($employee['age'])) {
            $error['age'] = 'Please enter a age.';
        } elseif (intval($employee['age'])  < 18) {
            $error['age'] = 'The employee must be an adult.';
        }

        //Validate if an adult
        $postalCodeValidation = "/^[0-9]{5,6}*$/";
        if (empty($employee['postalCode'])) {
            $error['postalCode'] = 'Please enter a postalCode.';
        } elseif (!preg_match($postalCodeValidation, $employee['postalCode'])) {
            $error['postalCode'] = 'Must be a valid postal code.';
        }

        if (sizeof($error) > 1) { //exist errors
            echo json_encode($error);
        } else{
            echo json_encode($this->model->addEmployee($employee));
        }

    }
}
