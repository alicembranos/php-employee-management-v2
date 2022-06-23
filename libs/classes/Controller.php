<?php

class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function loadModel($model)
    {
        if (file_exists(MODELS . ucfirst($model) . 'Model.php')) {
            require_once MODELS . ucfirst($model) . 'Model.php';
            return $this->model = new (ucfirst($model) . 'Model');
        }
    }
}
