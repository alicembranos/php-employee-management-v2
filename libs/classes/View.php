<?php

class View 
{

    public function renderView($view)
    {

        if (file_exists(VIEWS . $view . '.php')) {
            require_once VIEWS . $view . '.php';
        } else {
            $this->errMsg = 'This page does not exist';
            require_once VIEWS . 'error/error.php';
        }

    }
    
}