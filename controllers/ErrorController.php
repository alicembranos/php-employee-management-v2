<?php

class ErrorController extends Controller
{

    public function __construct($message)
    {
        parent::__construct();
        $this->view->errMsg = $message;
        $this->view->renderView('error/error');
    }
    
}