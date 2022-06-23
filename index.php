<?php

require_once './config/baseConstants.php';
require_once './config/constants.php';
require_once './config/dbConstants.php';

spl_autoload_register(function($className){
    if (file_exists(LIBS . $className . '.php')) {
        require_once LIBS . $className . '.php';
    }
});

spl_autoload_register(function($className){
    if (file_exists(LIBS . 'classes/' . $className . '.php')) {
        require_once LIBS . 'classes/' . $className . '.php';
    }
});

spl_autoload_register(function($className){
    if (file_exists(CONTROLLERS . $className . '.php')) {
        require_once CONTROLLERS . $className . '.php';
    }
});

$router = new Router();