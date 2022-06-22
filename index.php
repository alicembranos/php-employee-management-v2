<?php

require_once "./config/baseConstants.php";
require_once "./config/constants.php";
require_once "./config/dbConstants.php";

require_once LIBS . "Router.php";
require_once LIBS . "Database.php";


$router = new Router();

$marcelDatabase = new Database();

$marcelDatabase->connect();
