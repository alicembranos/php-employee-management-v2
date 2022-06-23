<?php
class Router
{
    //PROPERTIES
    protected $url;
    protected $controller;
    protected $method;
    protected $param;
    //CONSTRUCTOR
    public function __construct()
    {
        $this->setUrl();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }
    //METHODS
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
        $this->method = isset($this->url[1]) ? $this->url[1] : '';
    }
    public function setParam()
    {
        $this->param = isset($this->url[2]) ? $this->url[2] : [];
    }
}
