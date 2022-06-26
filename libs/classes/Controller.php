<?php

class Controller
{
    protected $view;
    protected $model;

    public function __construct()
    {
        //initalize view
        $this->view = new View();
    }

    //load related model
    public function loadModel($model)
    {
        if (file_exists(MODELS . ucfirst($model) . 'Model.php')) {
            require_once MODELS . ucfirst($model) . 'Model.php';
            return $this->model = new (ucfirst($model) . 'Model');
        }

        return false;
    }

    //redirect php function
    public function redirect($link)
    {
        echo 'Location: ' . BASE_URL  . trim($link, '/');
        header('Location: ' . BASE_URL  . trim($link, '/'));
    }
}