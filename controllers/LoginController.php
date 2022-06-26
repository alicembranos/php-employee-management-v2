<?php

require_once LIBS . 'Session.php';

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function login()
    {
        if (isset($_POST)) {
            if (!$this->validation($_POST)) return;
            $loggedUser = $this->model->validateLogin($_POST);
            if (!is_null($loggedUser)) {
                $this->session->setAttribute('userId', $loggedUser['user_id']);
                $this->session->setAttribute('email', $loggedUser['email']);
                $this->session->setAttribute('name', $loggedUser['name']);
                $this->session->setAttribute('timeout', time());
                $this->redirect('employees/dashboard');
                return;
            } else {
                $this->view->msgLogin = 'Please enter a valid email and/or password.';
                $this->renderLogin();
                return;
            }
        }
    }

    //input validation
    public function validation($inputs)
    {
        //Validate email
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->view->msgLogin = 'Please enter an email address.';
            $this->renderLogin();
            return false;
        }

        return true;
    }

    //check if user session is active
    public function checkSessionActive()
    {
        if ($this->model->checkSessionStatus()) {
            return true;
        } else {
            $this->renderLogin();
            return false;
        }
    }

    public function checkTimeLimit()
    {
        if ($this->model->sessionTimeLimit()) {
            return 1;
            // $this->redirect('index.php');
        }
        return 0;
    }

    public function logout()
    {
        $this->session->destroySession();
        $this->renderLogin();
    }

    public function renderLogin()
    {
        $this->view->renderView('login/login');
    }
}
