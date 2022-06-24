<?php

class Router
{
    protected $url;
    protected $controller;
    protected $method;
    protected $param;

    public function __construct()
    {
        $this->setUrl();
        $this->setController();
        $this->setMethod();
        $this->setParam();
        $this->index();
        
    }

    public function getUrl()
    {
        $url = (isset($_GET['url'])) ? $_GET['url'] : null;
        $url = explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
        return $url;
    }

    public function setUrl()
    {
        $this->url = $this->getUrl();
    }

    public function setController()
    {
        $this->controller = isset($this->url[0]) ? $this->url[0] : '';
    }

    public function setMethod()
    {
        $this->method = !empty($this->url[1]) ? $this->url[1] : '';
    }

    public function setParam()
    {
        $this->param = isset($this->url[2]) ? array($this->url[2]) : [];
    }

    //main function to set the requested controller
    public function index()
    {

        if (empty($this->controller)) {
            //first of all we must check session
            $isLogged = $this->checkSession();

            if (!$isLogged) {
                return;
            }

            $controller = 'employees';
            $method = 'dashboard';
            $this->initController($controller, $method);
        }

        $this->initController($this->controller, $this->method, $this->param);
    }

    //call checkSession from loginController
    public function checkSession()
    {
        $controller = 'login';
        $method = 'checkSession';
        $this->initController($controller, $method);
    }

    //initialize controllers
    public function initController($controller, $method, $param = [])
    {
        $controller = ucfirst($controller);
        $fileController = CONTROLLERS . $controller . 'Controller.php';

        if (file_exists($fileController)) {
            $this->controller = $controller;
            require_once $fileController;
            $this->controller = new ($this->controller . 'Controller');
            $this->controller->loadModel($controller);

            $method = $method;

            if (method_exists($this->controller, $method)) {
                $this->method = $method;
                $params = array_values($this->param);
                call_user_func_array([$this->controller, $this->method], $params);
            } else {
                new ErrorController('Method ' . $method . ' does not exist.');
            }
        } else {
            new ErrorController('Oops, something went wrong calling the' . $controller . 'Controller. Please try again.');
        }
    }
}
